<?php

namespace Modules\Client\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'corporate_name' => 'nullable|string|max:255|unique:clients,corporate_name'.(isset($this->id)?','.$this->id.',id':''),
            'fantasy_name' => 'nullable|string|max:255',
            'cpf_cnpj' => 'nullable|string|unique:clients,cpf_cnpj'.(isset($this->id)?','.$this->id.',id':''),                // tem que fazer um custom para este
            'buyer' => 'nullable|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'phone' => 'nullable|string|max:255',
            'street' => 'nullable|string|max:255',
            'number' => 'nullable|integer|min:0',
            'apartment' => 'nullable|string|max:255',
            'neighborhood' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
            'st' => 'nullable|string|max:2',
            'postcode' => 'nullable|string|max:8',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
