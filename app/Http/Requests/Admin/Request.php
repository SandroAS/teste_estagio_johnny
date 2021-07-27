<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class Request extends FormRequest
{
    public function authorize()
    {
        return Auth::check();
    }

    public function rules()
    {
        return [
            'owner' => 'required',
            'acquirer' => 'required|different:owner',
            'price' => 'required_if:sale,on',
            'property' => 'required|integer',
            'created_at' => 'required',
        ];
    }
}
