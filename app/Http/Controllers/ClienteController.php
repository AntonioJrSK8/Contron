<?php

namespace App\Http\Controllers;

use stdClass;
use App\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cliente.lista');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getClienteData()
    {
        $data = Cliente::select(['id', 'nome', 'nome_fantasia']);
        return \DataTables::of($data)->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cliente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->_validate($request);
        Cliente::create($data);
        return redirect()->route('cliente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    //public function edit(Cliente $cliente)
    //{
    //    $dados = $cliente;
    //    return view('cliente.edit', compact('dados'));
    //}

    public function edit($id)
    {

        return view('cliente.edit', ['dados' => Cliente::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {

        $data = $this->_validate($request);

        $cliente->fill($data);

        //$update = $cliente::where('id', $request->input('id'))
        //          ->update(['nome' => $request->input('nome'),
        //                    'nome_fantasia' => $request->input('nome_fantasia') ]);

        $st = new stdClass;
        if ($cliente) {
            $st->status = true;
            $st->message = "Gravado com sucesso!";

            return redirect()
                ->back()
                ->with('st', $st);
        } else {
            $st->status = false;
            $st->message = "Erro ao tentar gravar!";

            return redirect()
                ->back()
                ->with('st', $st);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //var_dump($cliente->input('id'));
        $centroCusto = Cliente::find($request->input('id'));
        //dd($centroCusto);

        $st = new stdClass;

        if ($centroCusto->delete()) {
            $st->status = true;
            $st->message = "Registro deletado com sucesso!";

            return response()->json($st);
        } else {
            $st->status = false;
            $st->message = "Erro na tentativa de deletar!";

            return response()->json($st);
        }
    }

    protected function _validate(Request $request)
    {
        $ruler = [
            'user_id' => 'required',
            'nome' => 'required|max:255',
            'nome_fantasia' => 'required'
        ];
        return $this->validate($request, $ruler);
    }
}
