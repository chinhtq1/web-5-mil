<?php

namespace App\Http\Controllers\Backend\ProductCategories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ProductCategories\ManageProductCategoryRequest;
use App\Repositories\Backend\ProductCategories\ProductCategoryRepository;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

/**
 * Class ProductCategoriesTableController.
 */
class ProductCategoriesTableController extends Controller
{
    /**
     * variable to store the repository object
     * @var ProductCategoryRepository
     */
    protected $productcategory;

    /**
     * contructor to initialize repository object
     * @param ProductCategoryRepository $productcategory ;
     */
    public function __construct(ProductCategoryRepository $productcategory)
    {
        $this->productcategory = $productcategory;
    }

    /**
     * This method return the data of the model
     * @param ManageProductCategoryRequest $request
     *
     * @return mixed
     */
    public function __invoke(ManageProductCategoryRequest $request)
    {
        return Datatables::of($this->productcategory->getForDataTable())
            ->escapeColumns(['name'])
            ->addColumn('status', function ($productcategory) {
                return $productcategory->status_label;
            })
            ->addColumn('created_by', function ($productcategory) {
                return $productcategory->user_name;
            })
            ->addColumn('created_at', function ($productcategory) {
                return Carbon::parse($productcategory->created_at)->toDateString();
            })
            ->addColumn('actions', function ($productcategory) {
                return $productcategory->action_buttons;
            })
            ->make(true);
    }
}
