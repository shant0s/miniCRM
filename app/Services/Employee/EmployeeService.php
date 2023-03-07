<?php

namespace App\Services\Employee;

use App\Repositories\employee\employeeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeService
{
    protected EmployeeRepository $employeeRepository;

    public function __construct(EmployeeRepository $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    
    public function getPaginatedList($limit)
    {
        return $this->employeeRepository->paginate($limit);
    }

    public function getById($id)
    {
        return $this->employeeRepository->getById($id);
    }

    public function create(Request $request)
    {    
        DB::beginTransaction();
        try{
            
            $this->employeeRepository->store($request->all());

            DB::commit();

        }catch(\Throwable $exception){
            DB::rollBack();
            throw $exception;
        }
    }

    public function update(Request $request, $id){
        DB::beginTransaction();
        try{

            $employee = $this->employeeRepository->getById($id);
            $this->employeeRepository->update($request->all(), $employee);
    
            DB::commit();

        }catch(\Throwable $exception){
            DB::rollBack();
            throw $exception;
        }

    }

    public function delete($id){
        DB::beginTransaction();
        try{

            $this->employeeRepository->destroy($id);

            DB::commit();
        }catch(\Throwable $exception){
            DB::rollBack();
            throw $exception;
        }
    }


}