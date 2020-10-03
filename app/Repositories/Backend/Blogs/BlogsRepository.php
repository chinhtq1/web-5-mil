<?php

namespace App\Repositories\Backend\Blogs;

use App\Events\Backend\Blogs\BlogCreated;
use App\Events\Backend\Blogs\BlogDeleted;
use App\Events\Backend\Blogs\BlogUpdated;
use App\Exceptions\GeneralException;
use App\Models\BlogCategories\BlogCategory;
use App\Models\BlogMapCategories\BlogMapCategory;
use App\Models\BlogMapTags\BlogMapTag;
use App\Models\Blogs\Blog;
use App\Models\BlogTags\BlogTag;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class BlogsRepository.
 */
class BlogsRepository extends BaseRepository implements BlogRepositoryInterface
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Blog::class;

    protected $upload_path;


    protected $storage;

    public function __construct()
    {
        $this->upload_path = 'img' . DIRECTORY_SEPARATOR . 'blog' . DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin(config('access.users_table'), config('access.users_table') . '.id', '=', config('module.blogs.table') . '.created_by')
            ->select([
                config('module.blogs.table') . '.id',
                config('module.blogs.table') . '.name',
                config('module.blogs.table') . '.publish_datetime',
                config('module.blogs.table') . '.status',
                config('module.blogs.table') . '.created_by',
                config('module.blogs.table') . '.created_at',
                config('access.users_table') . '.first_name as user_name',
            ]);
    }


    public function create(array $input)
    {
        $tagsArray = $this->createTags($input['tags']);
        $categoriesArray = $this->createCategories($input['categories']);
        unset($input['tags'], $input['categories']);

        DB::transaction(function () use ($input, $tagsArray, $categoriesArray) {
            $input['slug'] = Str::slug($input['name']);
            $input['publish_datetime'] = Carbon::parse($input['publish_datetime']);
            $input = $this->uploadImage($input);
            $input['created_by'] = access()->user()->id;

            if ($blog = Blog::create($input)) {
                // Inserting associated category's id in mapper table
                if (count($categoriesArray)) {
                    $blog->categories()->sync($categoriesArray);
                }

                // Inserting associated tag's id in mapper table
                if (count($tagsArray)) {
                    $blog->tags()->sync($tagsArray);
                }

                event(new BlogCreated($blog));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.blogs.create_error'));
        });
    }


    public function update(Blog $blog, array $input)
    {
        $tagsArray = $this->createTags($input['tags']);
        $categoriesArray = $this->createCategories($input['categories']);
        unset($input['tags'], $input['categories']);

        $input['slug'] = Str::slug($input['name']);
        $input['publish_datetime'] = Carbon::parse($input['publish_datetime']);
        $input['updated_by'] = access()->user()->id;

        // Uploading Image
        if (array_key_exists('featured_image', $input)) {
            $this->deleteOldFile($blog);
            $input = $this->uploadImage($input);
        }

        DB::transaction(function () use ($blog, $input, $tagsArray, $categoriesArray) {
            if ($blog->update($input)) {

                // Updateing associated category's id in mapper table
                if (count($categoriesArray)) {
                    $blog->categories()->sync($categoriesArray);
                }

                // Updating associated tag's id in mapper table
                if (count($tagsArray)) {
                    $blog->tags()->sync($tagsArray);
                }

                event(new BlogUpdated($blog));

                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.blogs.update_error')
            );
        });
    }

    /**
     * Creating Tags.
     *
     * @param array $tags
     *
     * @return array
     */
    public function createTags($tags)
    {
        //Creating a new array for tags (newly created)
        $tags_array = [];

        foreach ($tags as $tag) {
            if (is_numeric($tag)) {
                $tags_array[] = $tag;
            } else {
                $newTag = BlogTag::create(['name' => $tag, 'status' => 1, 'created_by' => 1]);
                $tags_array[] = $newTag->id;
            }
        }

        return $tags_array;
    }

    /**
     * Creating Categories.
     *
     * @param Array($categories)
     *
     * @return array
     */
    public function createCategories($categories)
    {
        //Creating a new array for categories (newly created)
        $categories_array = [];

        foreach ($categories as $category) {
            if (is_numeric($category)) {
                $categories_array[] = $category;
            } else {
                $newCategory = BlogCategory::create(['name' => $category, 'status' => 1, 'created_by' => 1]);

                $categories_array[] = $newCategory->id;
            }
        }

        return $categories_array;
    }


    public function delete(Blog $blog)
    {
        DB::transaction(function () use ($blog) {
            $fileName = $blog->featured_image;
            if ($blog->delete()) {
                BlogMapCategory::where('blog_id', $blog->id)->delete();
                BlogMapTag::where('blog_id', $blog->id)->delete();
                $this->deleteFile($fileName);

                event(new BlogDeleted($blog));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.blogs.delete_error'));
        });
    }

    /**
     * Upload Image.
     *
     * @param array $input
     *
     * @return array $input
     */
    public function uploadImage($input)
    {
        $avatar = $input['featured_image'];

        if (isset($input['featured_image']) && !empty($input['featured_image'])) {
            $fileType = $avatar->getClientOriginalExtension();

            $fileName = time() . '-' . Str::slug($input['name']);

            $this->storage->put($this->upload_path . $fileName . '.' . $fileType, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['featured_image' => $fileName . '.' . $fileType]);

            return $input;
        }
    }


    private function deleteOldFile($model)
    {
        $fileName = $model->featured_image;

        return $this->storage->delete($this->upload_path . $fileName);
    }

    private function deleteFile($fileName)
    {
        return $this->storage->delete($this->upload_path . $fileName);
    }

    public function getBySlug($blog_slug)
    {
        if (!is_null($this->query()->whereSlug(['slug' => $blog_slug, 'active' => 'Publish'])->firstOrFail())) {
            return $this->query()->whereSlug(['slug' => $blog_slug, 'active' => 'Publish'])->firstOrFail();
        }
        throw new GeneralException(trans('exceptions.backend.access.pages.not_found'));
    }

    /**
     * Find by status
     * @param string status
     */
    public function getByStatus($status)
    {
        return $this->query()->whereStatus($status);
    }


    public function getByCategory($category, $per_page, $order_by, $sort)
    {
        // Lấy danh sách bài viết theo danh mục
        return $category->blogs()->orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    public function getRandomBlogList($count)
    {
        return $this->getByStatus(['Published'])->take($count);
    }
}
