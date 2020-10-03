<?php

namespace App\Repositories\Backend\DocumentCategories;

use App\Events\Backend\DocumentCategories\DocumentCategoryCreated;
use App\Events\Backend\DocumentCategories\DocumentCategoryDeleted;
use App\Events\Backend\DocumentCategories\DocumentCategoryUpdated;
use App\Exceptions\GeneralException;
use App\Models\DocumentCategories\DocumentCategory;
use App\Repositories\BaseRepository;
use DB;
use Illuminate\Support\Str;

/**
 * Class DocumentCategoryRepository.
 */
class DocumentCategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = DocumentCategory::class;


    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin(config('access.users_table'), config('access.users_table') . '.id', '=', config('module.documentcategories.table') . '.created_by')
            ->select([
                config('module.documentcategories.table') . '.id',
                config('module.documentcategories.table') . '.name',
                config('module.documentcategories.table') . '.status',
                config('module.documentcategories.table') . '.created_by',
                config('module.documentcategories.table') . '.created_at',
                config('access.users_table') . '.first_name as user_name',
            ]);
    }


    public function create(array $input)
    {
        if ($this->query()->where('name', $input['name'])->first()) {
            throw new GeneralException(trans('exceptions.backend.documentcategories.already_exists'));
        }

        DB::transaction(function () use ($input) {
            $input['status'] = isset($input['status']) ? 1 : 0;
            $input['created_by'] = access()->user()->id;
            $input['slug'] = Str::slug($input['name']);

            if ($documentcategory = DocumentCategory::create($input)) {
                event(new DocumentCategoryCreated($documentcategory));
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.documentcategories.create_error'));
        });
    }


    public function update(DocumentCategory $documentcategory, array $input)
    {
        if ($this->query()->where('name', $input['name'])->where('id', '!=', $documentcategory->id)->first()) {
            throw new GeneralException(trans('exceptions.backend.documentcategories.already_exists'));
        }

        DB::transaction(function () use ($documentcategory, $input) {
            $input['status'] = isset($input['status']) ? 1 : 0;
            $input['updated_by'] = access()->user()->id;
            $input['slug'] = Str::slug($input['name']);

            if ($documentcategory->update($input)) {
                event(new DocumentCategoryUpdated($documentcategory));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.documentcategories.update_error'));
        });
    }


    public function delete(DocumentCategory $documentcategory)
    {
        DB::transaction(function () use ($documentcategory) {
            if ($documentcategory->delete()) {
                event(new DocumentCategoryDeleted($documentcategory));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.blogcategories.delete_error'));
        });
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
}
