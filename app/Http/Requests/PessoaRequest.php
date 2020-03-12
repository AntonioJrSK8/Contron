<?php

namespace App\Http\Requests;

use App\Pessoa;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class PessoaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $pessoa_tipo = Pessoa::getPessoaType($this->pessoa_tipo);
        $documentNumberType = $pessoa_tipo == Pessoa::TYPE_INDIVIDUAL ? 'cpf' : 'cnpj';
        $pessoa = $this->route('pessoa');
        $pessoaId = $pessoa instanceof pessoa ? $pessoa->id : null;

        $rules = [
            'nome' => 'required|max:255',
            //'documento_numero' => "required|unique:pessoas,documento_numero,$pessoaId|documento_numero:$documentNumberType",
            'documento_numero' => "required|unique:pessoas,documento_numero,$pessoaId",
            'email' => 'required|email',
            'fone' => 'required',
        ];

        $StatusCivil = implode(',', array_keys(Pessoa::STATUS_CIVIL));

        $rulesIndividual = [
            'data_nascimento' => 'required|date',
            'status_civil' => "required|in:$StatusCivil",
            'sexo' => 'required|in:m,f',
            'def_fisica' => 'max:255'
        ];

        $rulesLegal = [
            'empresa_nome' => 'required|max:255'
        ];

        return $pessoa_tipo == pessoa::TYPE_INDIVIDUAL ? $rules + $rulesIndividual : $rules + $rulesLegal;
    }
}
