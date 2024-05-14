<?php

namespace App\Services\Product;

use Exception;
use App\Models\Product\Product;
use Illuminate\Support\Facades\DB;

class ProductService
{
    public function getAllProduct()
    {
        return Product::with('category')->get();
    }
    public function storeProduct($data)
    {
        try {
            DB::beginTransaction();
            $product = Product::create($data);

            DB::commit();

        } catch (Exception $exception) {
            DB::rollBack();
        };

        return $product;
    }

    public function editProduct($id)
    {
        $product = Product::findOrFail($id);

        return $product;
    }

    public function updateProduct($data, $id)
    {
        try {
            DB::beginTransaction();

            $product = Product::findOrFail($id);

            $product->update($data);

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();
        };

        return $product;
    }

    public function deleteProduct($id)
    {
        try{
            DB::beginTransaction();

            $product = Product::find($id);

            $product->delete();

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();

        };

        return $product;
    }
}
