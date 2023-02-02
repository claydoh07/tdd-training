<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgrammerAddRequest extends FormRequest
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
            'full_name'      => 'required|string',
            'email'          => 'required|unique:programmers|string',
            'job_title'      => 'nullable|string',
            'address'        => 'required|string',
            'year_graduated' => 'nullable|numeric'
        ];
    }
}
