<?php

namespace App\Services\Category;

use Exception;
use App\Models\Category\Category;
use Illuminate\Support\Facades\DB;

class CategoryService
{
    public function getAllCategory()
    {
        $categories = Category::with('brand')->get();

        return $categories;
    }

    public function storeCategory($data)
    {
        try{
            DB::beginTransaction();

            $category =Category::create($data);

            DB::commit();

        }catch(Exception $exception){
            DB::rollback();
        }

        return $category;
    }

    public function showCategory($id)
    {
        $category = Category::findOrFail($id);

        return $category;
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);

        return $category;
    }

    public function updateCategory($data, $id)
    {
        try{
            DB::beginTransaction();

            $category = Category::findOrFail($id);

            $category->update($data);

            DB::commit();
        }catch(Exception $exception){
            DB::rollBack();
        }
        return ($category);
    }

    public function deleteCategory($id)
    {
        try{
            DB::beginTransaction();

            $category = Category::findOrFail($id);

            $category->delete();

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();
        }
        return $category;
    }
}
