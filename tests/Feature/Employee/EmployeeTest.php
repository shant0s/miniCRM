<?php

namespace Tests\Feature\Employee;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EmployeeTest extends TestCase
{
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * test list employee
     *
     * @return void
     */
    public function test_employee_list()
    {
        $this->actingAs($this->user)
            ->get('employee')
            ->assertStatus(200);
    }

    /**
     * test create employee
     *
     * @return void
     */
    public function test_create_employee()
    {
        $company = Company::factory()->create();

        $employeeData = [
            'firstname' => $this->faker->unique()->firstName,
            'lastname' => $this->faker->unique()->lastName,
            'company_id' => $company->id,
        ];

        $response = $this->actingAs($this->user)->post('employee', $employeeData);
        $response->assertRedirect('employee');

    }

    /**
     * test view employee
     *
     * @return void
     */
    public function test_view_employee()
    {
        $employee = Employee::factory()->create();

        $this->actingAs($this->user)
            ->get('employee/'.$employee->id)
            ->assertStatus(200);

    }

    /**
     * test update employee
     *
     * @return void
     */
    public function test_update_employee()
    {
        $employee = Employee::factory()->create();
        $company = Company::factory()->create();

        $employeeData = [
            'firstname' => $this->faker->unique()->firstName,
            'lastname' => $this->faker->unique()->lastName,
            'company_id' => $company->id,
        ];

        $response = $this->actingAs($this->user)->put('employee/'.$employee->id, $employeeData);
        $response->assertRedirect('employee');

    }

    /**
     * test update employee
     *
     * @return void
     */
    public function test_delete_employee()
    {
        $employee = Employee::factory()->create();

        $response = $this->actingAs($this->user)->delete('employee/'.$employee->id);
        $response->assertRedirect('employee');

    }


}
