<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateSemente extends FormRequest
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
            'nome_popular' => ['required', 'min:3', 'max:10000'],
            'nome_cientifico' => ['required', 'min:3', 'max:10000'],
            'especie' => ['required', 'min:3', 'max:10000'],
            'genero' => ['required', 'min:3', 'max:10000'],
            'quebra_de_dormencia' => ['required', 'min:3', 'max:10000'],
        ];
    }
}
