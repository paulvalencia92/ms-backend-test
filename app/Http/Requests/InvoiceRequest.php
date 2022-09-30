<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class InvoiceRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sender_id' => [auth()->user()->type === 'admin' ? 'required' : 'nullable', Rule::exists('users', 'id')],
            'receiver_id' => ['required', Rule::exists('users', 'id')],
            'iva' => ['required', 'numeric'],
            'items' => ['required', 'array'],
            'total' => ['required', 'numeric'],
            'totalInvoice' => ['required', 'numeric']
        ];
    }
}
