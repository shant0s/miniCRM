<?php

namespace App\Http\Requests\Company;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCompanyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required | string | unique:companies,name,'.$this->get('id'),
            'email' => 'required | email | | unique:companies,email,'.$this->get('id'),
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=100,height=100',
        ];
    }

    public function messages()
    {
        return[
            'image' => [
                'dimensions' => 'The :attribute dimension must be of 100 * 100'
            ]
        ];
    }
}
