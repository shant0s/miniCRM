<?php

namespace Tests\Feature\Company;

use App\Models\Company;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Tests\TestCase;

class CompanyFailTest extends TestCase
{
    use WithFaker;

    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * test create company
     *
     * @return void
     */
    public function test_company_image_size_validation()
    {
        $companyData = [
            'name' => $this->faker->unique()->company,
            'email' => $this->faker->unique()->safeEmail(),
            'image' => UploadedFile::fake()->image('company.png', 200, 100),
            'website' => $this->faker->unique()->title,
        ];

        $response = $this->actingAs($this->user)->post('company', $companyData);
        $response->assertRedirect('company');

    }

    /**
     * test create company
     *
     * @return void
     */
    public function test_company_unique_name_()
    {

        $company = Company::factory()->create();

        $companyData = [
            'name' => $company->name,
            'email' => $this->faker->unique()->safeEmail(),
            'image' => UploadedFile::fake()->image('company.png', 100, 100),
            'website' => $this->faker->unique()->title,
        ];

        $response = $this->actingAs($this->user)->post('company', $companyData);
        $response->assertRedirect('company');

    }


}
