<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|string|max:20',
            'overview' => 'required|string|max:500',
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => 'チーム名を必ず記入してください。',
            'overview.required'  => 'チームの概要を必ず記入してください。',
        ];
    }
}
