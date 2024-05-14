<?php

namespace App\Http\Controllers\Web\Employee;

use App\Http\Controllers\Controller;
use App\Models\Department\Department;
use App\Models\Employee\Employee;
use App\Services\Department\DepartmentService;
use App\Services\Employee\EmployeeService;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $employeeService;
    protected $departmentService;

    public function __construct(
        EmployeeService $employeeService,
        DepartmentService $departmentService
    )
    {
        $this->employeeService = $employeeService;
    }
    public function index()
    {
        $employees =  $this->employeeService->getAllEmployee();
        return view('employee.index')->with([
            'employees'=>$employees
        ]);
    }

    public function create()
    {
        $departments = Department::all();
        return view('employee.create')->with(['departments'=>$departments]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required|string|min:3',
            'email'=>'required|email',
            'department_id'
        ]);

        $data= $request->all();

        $employee = $this->employeeService->storeEmployee($data);

        return redirect()->route('employees.index')->withSuccess('New Employee is added successfully');
    }

    public function show($id)
    {

        $employee = $this->employeeService->showEmployee($id);

        return view('employee.show')->with(['employee'=>$employee]);
    }

    public function edit($id)
    {

        $employee=$this->employeeService->editEmployee($id);
        $departments = Department::all();
        return view('employee.edit')->with([
            'employee'=>$employee,
            'departments'=>$departments
        ]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name'=>'required|string|min:5',
            'email'=>'required|email',
            'department_id'=>'required'
        ]);

        $employee = $this->employeeService->updateEmployee($data, $id);

        return redirect()->route('employees.index')->withSuccess('Employee Data Updated Successfully.');
    }

    public function destroy($id)
    {
        $employee = $this->employeeService->deleteEmployee($id);

        return redirect()->route('employees.index')->withSuccess('Employee removed successfully.');
    }
}
