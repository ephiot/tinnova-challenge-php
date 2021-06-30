<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleUpdate extends FormRequest
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
            'vehicle' => 'sometimes|string|required|min:3',
            'brand' => 'sometimes|string|required|min:3',
            'year' => 'sometimes|required|date_format:Y|before_or_equal:' . date('Y'),
            'description' => 'sometimes|string|required|max:2048',
            'sold' => 'sometimes|required|boolean'
        ];
    }
}
