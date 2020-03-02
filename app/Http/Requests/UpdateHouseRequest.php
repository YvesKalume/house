<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHouseRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'avenue'=>'bail | required | max:225',
            'number'=>'bail | required | max:4',
            'square'=>'bail | required | max:225',
            'pieces'=>'bail | required | numeric',
            'price'=>'bail | required | numeric',
            'picture'=>'bail | sometimes | image ',

        ];
    }
}
