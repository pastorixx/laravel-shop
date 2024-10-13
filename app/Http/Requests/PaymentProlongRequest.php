<?php

namespace App\Http\Requests;

use App\Enums\PurchaseTypes;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class PaymentProlongRequest extends FormRequest
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
            'purchase_id' => ['required', 'integer', 'exists:purchases,id'],
            'number_of_hours' => ['required_if:purchase_type,' . PurchaseTypes::RENT->value, 'nullable', 'integer', 'in:4,8,12,24'],
        ];
    }
}
