<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Request;

class ContributionRequest extends FormRequest
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
        $email = $this->request->get('email');
        $rulesGuest = [];
        if (isset($email)) {
            $rulesGuest = [
                'name' => 'required|max:255',
            ];
        }

        $rules = [
            'amount' => 'required|amount:amount',
            'description' => 'required',
        ];

        return array_merge($rules, $rulesGuest);
    }

    public function messages()
    {
        return [
            'amount.amount' => trans('campaign.validate.amount'),
        ];
    }
}
