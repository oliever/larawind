<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateEmployeeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name'     => [
                'string',
                'required',
            ],
            'location_id'     => [
            ],
        ];
    }

    public function authorize()
    {
        return true;//Gate::allows('user_access');
    }
}
