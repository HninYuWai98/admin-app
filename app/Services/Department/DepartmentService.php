<?php

namespace App\Services\Department;

use App\Models\Department\Department;
use Exception;
use Illuminate\Support\Facades\DB;


class DepartmentService
{
    public function getAllDepartment()
    {
        $departments = Department::all();
        return $departments;
    }

    public function storeDepartment($data)
    {
        try{
            DB::beginTransaction();

            $department = Department::create($data);

            DB::commit();

        }catch(Exception $exception){
            DB::rollback();
        }

        return $department;
    }

    public function showDepartment($id)
    {
        $department = Department::findOrFail($id);

        return $department;
    }

    public function editDepartment($id)
    {
        $department = Department::findOrFail($id);

        return $department;
    }

    public function updateDepartment($data, $id)
    {
        try{
            DB::beginTransaction();

            $department = Department::findOrFail($id);

            $department->update($data);

            DB::commit();
        }catch(Exception $exception){
            DB::rollBack();
        }
        return ($department);
    }

    public function deleteDepartment($id)
    {
        try{
            DB::beginTransaction();

            $department = Department::findOrFail($id);

            $department->delete();

            DB::commit();

        }catch(Exception $exception){
            DB::rollBack();
        }
        return $department;
    }

}
