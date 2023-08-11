<?php

namespace App\Http\Requests\RegisterBoat;

use Illuminate\Foundation\Http\FormRequest;

class Form2Request extends FormRequest
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
            'form1_id' => ['required', 'exists:register_boats,id'],
            'income_sources' => ['nullable', 'array'],
            'income_sources.*' => 'in:Capture Fishing,Aquaculture,Fish Vending,Fish Processing,Gleaning,Other',
            'gear_used' => 'nullable',
            'culture_method' => 'nullable',
            'specify' => 'nullable',
            'other_income_sources' => ['nullable', 'array'],
            'other_income_sources.*' => 'in:Capture Fishing,Aquaculture,Fish Vending,Fish Processing,Gleaning,Other',
            'gear_used_os' => 'nullable',
            'culture_method_os' => 'nullable',
            'specify_os' => 'nullable',
            'org_name' => 'nullable',
            'member_since' => 'nullable',
            'position' => 'nullable',
        ];
    }
}
