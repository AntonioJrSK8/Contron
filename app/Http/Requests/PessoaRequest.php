<?php

namespace App\Http\Requests;

use App\Pessoa;
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
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $pessoaType = Pessoa::getPessoaType($this->pessoa_tipo);
        $documentNumberType = $pessoaType == Pessoa::TYPE_INDIVIDUAL ? 'cpf' : 'cnpj';
        $pessoa = $this->route('pessoa');
        $pessoaId = $pessoa instanceof pessoa ? $pessoa->id : null;

        $rules = [
            'nome' => 'required|max:255',
            'documento_numero' => "required|unique:pessoas,documento_numero,$pessoaId|documento_numero:$documentNumberType",
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

        return $pessoaType == pessoa::TYPE_INDIVIDUAL ? $rules + $rulesIndividual : $rules + $rulesLegal;
    }
}
