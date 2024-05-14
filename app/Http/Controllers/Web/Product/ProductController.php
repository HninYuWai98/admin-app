<?php

namespace App\Http\Controllers\Web\Product;

use Illuminate\Http\Request;
use App\Models\Product\Product;
use App\Models\Category\Category;
use App\Http\Controllers\Controller;
use App\Services\Product\ProductService;

class ProductController extends Controller
{
    //
    protected $productService;

    public function __construct(
        ProductService $productService
    )
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $products = $this->productService->getAllProduct();
        return view('product.index')->with(['products' => $products]);
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create')->with(['categories' => $categories]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id'=>'required'
        ]);

        $product = $this->productService->storeProduct($data);

        return redirect()->route('products.index')
            ->withSuccess('New product is added successfully.');
    }


    public function edit($id)
    {
        $product = $this->productService->editProduct($id);
        $categories = Category::all();
        return view('product.edit')->with([
            'product' => $product,
            'categories' => $categories,
            ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required',
            'category_id'=>'required'
        ]);

        $product = $this->productService->updateProduct($data, $id);

        return redirect()->route('products.index')
        ->withSuccess('updated successfully.');
    }

    public function destroy($id)
    {
        $product = $this->productService->deleteProduct($id);

        return redirect()->route('products.index')
            ->withSuccess('deleted successfully.');
    }
}
