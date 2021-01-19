<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MailRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'  => 'required|min:3|string',
            'phone' => 'required|regex:/^\(?9\d\d\)?\s?\-?\d\d\d\s?\-?\d\d\s?\-?\d\d$/'
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'Поле имя должно быть заполнено',
            'name.min'          => 'Поле имя должно содержать минимум :min символов',
            'name.string'       => 'Поле имя не должно содержать цифр',
            'phone.regex'       => 'Неверный формат номера телефона',
            'phone.required'    => 'Поле номера телефона должно быть заполнено'
        ];
    }
}
