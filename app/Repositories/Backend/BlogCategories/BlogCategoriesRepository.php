<?php

namespace App\Repositories\Backend\BlogCategories;

use App\Events\Backend\BlogCategories\BlogCategoryCreated;
use App\Events\Backend\BlogCategories\BlogCategoryDeleted;
use App\Events\Backend\BlogCategories\BlogCategoryUpdated;
use App\Exceptions\GeneralException;
use App\Models\BlogCategories\BlogCategory;
use App\Repositories\BaseRepository;
use DB;
use Illuminate\Support\Str;

/**
 * Class BlogCategoriesRepository.
 */
class BlogCategoriesRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = BlogCategory::class;

    /**
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin(config('access.users_table'), config('access.users_table') . '.id', '=', config('module.blog_categories.table') . '.created_by')
            ->select([
                config('module.blog_categories.table') . '.id',
                config('module.blog_categories.table') . '.name',
                config('module.blog_categories.table') . '.status',
                config('module.blog_categories.table') . '.created_by',
                config('module.blog_categories.table') . '.created_at',
                config('access.users_table') . '.first_name as user_name',
            ]);
    }


    public function create(array $input)
    {
        if ($this->query()->where('name', $input['name'])->first()) {
            throw new GeneralException(trans('exceptions.backend.blogcategories.already_exists'));
        }

        DB::transaction(function () use ($input) {
            $input['status'] = isset($input['status']) ? 1 : 0;
            $input['created_by'] = access()->user()->id;
            $input['slug'] = Str::slug($input['name']);

            if ($blogcategory = BlogCategory::create($input)) {
                event(new BlogCategoryCreated($blogcategory));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.blogcategories.create_error'));
        });
    }


    public function update(BlogCategory $blogcategory, array $input)
    {
        if ($this->query()->where('name', $input['name'])->where('id', '!=', $blogcategory->id)->first()) {
            throw new GeneralException(trans('exceptions.backend.blogcategories.already_exists'));
        }

        DB::transaction(function () use ($blogcategory, $input) {
            $input['status'] = isset($input['status']) ? 1 : 0;
            $input['updated_by'] = access()->user()->id;
            $input['slug'] = Str::slug($input['name']);

            if ($blogcategory->update($input)) {
                event(new BlogCategoryUpdated($blogcategory));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.blogcategories.update_error'));
        });
    }


    public function delete(BlogCategory $blogcategory)
    {
        DB::transaction(function () use ($blogcategory) {
            if ($blogcategory->delete()) {
                event(new BlogCategoryDeleted($blogcategory));

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
