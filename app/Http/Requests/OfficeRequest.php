<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OfficeRequest extends FormRequest
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
        $rules = [];

        switch($this->method()){
            case 'GET':
            break;
            case 'POST':
            case 'PUT':
                $rules = [
                    "city"              => "required|max:50",
                    "phone"             => "required|string|max:15",
                    "addressLine1"      => "required|string|max:50",
                    "country"           => "required|string|max:50",
                    "postalCode"        => "required|string|max:15",
                    "territory"         => "required|string|max:10"
                ];
            break;
            case 'PATCH':
            break;
            case 'DELETE':
            break;
        }

        return $rules;
    }
}
