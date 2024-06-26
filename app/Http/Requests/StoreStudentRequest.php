<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:20'],
            'gender' => ['required', 'string', 'max:1'],
            'birth_year' => ['required'],
            'birth_month' => ['required'],
            'birth_day' => ['required'],
            'club' => ['required'],
            'cram_school' => ['required'],
        ];
    }
}
