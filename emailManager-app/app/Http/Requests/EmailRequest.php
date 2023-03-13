<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
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
            'email_from' => 'required|email',
            'email_to' => 'required|email',
            'email_cc' => 'nullable|email',
            'subject' => 'required',
            'type' => 'required',
            'body' => 'required',
        ];
    }
}
