<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateVehiculePersoRequest extends FormRequest
{
   /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Return true to allow any user to make this request
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
            'immatriculation' => 'required|string|max:15|unique:vehicule,immatriculation',
            'marque' => 'required|string|max:15',
            'model' => 'required|string|max:15',
            'annee_model' => 'required|integer|min:1900|max:' . now()->year,
            'photo' => 'required|string|max:255'
        ];
    }
}
