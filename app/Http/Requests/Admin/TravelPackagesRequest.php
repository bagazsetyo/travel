<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TravelPackagesRequest extends FormRequest
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
            'title' => 'required|max:255',
            'location' => 'required|max:255',
            'about' => 'required',
            'feature_evet' => 'required|max:255',
            'language' => 'required|max:255',
            'food' => 'required|max:255',
            'departure_date' => 'required|max:255',
            'duration' => 'required|max:255',
            'type' => 'required|max:255',
            'price' => 'required|integer',
        ];
    }
}
