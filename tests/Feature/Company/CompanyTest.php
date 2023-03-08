<?php

namespace Tests\Feature\Company;

use App\Models\Company;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CompanyTest extends TestCase
{
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * test list company
     *
     * @return void
     */
    public function test_company_list()
    {
        $this->actingAs($this->user)
            ->get('company')
            ->assertStatus(200);
    }

    /**
     * test create company
     *
     * @return void
     */
    public function test_create_company()
    {
        $companyData = [
            'name' => $this->faker->unique()->company,
            'email' => $this->faker->unique()->safeEmail(),
            'image' => UploadedFile::fake()->image('company.png', 100, 100),
            'website' => $this->faker->unique()->title,
        ];

        $response = $this->actingAs($this->user)->post('company', $companyData);
        $response->assertRedirect('company');

    }

    /**
     * test view company
     *
     * @return void
     */
    public function test_view_company()
    {
        $company = Company::factory()->create();

        $this->actingAs($this->user)
            ->get('company/'.$company->id)
            ->assertStatus(200);

    }

    /**
     * test update company
     *
     * @return void
     */
    public function test_update_company()
    {
        $company = Company::factory()->create();

        $companyData = [
            'name' => $this->faker->unique()->company,
            'email' => $this->faker->unique()->safeEmail(),
            'image' => UploadedFile::fake()->image('company.png', 100, 100),
            'website' => $this->faker->unique()->title,
        ];

        $response = $this->actingAs($this->user)->put('company/'.$company->id, $companyData);
        $response->assertRedirect('company');

    }

    /**
     * test update company
     *
     * @return void
     */
    public function test_delete_company()
    {
        $company = Company::factory()->create();

        $response = $this->actingAs($this->user)->delete('company/'.$company->id);
        $response->assertRedirect('company');

    }


}
