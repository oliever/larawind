<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreEmployeeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'     => [
                'string',
                'required',
            ],
            'location_id'     => [
                'string',
                'required',
            ],
        ];
    }

    public function authorize()
    {
        return true;//Gate::allows('user_access');
    }
}
