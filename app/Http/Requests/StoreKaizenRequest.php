<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreKaizenRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'     => [
                'name',
                'required',
            ],
            'date'    => [
                'required',
                'unique:users',
            ],
            'location' => [
                'required',
            ],
        ];
    }

    public function authorize()
    {
        return Gate::allows('kaizen_access');
    }
}
