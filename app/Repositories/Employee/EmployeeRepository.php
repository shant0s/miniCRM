<?php

namespace App\Repositories\Employee;

use App\Models\Employee;
use App\Repositories\BaseRepository;

class EmployeeRepository extends BaseRepository
{

    /**
     * var Employee $employee
     */
    public $employee;

    public function __construct(Employee $employee)
    {
        parent::__construct($employee);
    }

}