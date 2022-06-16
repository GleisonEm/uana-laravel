<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class AreaFormRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|max:100',
        ];
    }

    public function withValidator(Validator $validator)
    {
        collect($validator->errors()->all())->each(function($error) {
            Alert()->warning($error, 'Atenção !')->persistent("Ok");
        });
    }
}
