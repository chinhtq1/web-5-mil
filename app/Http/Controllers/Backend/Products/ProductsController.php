<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Responses\Backend\Products\IndexResponse;
use App\Models\ProductCategories\ProductCategory;
use App\Models\Products\Product;
use App\Http\Controllers\Controller;
use App\Http\Responses\RedirectResponse;
use App\Http\Responses\Backend\Products\CreateResponse;
use App\Http\Responses\Backend\Products\EditResponse;
use App\Repositories\Backend\Products\ProductRepository;
use App\Http\Requests\Backend\Products\ManageProductRequest;
use App\Http\Requests\Backend\Products\CreateProductRequest;
use App\Http\Requests\Backend\Products\StoreProductRequest;
use App\Http\Requests\Backend\Products\EditProductRequest;
use App\Http\Requests\Backend\Products\UpdateProductRequest;
use App\Http\Requests\Backend\Products\DeleteProductRequest;

/**
 * ProductsController
 */
class ProductsController extends Controller
{
    protected $status = [
        'Published' => 'Published',
        'InActive'  => 'InActive',
    ];
    /**
     * variable to store the repository object
     * @var ProductRepository
     */
    protected $product;


    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function index(ManageProductRequest $request)
    {
        return new IndexResponse($this->status);
    }

    public function create(CreateProductRequest $request)
    {
        $productCategories = ProductCategory::getSelectData();
        return new CreateResponse($this->status, $productCategories);
    }

    public function store(StoreProductRequest $request)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Create the model using repository create method
        $this->product->create($input);
        //return with successfull message
        return new RedirectResponse(route('admin.products.index'), ['flash_success' => trans('alerts.backend.products.created')]);
    }

    public function edit(Product $product, EditProductRequest $request)
    {
        $productCategories = ProductCategory::getSelectData();
        return new EditResponse($product, $this->status, $productCategories);
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        //Input received from the request
        $input = $request->except(['_token']);
        //Update the model using repository update method
        $this->repository->update( $product, $input );
        //return with successfull message
        return new RedirectResponse(route('admin.products.index'), ['flash_success' => trans('alerts.backend.products.updated')]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  DeleteProductRequestNamespace  $request
     * @param  App\Models\Products\Product  $product
     * @return \App\Http\Responses\RedirectResponse
     */
    public function destroy(Product $product, DeleteProductRequest $request)
    {
        //Calling the delete method on repository
        $this->repository->delete($product);
        //returning with successfull message
        return new RedirectResponse(route('admin.products.index'), ['flash_success' => trans('alerts.backend.products.deleted')]);
    }
    
}
