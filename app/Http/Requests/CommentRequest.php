<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'comment.body' => 'required|string|max:500',
        ];
    }
    
    public function messages()
    {
        return [
            'comment.body.required'  => 'コメントが記入されていません。',
        ];
    }
}
