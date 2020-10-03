<?php


namespace App\Http\Controllers\Frontend\Documents;

use App\Http\Controllers\Frontend\BaseController;
use App\Repositories\Backend\DocumentCategories\DocumentCategoryRepository;
use App\Repositories\Backend\Documents\DocumentRepository;

class DocumentController extends BaseController
{
    private $status = [
        'Published' => 'Published',
    ];
    protected $categories = null;

    protected $documentCategoryRepo;
    protected $documentRepo;

    public function __construct(
        DocumentCategoryRepository $documentCategoryRepository,
        DocumentRepository $documentRepository
    )
    {
        parent::__construct();
        $this->documentCategoryRepo = $documentCategoryRepository;
        $this->documentRepo = $documentRepository;
        $this->categories = $this->documentCategoryRepo->query()->whereStatus(1)->get();
    }

    public function index()
    {
        $documents = $this->documentRepo->getPaginated(6, $this->status, 'publish_datetime', 'asc');
        return view('frontend.documents.index')->with([
            'documents' => $documents,
            'blogMenus' => $this->blogMenus,
            'productMenus' => $this->productMenus,
            'documentMenus' => $this->documentMenus,
            'categories' => $this->categories,
        ]);
    }

    public function listByCategory($slug)
    {
        $category = $this->documentCategoryRepo->getBySlug($slug);
        $documents = $this->documentRepo->getByCategory($category, 6, 'publish_datetime', 'asc');
        return view('frontend.documents.index')->with([
            'documents' => $documents,
            'blogMenus' => $this->blogMenus,
            'productMenus' => $this->productMenus,
            'documentMenus' => $this->documentMenus,
            'categories' => $this->categories,
            'active_category' => $category
        ]);
    }
}
