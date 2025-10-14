<?php

namespace App\Http\Requests\GestionCompte;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
class ResponsableEtablissementRequest extends FormRequest{
    public function authorize()
    {
        return true;
    }
    public function rules()  {
        if ($this->isMethod('post')) {
            return [
                'nom' => 'required|string|regex:/^[A-Za-z ]*$/i',
                'prenom' => 'required|string|regex:/^[A-Za-z ]*$/i',
                'etablissement_id'=> 'sometimes|integer',
                'numero_fixe' => 'required|numeric',
                'numero_telephone'=> 'required|string',
                'email' => 'required|unique:responsable_etablissements,email,|email|max:50',
                'adresse' => 'required|string',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ];
         }else if($this->isMethod('PUT')){
             return [
                'nom' => 'sometimes|string|regex:/^[A-Za-z ]*$/i',
                'etablissement_id'=> 'sometimes|integer',
                'prenom' => 'sometimes|string|regex:/^[A-Za-z ]*$/i',
                'numero_fixe' => 'sometimes|numeric',
                'numero_telephone'=> 'sometimes|string',
                'email' => 'sometimes|email|max:50',
                'adresse' => 'sometimes|string',
                'photo' => 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
             ];
        }

    }
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Validation errors',
                'validation_error' => $validator->errors()
            ]));
    }
}
