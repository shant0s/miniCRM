<?php

namespace App\Services\Company;

use App\Repositories\Company\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyService
{
    protected CompanyRepository $companyRepository;

    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function pluckAll(){
        return $this->companyRepository->pluckAll();
    }
    
    public function getPaginatedList($limit)
    {
        return $this->companyRepository->paginate($limit);
    }

    public function getById($id)
    {
        return $this->companyRepository->getById($id);
    }

    public function create(Request $request)
    {    
        DB::beginTransaction();
        try{
            if($request->file('image')){
                $image      = $request->file('image');
                $fileName   = mt_rand(1000, 1000000).'-'.$image->getClientOriginalName();
                $image->storeAs('public/company', $fileName);
                $request->merge(['logo' => $fileName])->all();
            }
            
            $this->companyRepository->store($request->except('image'));

            DB::commit();

        }catch(\Throwable $exception){
            DB::rollBack();
            throw $exception;
        }
    }

    public function update(Request $request, $id){
        DB::beginTransaction();
        try{

            $company = $this->companyRepository->getById($id);

            if($request->file('image')){
    
                $image      = $request->file('image');
                $fileName   = mt_rand(1000, 1000000).'-'.$image->getClientOriginalName();
                $image->storeAs('public/company', $fileName);
                
                if(file_exists(public_path('storage/company/'.$company->logo))){
                    unlink(public_path('storage/company/'.$company->logo));
                }
    
                $request->merge(['logo' => $fileName])->all();
                
            }
            
            $this->companyRepository->update($request->except('image'), $company);
    
            DB::commit();

        }catch(\Throwable $exception){
            DB::rollBack();
            throw $exception;
        }

    }

    public function delete($id){
        DB::beginTransaction();
        try{

            $company = $this->companyRepository->getById($id);

            $this->companyRepository->destroy($id);

            if(!is_null($company->logo) && file_exists(public_path('storage/company/'.$company->logo))){
                unlink(public_path('storage/company/'.$company->logo));
            }

            DB::commit();
        }catch(\Throwable $exception){

            DB::rollBack();
            throw $exception;
        }
    }


}