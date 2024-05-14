<?php

namespace App\Http\Controllers\Web\Category;

use App\Models\Brand\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Category\CategoryService;

class CategoryController extends Controller
{
    protected $categoryService;

    public function __construct(
        CategoryService $categoryService
    )
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        $categories =  $this->categoryService->getAllCategory();
        return view('category.index')->with([
            'categories'=>$categories
        ]);
    }

    public function create()
    {
        $brands = Brand::all();
        return view('category.create')->with(['brands'=>$brands]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|min:3',
            'brand_id'=>'required'
        ]);

        $data= $request->all();

        $category = $this->categoryService->storeCategory($data);

        return redirect()->route('categories.index')->withSuccess('New Category is added successfully');
    }

    public function edit($id)
    {

        $category =$this->categoryService->editCategory($id);
        $brands = Brand::all();
        return view('category.edit')->with([
            'category'=>$category,
            'brands'=>$brands
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'=>'required|string|min:3',
            'brand_id'=>'required'
        ]);

        $category = $this->categoryService->updateCategory($data, $id);

        return redirect()->route('categories.index')->withSuccess('Category Data Updated Successfully.');
    }

    public function destroy($id)
    {
        $category = $this->categoryService->deleteCategory($id);

        return redirect()->route('categories.index')->withSuccess('Category removed successfully.');
    }
}
