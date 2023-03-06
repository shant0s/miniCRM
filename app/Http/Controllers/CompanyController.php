<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    /**
     * Display a listing of the company.
     */
    public function index()
    {
        $companies = Company::paginate(10);

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
        if($request->file('image')){
            $image      = $request->file('image');
            $fileName   = $image->getClientOriginalName();
            $image->storeAs('public/company', $fileName);
            $request->merge(['logo' => $fileName])->all();
        }
       
        $company = Company::create($request->except('image'));

        return redirect('company')->with('success', 'Company has been created');
    }

    /**
     * Display the specified company.
     */
    public function show(string $id)
    {
        $company = Company::findOrFail($id);
        
        return view('company.view', compact('company'));
    }

    /**
     * Show the form for editing the specified company.
     */
    public function edit(string $id)
    {
        $company = Company::findOrFail($id);
        
        return view('company.edit', compact('company'));
    }

    /**
     * Update the specified company.
     */
    public function update(UpdateCompanyRequest $request, string $id)
    {
        $company = Company::findOrFail($id);

        if($request->file('image')){

            $image      = $request->file('image');
            $fileName   = $image->getClientOriginalName();
            $image->storeAs('public/company', $fileName);
            
            if(file_exists(public_path('storage/company/'.$company->logo))){
                unlink(public_path('storage/company/'.$company->logo));
            }

            $request->merge(['logo' => $fileName])->all();
            
        }
        
        $company->update($request->except('image'));

        return redirect('company')->with('success', 'Company has been updated');
    }

    /**
     * Remove the specified company from storage.
     */
    public function destroy(string $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return redirect('company')->with('success', 'Company deleted successfully!!');
    }
}