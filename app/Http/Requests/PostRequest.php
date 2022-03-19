<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'progress' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'タスク名は必須です。',
            'progress.required' => '進捗は必須です。',
        ];
    }
}
