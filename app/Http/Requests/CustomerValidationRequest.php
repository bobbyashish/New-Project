<?php

namespace App\Http\Requests;
use App\Models\Customer;
use Illuminate\Foundation\Http\FormRequest;

class CustomerValidationRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'email' => 'required|email|max:255',
                'address1' => 'required|string|max:255',
                'address2' => 'nullable|string|max:255',
                'state' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'city' => 'required|string|max:255',
                'pincode' => 'required|string|max:255',
                'type' => 'required',
                'phone' => 'required|string|max:12', 
                'terms_accepted' => 'required|in:1,0',
                
            ];
    }
    public function messages(): array
    {
        return [
            'required'  => 'Required field',
           
        ];
    }
}
