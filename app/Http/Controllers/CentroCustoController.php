<?php

namespace App\Http\Controllers;

use App\CentroCusto;
use Illuminate\Http\Request;
use stdClass;

class CentroCustoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = CentroCusto::all();
        return view('centrocusto.lista', compact('data'));
    }
    public function getCentroCusto()
    {
        return view('centrocusto.lista');
    }

    public function getCentroCustoData()
    {
        $data = CentroCusto::select(['id', 'descricao']);
        return \DataTables::of($data)->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('centrocusto.create');
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
        CentroCusto::create($data);

        return redirect()->route('centrodecusto');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CentroCusto  $centroCusto
     * @return \Illuminate\Http\Response
     */
    public function show(CentroCusto $centroCusto)
    {
        $data = $centroCusto->all();
        return view('centrocusto.lista', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CentroCusto  $centroCusto
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('centrocusto.edit', ['dados' => CentroCusto::findOrFail($id)] );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CentroCusto $centroCusto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CentroCusto $centroCusto)
    {
        $update = $centroCusto::where('id', $request->input('id'))
                               ->update(['descricao' => $request->input('descricao')]);
        $st = new stdClass;

        if ($update) {
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
        //return redirect()->route('centrodecusto');
    }

    public function destroy(Request $request)
    {
        //var_dump($request->input('id'));
        $centroCusto = CentroCusto::find($request->input('id'));
        //dd($centroCusto);

        $centroCusto->delete();

        $st = new stdClass;
        if ($centroCusto) {
            $st->status = true;
            $st->message = "Registro deletado com sucesso!";

            return response()->json($st);

        } else {
            $st->status = false;
            $st->message = "Erro ao tentar deletar!";

            return response()->json($st);
        }
    }

    protected function _validate(Request $request)
    {
        $ruler = [
            'user_id' => '',
            'descricao' => 'required|max:255'
        ];
        return $this->validate($request, $ruler);
    }
}
