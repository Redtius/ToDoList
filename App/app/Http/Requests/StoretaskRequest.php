<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoretaskRequest extends FormRequest
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
        return [
            'name'=>['required'],
//            'deadline'=> ['nullable','date','after:today'],
//            'Description'=> ['nullable'],
//            'status'=>['required',Rule::in(['Undone','Done'])],
//            'list_id'=>['required','exists:todolists,id'],
        ];
    }
}
