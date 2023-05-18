<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatetaskRequest extends FormRequest
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
        if($this->method()=='PUT') {
            return [
                'name' => ['required'],
                'deadline' => ['nullable', 'date', 'after:today'],
                'Description' => ['nullable'],
                'status' => ['required', Rule::in(['Undone', 'Done'])],
                //'list_id' => ['required', 'exists:todolists,id'],
            ];
        }
        else{
            return [
                'name' => ['sometimes','required'],
                'deadline' => ['nullable', 'date', 'after:today'],
                'Description' => ['nullable'],
                'status' => ['sometimes','required', Rule::in(['Undone', 'Done'])],
                'list_id' => ['sometimes','required', 'exists:todolists,id'],
            ];

        }
    }
}
