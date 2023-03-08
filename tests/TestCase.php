<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    use DatabaseTransactions;

    public function setUp()
    : void
    {
        parent::setUp();

        $this->withoutExceptionHandling();

        Artisan::call('migrate');
        Artisan::call('db:seed', ['--class' => 'TestDatabaseSeeder']);

        $this->user = User::find(1);
    }


}
