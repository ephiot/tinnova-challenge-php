<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStore extends FormRequest
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
            'vehicle' => 'string|required|min:3',
            'brand' => 'string|required|min:3',
            'year' => 'required|date_format:Y|before_or_equal:' . date('Y'),
            'description' => 'string|required|max:2048',
            'sold' => 'required|boolean'
        ];
    }
}
