<?php
    
    namespace App\Http\Controllers;
    
    use App\Models\Category;
    use App\Http\Requests\StoreCategoryRequest;
    use App\Http\Requests\UpdateCategoryRequest;
    use App\Services\CategoryService;
    
    class CategoryController extends Controller
    {
        public function __construct(
            public CategoryService $service
        )
        {}
        
        public function index()
        {
            $this->authorize("show category");
    
            $categories = Category::all();
            return view('categories.index', compact('categories'));
        }
        
        public function create()
        {
            $this->authorize("add category");
    
            return view("categories.create");
        }
        
        public function store(StoreCategoryRequest $request)
        {
            try {
                $this->service->store($request->all());
            } catch (\Throwable $e) {
            
            }
            return redirect()->route("category.index")->withStatus(__("titles.category_added"));
        }
        
        public function show(Category $category)
        {
            //
        }
        
        public function edit(Category $category)
        {
            $this->authorize("edit category");
    
            return view("categories.edit", compact("category"));
        }
        
        public function update(UpdateCategoryRequest $request, Category $category)
        {
            try {
                $this->service->update($request->all(), $category);
            } catch (\Throwable $exception) {
            
            }
            return redirect()->route("category.index")->withStatus(__("titles.category_updated"));
        }
        
        public function destroy(Category $category)
        {
            $this->authorize("delete category");
    
            $this->service->delete($category);
            return redirect()->route("category.index")->withStatus(__("titles.category_deleted"));
        }
        
        public function deleted() {
            $categories = Category::onlyTrashed()->get();
            return view("categories.deleted", compact("categories"));
        }
        
        public function restore($category) {
            Category::withTrashed()->find($category)->restore();
            return redirect()->back()->withStatus(__("titles.category_restored"));
        }
        
        public function forceDelete($category) {
            Category::withTrashed()->find($category)->forceDelete();
            return redirect()->back()->withStatus(__("titles.category_deleted"));
        }
    }
