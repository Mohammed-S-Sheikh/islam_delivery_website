<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'vendor' => ['required', 'string', 'max:255'],
            'vendor_number' => ['required', 'string', 'max:255'],
            'customer_number_1' => ['required', 'string', 'max:255'],
            'customer_number_2' => ['required', 'string', 'max:255'],
            'customer_address' => ['required', 'string', 'max:255'],
            'total' => ['required', 'numeric', 'min:0'],
            'number_of_items' => ['required', 'numeric', 'min:0'],
            'city_id' => ['required', 'exists:cities,id'],
            'delegate_id' => ['required', 'exists:delegates,id'],
            'state_id' => ['required', 'exists:states,id'],
            'notes' => ['nullable', 'string'],
        ];
    }
}
