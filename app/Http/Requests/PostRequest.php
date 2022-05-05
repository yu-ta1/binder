<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'post.title' => 'required|string|max:50',
            'post.body' => 'required|string|max:1000',
        ];
    }
    
    public function messages()
    {
        return [
            'post.title.required' => 'タイトルを必ず記入してください。',
            'post.body.required'  => '内容を必ず記入してください。',
        ];
    }
}