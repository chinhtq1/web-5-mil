<?php

namespace App\Repositories\Backend\Documents;

use App\Events\Backend\Documents\DocumentCreated;
use App\Events\Backend\Documents\DocumentDeleted;
use App\Events\Backend\Documents\DocumentUpdated;
use App\Exceptions\GeneralException;
use App\Models\DocumentCategories\DocumentCategory;
use App\Models\DocumentMapCategories\DocumentMapCategory;
use App\Models\Documents\Document;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * Class DocumentRepository.
 */
class DocumentRepository extends BaseRepository implements DocumentsRepositoryInteface
{

    const MODEL = Document::class;

    protected $upload_path;
    protected $storage;

    public function __construct()
    {
        $this->upload_path = 'img' . DIRECTORY_SEPARATOR . 'document' . DIRECTORY_SEPARATOR;
        $this->storage = Storage::disk('public');
    }

    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin(config('access.users_table'), config('access.users_table') . '.id', '=', config('module.documents.table') . '.created_by')
            ->select([
                config('module.documents.table') . '.id',
                config('module.documents.table') . '.name',
                config('module.documents.table') . '.publish_datetime',
                config('module.documents.table') . '.status',
                config('module.documents.table') . '.created_at',
                config('module.documents.table') . '.updated_at',
                config('access.users_table') . '.first_name as user_name',
            ]);
    }


    public function create(array $input)
    {
        $categoriesArray = $this->createCategories($input['categories']);
        unset($input['categories']);

        DB::transaction(function () use ($input, $categoriesArray) {
            $input['slug'] = Str::slug($input['name']);
            $input['publish_datetime'] = Carbon::parse($input['publish_datetime']);
            $input = $this->uploadFile($input);
            $input['created_by'] = access()->user()->id;

            if ($document = Document::create($input)) {
                // Inserting associated category's id in mapper table
                if (count($categoriesArray)) {
                    $document->categories()->sync($categoriesArray);
                }

                event(new DocumentCreated($document));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.documents.create_error'));
        });
    }

    public function update(Document $document, array $input)
    {
        $categoriesArray = $this->createCategories($input['categories']);
        unset($input['categories']);

        $input['slug'] = Str::slug($input['name']);
        $input['publish_datetime'] = Carbon::parse($input['publish_datetime']);
        $input['updated_by'] = access()->user()->id;

        // Uploading Image
        if (array_key_exists('file', $input)) {
            $this->deleteOldFile($document);
            $input = $this->uploadFile($input);
        }

        DB::transaction(function () use ($document, $input, $categoriesArray) {
            if ($document->update($input)) {

                // Updateing associated category's id in mapper table
                if (count($categoriesArray)) {
                    $document->categories()->sync($categoriesArray);
                }

                // Updating associated tag's id in mapper table
//                if (count($tagsArray)) {
//                    $blog->tags()->sync($tagsArray);
//                }

                event(new DocumentUpdated($document));

                return true;
            }

            throw new GeneralException(
                trans('exceptions.backend.documents.update_error')
            );
        });
    }

    public function delete(Document $document)
    {
        DB::transaction(function () use ($document) {
            $fileName = $document->file;

            if ($document->delete()) {
                DocumentMapCategory::where('document_id', $document->id)->delete();
                $this->deleteFile($fileName);

                event(new DocumentDeleted($document));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.blogs.delete_error'));
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
                $newCategory = DocumentCategory::create(['name' => $category, 'status' => 1, 'created_by' => 1]);

                $categories_array[] = $newCategory->id;
            }
        }

        return $categories_array;
    }

    public function uploadFile($input)
    {
        $avatar = $input['file'];

        if (isset($input['file']) && !empty($input['file'])) {
            $fileType = $avatar->getClientOriginalExtension();
            $fileName = time() . '-' . Str::slug($input['name']);
            $this->storage->put($this->upload_path . $fileName . '.' . $fileType, file_get_contents($avatar->getRealPath()));

            $input = array_merge($input, [
                'file' => $fileName . '.' . $fileType,
                'type' => array_key_exists($fileType, config('common.file-type')) ? $fileType : 'other'
            ]);

            return $input;
        }
        return null;
    }

    private function deleteOldFile($model)
    {
        $fileName = $model->file;

        return $this->storage->delete($this->upload_path . $fileName);
    }

    private function deleteFile($fileName)
    {
        return $this->storage->delete($this->upload_path . $fileName);
    }

    public function getByCategory($category, $per_page, $order_by, $sort)
    {
        // Lấy danh sách bài viết theo danh mục
        return $category->documents()->orderBy($order_by, $sort)
            ->paginate($per_page);
    }

    /**
     * Get category by slug
     */
    public function getBySlug($slug)
    {
        if (!is_null($this->query()->whereSlug(['slug' => $slug, 'active' => 'Publish'])->firstOrFail())) {
            return $this->query()->whereSlug(['slug' => $slug, 'active' => 'Publish'])->firstOrFail();
        }

        throw new GeneralException(trans('exceptions.backend.access.pages.not_found'));
    }

    public function getByStatus($status)
    {
        return $this->query()->whereStatus($status);
    }
}
