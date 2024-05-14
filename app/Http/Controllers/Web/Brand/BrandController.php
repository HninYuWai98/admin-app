<?php

namespace App\Http\Controllers\Web\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand\Brand;
use App\Services\Brand\BrandService;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    protected $brandService;

    public function __construct(
        BrandService $brandService
    )
    {
        $this->brandService = $brandService;
    }

    public function index()
    {
        $brands =  Brand::all();
        return view('brand.index')->with([
            'brands'=>$brands
        ]);
    }

    public function create()
    {

        return view('brand.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|min:3'
        ]);

        $data= $request->all();

        $brand = $this->brandService->storeBrand($data);

        return redirect()->route('brands.index')->withSuccess('New Brand is added successfully');
    }

    public function edit($id)
    {

        $brand=$this->brandService->editBrand($id);

        return view('brand.edit')->with([
            'brand'=>$brand
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'=>'required|string|min:5',
        ]);

        $brand= $this->brandService->updateBrand($data, $id);

        return redirect()->route('brands.index')->withSuccess('Brand Data Updated Successfully.');
    }

    public function destroy($id)
    {
        $brand = $this->brandService->deleteBrand($id);

        return redirect()->route('brands.index')->withSuccess('Brand removed successfully.');
    }



}
