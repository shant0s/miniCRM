<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\StoreEmployeeRequest;
use App\Http\Requests\Employee\UpdateEmployeeRequest;
use App\Services\Company\CompanyService;
use App\Services\Employee\EmployeeService;

class EmployeeController extends Controller
{
    protected EmployeeService $employeeService;
    protected CompanyService $companyService;

    public function __construct(EmployeeService $employeeService, CompanyService $companyService)
    {
        $this->employeeService = $employeeService;
        $this->companyService = $companyService;
    }


    /**
     * Display a listing of the employee.
     */
    public function index()
    {
        $employees = $this->employeeService->getPaginatedList(10);

        return view('employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new employee.
     */
    public function create()
    {
        $companies = $this->companyService->pluckAll();

        return view('employee.create', compact('companies'));
    }

    /**
     * Store a new employee
     */
    public function store(StoreEmployeeRequest $request)
    {
        $this->employeeService->create($request);

        return redirect('employee')->with('success', 'Employee has been created');
    }

    /**
     * Display the specified employee.
     */
    public function show(int $id)
    {
        $employee = $this->employeeService->getById($id);
        
        return view('employee.view', compact('employee'));
    }

    /**
     * Show the form for editing the specified employee.
     */
    public function edit(int $id)
    {
        $employee = $this->employeeService->getById($id);
        $companies = $this->companyService->pluckAll();
        
        return view('employee.edit', compact('employee', 'companies'));
    }

    /**
     * Update the specified employee.
     */
    public function update(UpdateEmployeeRequest $request, int $id)
    {
        $this->employeeService->update($request, $id);

        return redirect('employee')->with('success', 'Employee has been updated');
    }

    /**
     * Remove the specified employee from storage.
     */
    public function destroy(int $id)
    {

        $this->employeeService->delete($id);

        return redirect('employee')->with('success', 'Employee deleted successfully!!');
    }
}
