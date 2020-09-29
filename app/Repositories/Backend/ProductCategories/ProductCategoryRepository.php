<?php

namespace App\Repositories\Backend\ProductCategories;

use App\Events\Backend\BlogCategories\BlogCategoryDeleted;
use App\Events\Backend\BlogCategories\BlogCategoryUpdated;
use App\Events\Backend\ProductCategories\ProductCategoryCreated;
use App\Events\Backend\ProductCategories\ProductCategoryDeleted;
use App\Events\Backend\ProductCategories\ProductCategoryUpdated;
use DB;
use App\Models\ProductCategories\ProductCategory;
use App\Exceptions\GeneralException;
use App\Repositories\BaseRepository;
use Illuminate\Support\Str;

/**
 * Class ProductCategoryRepository.
 */
class ProductCategoryRepository extends BaseRepository
{
    /**
     * Associated Repository Model.
     */
    const MODEL = ProductCategory::class;

    /**
     * This method is used by Table Controller
     * For getting the table data to show in
     * the grid
     * @return mixed
     */
    public function getForDataTable()
    {
        return $this->query()
            ->leftjoin(config('access.users_table'), config('access.users_table').'.id', '=', config('module.productcategories.table').'.created_by')
            ->select([
                config('module.productcategories.table').'.id',
                config('module.productcategories.table').'.name',
                config('module.productcategories.table').'.status',
                config('module.productcategories.table').'.created_at',
                config('module.productcategories.table').'.created_by',
                config('access.users_table').'.first_name as user_name',
            ]);
    }


    public function create(array $input)
    {
        if ($this->query()->where('name', $input['name'])->first()) {
            throw new GeneralException(trans('exceptions.backend.productcategories.already_exists'));
        }
        DB::transaction(function () use ($input) {
            $input['status'] = isset($input['status']) ? 1 : 0;
            $input['created_by'] = access()->user()->id;
            $input['slug'] = Str::slug($input['name']);

            if ($productcategory = ProductCategory::create($input)) {
                event(new ProductCategoryCreated($productcategory));
                return true;
            }

            throw new GeneralException(trans('exceptions.backend.productcategories.create_error'));
        });
    }


    public function update(ProductCategory $productCategory, array $input)
    {
        if ($this->query()->where('name', $input['name'])->where('id', '!=', $productCategory->id)->first()) {
            throw new GeneralException(trans('exceptions.backend.productcategories.already_exists'));
        }

        DB::transaction(function () use ($productCategory, $input) {
            $input['status'] = isset($input['status']) ? 1 : 0;
            $input['updated_by'] = access()->user()->id;
            $input['slug'] = Str::slug($input['name']);

            if ($productCategory->update($input)) {
                event(new ProductCategoryUpdated($productCategory));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.productcategories.update_error'));
        });
    }

    public function delete(ProductCategory $productcategory)
    {
        DB::transaction(function () use ($productcategory) {
            if ($productcategory->delete()) {
                event(new ProductCategoryDeleted($productcategory));

                return true;
            }

            throw new GeneralException(trans('exceptions.backend.productcategories.delete_error'));
        });
    }

    /**
     * Get category by slug
     */
    public function getBySlug($slug) {
        if (!is_null($this->query()->whereSlug($slug)->firstOrFail())) {
            return $this->query()->whereSlug($slug)->firstOrFail();
        }

        throw new GeneralException(trans('exceptions.backend.access.pages.not_found'));
    }
}
