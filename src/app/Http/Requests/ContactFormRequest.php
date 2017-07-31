<?php

namespace Physio\MyLittleCMS\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'nome' => 'required',
            'cognome' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
            'messaggio' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ];
    }
}
