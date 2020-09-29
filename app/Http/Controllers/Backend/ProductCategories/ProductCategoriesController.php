<?php

namespace App\Http\Controllers\Backend\ProductCategories;

use App\Models\ProductCategories\ProductCategory;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\ViewResponse;
use App\Http\Responses\Backend\ProductCategories\EditResponse;
use App\Repositories\Backend\ProductCategories\ProductCategoryRepository;
use App\Http\Requests\Backend\ProductCategories\ManageProductCategoryRequest;
use App\Http\Requests\Backend\ProductCategories\CreateProductCategoryRequest;
use App\Http\Requests\Backend\ProductCategories\StoreProductCategoryRequest;
use App\Http\Requests\Backend\ProductCategories\EditProductCategoryRequest;
use App\Http\Requests\Backend\ProductCategories\UpdateProductCategoryRequest;
use App\Http\Requests\Backend\ProductCategories\DeleteProductCategoryRequest;

/**
 * ProductCategoriesController
 */
class ProductCategoriesController extends Controller
{
    protected $productcategory;

    public function __construct(ProductCategoryRepository $productcategory)
    {
        $this->productcategory = $productcategory;
    }

    public function index(ManageProductCategoryRequest $request)
    {
        return new ViewResponse('backend.productcategories.index');
    }

    public function create(CreateProductCategoryRequest $request)
    {
        return new ViewResponse('backend.productcategories.create');
    }

    public function store(StoreProductCategoryRequest $request)
    {
        $this->productcategory->create($request->all());
        return new RedirectResponse(route('admin.productcategories.index'), ['flash_success' => trans('alerts.backend.productcategories.created')]);
    }

    public function edit(ProductCategory $productcategory, EditProductCategoryRequest $request)
    {
        return new EditResponse($productcategory);
    }

    public function update(UpdateProductCategoryRequest $request, ProductCategory $productcategory)
    {
        $this->productcategory->update($productcategory, $request->all());
        //return with successfull message
        return new RedirectResponse(route('admin.productcategories.index'), ['flash_success' => trans('alerts.backend.productcategories.updated')]);
    }

    public function destroy(ProductCategory $productcategory, DeleteProductCategoryRequest $request)
    {
        //Calling the delete method on repository
        $this->productcategory->delete($productcategory);
        //returning with successfull message
        return new RedirectResponse(route('admin.productcategories.index'), ['flash_success' => trans('alerts.backend.productcategories.deleted')]);
    }
    
}
