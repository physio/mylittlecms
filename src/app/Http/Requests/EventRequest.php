<?php

namespace Physio\MyLittleCMS\Http\Requests;

use Physio\MyLittleCMS\Http\Requests\Request;

class EventRequest extends \Backpack\CRUD\app\Http\Requests\CrudRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // only allow updates if the user is logged in
        return \Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:150',
            'description' => 'required',
            'image' => 'string',
            'address' => 'string',
            'dateStart' => 'required|date',
            'dateEnd'   => 'after_or_equal:date',
            'published' => 'boolean',
            'registration' => 'url',
        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            //
        ];
    }

    /**
     * Get the validation messages that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
