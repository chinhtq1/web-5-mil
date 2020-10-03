<?php

namespace App\Repositories\Backend\Products;

use App\Events\Backend\Products\ProductCreated;
use App\Events\Backend\Products\ProductDeleted;
use App\Events\Backend\Products\ProductUpdated;
use App\Models\ProductCategories\ProductCategory;
use App\Models\ProductMapCategories\ProductMapCategory;
use DB;
use Carbon\Carbon;
use App\Models\Products\Product;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class ProductRepository.
 */
class ProductRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = Product::class;

    protected $upload_path;

    protected $storage;

    public function __construct()
    {
        $this->upload_path = 'img' . DIRECTORY_SEPARATOR . 'product' . DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin(config('access.users_table'), config('access.users_table') . '.id', '=', config('module.products.table') . '.created_by')
            ->select([
                config('module.products.table') . '.id',
                config('module.products.table') . '.name',
                config('module.products.table') . '.publish_datetime',
                config('module.products.table') . '.status',
                config('module.products.table') . '.created_by',
                config('module.products.table') . '.created_at',
                config('access.products') . '.first_name as user_name',
            ]);
    }


    public function create(array $input)
    {
//        $tagsArray = $this->createTags($input['tags']);
        $categoriesArray = $this->createCategories($input['categories']);
        unset($input['categories']);

        DB::transaction(function () use ($input, $categoriesArray) {
            $input['slug'] = Str::slug($input['name']);
            $input['publish_datetime'] = Carbon::parse($input['publish_datetime']);
            $input = $this->uploadImage($input);
            $input['created_by'] = access()->user()->id;

            if ($product = Product::create($input)) {
                // Inserting associated category's id in mapper table
                if (count($categoriesArray)) {
                    $product->categories()->sync($categoriesArray);
                }

//                // Inserting associated tag's id in mapper table
//                if (count($tagsArray)) {
//                    $product->tags()->sync($tagsArray);
//                }

                event(new ProductCreated($product));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.products.create_error'));
        });
    }


    public function update(Product $product, array $input)
    {
//        $tagsArray = $this->createTags($input['tags']);
        $categoriesArray = $this->createCategories($input['categories']);
        unset($input['categories']);

        $input['slug'] = Str::slug($input['name']);
        $input['publish_datetime'] = Carbon::parse($input['publish_datetime']);
        $input['updated_by'] = access()->user()->id;

        // Uploading Image
        if (array_key_exists('feature_image', $input)) {
            $this->deleteOldFile($product);
            $input = $this->uploadImage($input);
        }

        DB::transaction(function () use ($product, $input, $categoriesArray) {
            if ($product->update($input)) {

                // Updateing associated category's id in mapper table
                if (count($categoriesArray)) {
                    $product->categories()->sync($categoriesArray);
                }

                // Updating associated tag's id in mapper table
//                if (count($tagsArray)) {
//                    $blog->tags()->sync($tagsArray);
//                }

                event(new ProductUpdated($product));

                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.products.update_error')
            );
        });
    }


    public function delete(Product $product)
    {
        DB::transaction(function () use ($product) {
            $fileName = $product->feature_image;

            if ($product->delete()) {
                ProductMapCategory::where('product_id', $product->id)->delete();
                $this->deleteFile($fileName);

                event(new ProductDeleted($product));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.products.delete_error'));
        });
    }

    public function createCategories($categories)
    {
        //Creating a new array for categories (newly created)
        $categories_array = [];

        foreach ($categories as $category) {
            if (is_numeric($category)) {
                $categories_array[] = $category;
            } else {
                $newCategory = ProductCategory::create(['name' => $category, 'status' => 1, 'created_by' => 1]);

                $categories_array[] = $newCategory->id;
            }
        }

        return $categories_array;
    }

    public function uploadImage($input)
    {
        $avatar = $input['feature_image'];

        if (isset($input['feature_image']) && !empty($input['feature_image'])) {
            $fileType = $avatar->getClientOriginalExtension();
            $fileName = time() . '-' . Str::slug($input['name']);

            $this->storage->put($this->upload_path . $fileName . '.' . $fileType, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, ['feature_image' => $fileName . '.' . $fileType]);

            return $input;
        }
    }

    private function deleteOldFile($model)
    {
        $fileName = $model->feature_image;

        return $this->storage->delete($this->upload_path . $fileName);
    }

    private function deleteFile($fileName)
    {
        return $this->storage->delete($this->upload_path . $fileName);
    }

    public function getByCategory($category, $per_page, $order_by, $sort)
    {
        // Lấy danh sách bài viết theo danh mục
        return $category->products()->orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    /**
     * Get category by slug
     */
    public function getBySlug($slug)
    {
        if (!is_null($this->query()->whereSlug($slug)->firstOrFail())) {
            return $this->query()->whereSlug($slug)->firstOrFail();
        }

        throw new GeneralException(trans('exceptions.backend.access.pages.not_found'));
    }

    public function getByStatus($status)
    {
        return $this->query()->whereStatus($status);
    }

    public function getRandomProductList($count)
    {
        return $this->getByStatus(['Published'])->take($count);
    }
}
