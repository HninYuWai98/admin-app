<?php

namespace App\Http\Controllers\Web\Department;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Services\Department\DepartmentService;


class DepartmentController extends Controller
{
    protected $departmentService;

    public function __construct(
        DepartmentService $departmentService
    )
    {
        $this->departmentService = $departmentService;
    }
    public function index()
    {
        $departments =  Department::all();
        return view('department.index')->with([
            'departments'=>$departments
        ]);
    }

    public function create()
    {

        return view('department.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|min:3'
        ]);

        $data= $request->all();

        $department = $this->departmentService->storeDepartment($data);

        return redirect()->route('departments.index')->withSuccess('New Employee is added successfully');
    }

    public function show($id)
    {

        $department = $this->departmentService->showDepartment($id);

        return view('department.show')->with(['department'=>$department]);
    }

    public function edit($id)
    {

        $department=$this->departmentService->editDepartment($id);

        return view('department.edit')->with([
            'department'=>$department
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'=>'required|string|min:5',
        ]);

        $department= $this->departmentService->updateDepartment($data, $id);

        return redirect()->route('departments.index')->withSuccess('Employee Data Updated Successfully.');
    }

    public function destroy($id)
    {
        $department = $this->departmentService->deleteDepartment($id);

        return redirect()->route('departments.index')->withSuccess('Employee removed successfully.');
    }
}
