<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuestallRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return ['questall.title' => 'required|string|max:100',
            'questall.body' => 'required|string|max:4000',
            //
        ];
    }
}
