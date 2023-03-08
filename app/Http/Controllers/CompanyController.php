<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\StoreCompanyRequest;
use App\Http\Requests\Company\UpdateCompanyRequest;
use App\Services\Company\CompanyService;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Throwable;

class CompanyController extends Controller
{

    protected CompanyService $companyService;

    public function __construct(CompanyService $companyService)
    {
        $this->companyService = $companyService;
    }


    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function index()
    {
        $limit = env('PAGE_LIMIT', 10);
        $companies = $this->companyService->getPaginatedList($limit);

        return view('company.index', compact('companies'));
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * @param StoreCompanyRequest $request
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     * @throws Throwable
     */
    public function store(StoreCompanyRequest $request)
    {
        $this->companyService->create($request);

        return redirect('company')->with('success', 'Company has been created');
    }

    /**
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function show(int $id)
    {
        $company = $this->companyService->getById($id);

        return view('company.view', compact('company'));
    }

    /**
     * @param int $id
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function edit(int $id)
    {
        $company = $this->companyService->getById($id);

        return view('company.edit', compact('company'));
    }

    /**
     * @param UpdateCompanyRequest $request
     * @param int $id
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     * @throws Throwable
     */
    public function update(UpdateCompanyRequest $request, int $id)
    {
        $this->companyService->update($request, $id);

        return redirect('company')->with('success', 'Company has been updated');
    }

    /**
     * @param int $id
     * @return Application|\Illuminate\Foundation\Application|RedirectResponse|Redirector
     * @throws Throwable
     */
    public function destroy(int $id)
    {
        $this->companyService->delete($id);

        return redirect('company')->with('success', 'Company deleted successfully!!');
    }
}
