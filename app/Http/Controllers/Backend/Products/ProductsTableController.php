<?php

namespace App\Http\Controllers\Backend\Products;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\Products\ManageProductRequest;
use App\Repositories\Backend\Products\ProductRepository;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class ProductsTableController.
 */
class ProductsTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProductRepository
     */
    protected $product;

    /**
     * contructor to initialize repository object
     * @param ProductRepository $product ;
     */
    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    /**
     * This method return the data of the model
     * @param ManageProductRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProductRequest $request)
    {
        return Datatables::of($this->product->getForDataTable())
            ->escapeColumns(['name'])
            ->addColumn('status', function ($product) {
                return $product->status;
            })
            ->addColumn('publish_datetime', function ($product) {
                return $product->publish_datetime->format('d/m/Y h:i A');
            })
            ->addColumn('created_by', function ($product) {
                return $product->user_name;
            })
            ->addColumn('created_at', function ($product) {
                return $product->created_at->toDateString();
            })
            ->addColumn('actions', function ($product) {
                return $product->action_buttons;
            })
            ->make(true);
    }
}
