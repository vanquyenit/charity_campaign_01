<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class EventRequest extends FormRequest
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
            'name' => 'required|min:10',
            'start_date' => 'required|date|date_format:"Y/m/d',
            'end_date' => 'required|date|date_format:"Y/m/d',
            'image' => ['required', 'mimes:jpg,jpeg,JPEG,png,gif', 'max:2024'],
            'address' => 'required',
            'description' => 'required',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => trans('event.validate.name.required'),
            'name.min' => trans('event.validate.name.minlengh'),
            'start_date.required' => trans('event.validate.start_date.required'),
            'end_date.required' => trans('event.validate.end_date.required'),
            'image.required' => trans('event.validate.image.required'),
            'address.required' => trans('event.validate.address.required'),
            'description.required' => trans('event.validate.description.required'),
            'content.required' => trans('event.validate.content.required'),
        ];
    }
}
