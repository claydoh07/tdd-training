<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProgrammerUpdateRequest extends FormRequest
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
            'full_name'      => 'sometimes|string',
            'email'          => 'sometimes|string',
            'job_title'      => 'sometimes|string',
            'address'        => 'sometimes|string',
            'year_graduated' => 'sometimes|numeric'
        ];
    }
}
