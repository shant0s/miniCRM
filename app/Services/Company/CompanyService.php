<?php

namespace App\Services\Company;

use App\Repositories\Company\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;

class CompanyService
{
    /**
     * @var CompanyRepository
     */
    protected CompanyRepository $companyRepository;

    /**
     * @param CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    /**
     * @return mixed
     */
    public function pluckAll()
    {
        return $this->companyRepository->pluckAll();
    }

    /**
     * @param $limit
     * @return mixed
     */
    public function getPaginatedList($limit)
    {
        return $this->companyRepository->paginate($limit);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id)
    {
        return $this->companyRepository->getById($id);
    }

    /**
     * @param Request $request
     * @return mixed
     * @throws Throwable
     */
    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
            if ($request->file('image')) {
                $image = $request->file('image');
                $fileName = mt_rand(1000, 1000000) . '-' . $image->getClientOriginalName();
                $image->storeAs('public/company', $fileName);
                $request->merge(['logo' => $fileName])->all();
            }

            $this->companyRepository->store($request->except('image'));

            DB::commit();

        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }
    }

    /**
     * @param Request $request
     * @param $id
     * @return void
     * @throws Throwable
     */
    public function update(Request $request, $id)
    {
        DB::beginTransaction();
        try {

            $company = $this->companyRepository->getById($id);

            if ($request->file('image')) {

                $image = $request->file('image');
                $fileName = mt_rand(1000, 1000000) . '-' . $image->getClientOriginalName();
                $image->storeAs('public/company', $fileName);

                if (file_exists(public_path('storage/company/' . $company->logo))) {
                    unlink(public_path('storage/company/' . $company->logo));
                }

                $request->merge(['logo' => $fileName])->all();

            }

            $this->companyRepository->update($request->except('image'), $company);

            DB::commit();

        } catch (Throwable $exception) {
            DB::rollBack();
            throw $exception;
        }

    }

    /**
     * @param $id
     * @return void
     * @throws Throwable
     */
    public function delete($id)
    {
//        DB::beginTransaction();
//        try {

            $company = $this->companyRepository->getById($id);

            $this->companyRepository->destroy($id);

            if (!is_null($company->logo) && file_exists(public_path('storage/company/' . $company->logo))) {
                unlink(public_path('storage/company/' . $company->logo));
            }

//            DB::commit();
//        } catch (Throwable $exception) {
//
//            DB::rollBack();
//            throw $exception;
//        }
    }


}
