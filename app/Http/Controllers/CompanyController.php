<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Services\Company\CompanyService;

class CompanyController extends Controller
{

    protected CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }


    /**
     * Display a listing of the company.
     */
    public function index()
    {
        $companies = $this->companyService->getPaginatedList(10);

        return view('company.index', compact('companies'));
    }

    /**
     * Show the form for creating a new company.
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a new company
     */
    public function store(StoreCompanyRequest $request)
    {
        $this->companyService->create($request);

        return redirect('company')->with('success', 'Company has been created');
    }

    /**
     * Display the specified company.
     */
    public function show(int $id)
    {
        $company = $this->companyService->getById($id);
        
        return view('company.view', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     */
    public function edit(int $id)
    {
        $company = $this->companyService->getById($id);
        
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified company.
     */
    public function update(UpdateCompanyRequest $request, int $id)
    {
        $this->companyService->update($request, $id);

        return redirect('company')->with('success', 'Company has been updated');
    }

    /**
     * Remove the specified company from storage.
     */
    public function destroy(int $id)
    {

        $this->companyService->delete($id);

        return redirect('company')->with('success', 'Company deleted successfully!!');
    }
}