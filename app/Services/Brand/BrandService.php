<?php

namespace App\Services\Brand;

use Exception;
use App\Models\Brand\Brand;
use Illuminate\Support\Facades\DB;


class BrandService
{
    public function getAllBrand()
    {
        $brands = Brand::get();

        return $brands;
    }

    public function storeBrand($data)
    {
        try{
            DB::beginTransaction();

            $brand = Brand::create($data);

            DB::commit();

        }catch(Exception $exception){
            DB::rollback();
        }

        return $brand;
    }

    public function showBrand($id)
    {
        $brand = Brand::findOrFail($id);

        return $brand;
    }

    public function editBrand($id)
    {
        $brand = Brand::findOrFail($id);

        return $brand;
    }

    public function updateBrand($data, $id)
    {
        try{
            DB::beginTransaction();

            $brand = Brand::findOrFail($id);

            $brand->update($data);

            DB::commit();
        }catch(Exception $exception){
            DB::rollBack();
        }
        return ($brand);
    }

    public function deleteBrand($id)
    {
        try{
            DB::beginTransaction();

            $brand = Brand::findOrFail($id);

            $brand->delete();

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();
        }
        return $brand;
    }
}
