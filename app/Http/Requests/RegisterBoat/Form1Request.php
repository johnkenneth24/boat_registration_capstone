<?php

namespace App\Http\Requests\RegisterBoat;

use Illuminate\Foundation\Http\FormRequest;

class Form1Request extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'registration_no' => 'required',
            'registration_date' => 'required',
            'registration_type' => 'required',

            'salutation' => 'required',
            'lastname' => 'required',
            'firstname' => 'required',
            'middlename' => 'nullable',
            'suffix' => 'nullable',

            'address' => 'required',
            'resident_since' => 'required',
            'nationality' => 'required',
            'gender' => 'required',
            'civil_status' => 'required',

            'contact_no' => 'required',
            'birthdate' => 'required',
            'age' => 'required',
            'birthplace' => 'required',
            'educational_background' => 'required',
            'children_count' => 'nullable',

            'emergency_contact_name' => 'required',
            'emergency_contact_number' => 'required',
            'emergency_contact_address' => 'required',
            'emergency_contact_relationship' => 'required',

        ];
    }
}
