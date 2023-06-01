<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;


class SmsForm extends FormRequest
{
    
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json(['errors' => $validator->errors()], 422));
    }

    public function rules()
    {
        return [
            'sender' => ['required', 'string', 'min:3', 'max:11'],
            'recipients' => ['required', 'string', 'min:1'],
            'msg' => ['required'],
        ];
    }

    public function authorize()
    {
        return true;
    }
}
