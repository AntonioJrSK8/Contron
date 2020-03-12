<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaRequest;
use App\Pessoa;

class PessoaController extends Controller
{
    public function index()
    {
        \Session::flash('chave', 'valor da Chave da session');
        $pessoas = Pessoa::paginate(50);
        return view('pessoa.index', compact('pessoas'));
    }

    public function edit(Pessoa $pessoa) //Route Model Binding Implicito
    {
        $pessoa_tipo = $pessoa->pessoa_tipo;
        return view('pessoa.edit', compact('pessoa', 'pessoa_tipo'));
    }

    public function store(PessoaRequest $request)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['defaulter'] = $request->has('defaulter');
        $data['pessoa_tipo'] = Pessoa::getClientType($request->pessoa_tipo);
        Pessoa::create($data);
        //\Session::flash('message','Cliente cadastrado com sucesso');

        return redirect()->route('pessoa.index')
            ->with('message','Pessoa cadastrado com sucesso');
    }

    public function update(PessoaRequest $request, Pessoa $pessoa)
    {
        $data = $request->only(array_keys($request->rules()));
        $data['defaulter'] = $request->has('defaulter');
        $pessoa->fill($data);
        $pessoa->save();
        //\Session::flash('mensagem','pessoa alterado com sucesso');
        return redirect()->route('pessoas.index')
            ->with('mensagem', 'pessoae alterado com sucesso');
    }
}
