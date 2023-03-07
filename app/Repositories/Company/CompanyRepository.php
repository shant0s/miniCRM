<?php

namespace App\Repositories\Company;

use App\Models\Company;
use App\Repositories\BaseRepository;

class CompanyRepository extends BaseRepository
{

    /**
     * var Company $company
     */
    public $company;

    public function __construct(Company $company)
    {
        parent::__construct($company);
    }

}