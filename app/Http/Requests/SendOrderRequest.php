<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SendOrderRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'country_code' => ['required', 'in:+966'],
            'number' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string'],
            'offer' => ['required'],
        ];
    }
}
