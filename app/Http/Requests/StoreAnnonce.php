<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnnonce extends FormRequest
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
            'titre' => 'required|max:65',
            'contenu' => 'required|max:2000',
            'price' => 'nullable|numeric|min:0|max:99',
            'category_id' => [
            'required',
            \Illuminate\validation\Rule::exists('categories', 'id')->where(function($query){
                $query->where('usable', true);
            })

            ],
            'tags'=> 'max:3',
        ];
    }

    public function messages()
    {
        return [
            'titre.required' => 'Un titre est requis',
            'titre.max' => 'Le champ titre ne peut dépasser 65 caractères',
            'contenu.required' => 'Veuillez remplir le champ contenu',
            'tags.max' => 'Veuillez choisir trois tags maxium.',
            'price.min' => "le prix doit être d'une valeur minimum de 0",
            'price.max' =>"le prix doit être d'une valeur maximum de 99",
        ];
    }
}
