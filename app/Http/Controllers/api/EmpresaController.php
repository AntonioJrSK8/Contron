<?php

namespace App\Http\Controllers\api;

use App\apiErro\apiErro;
use App\Empresa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    private $empresa;

    public function __construct(Empresa $empresa)
    {
        $this->empresa = $empresa;
    }

    public function index()
    {
        $data = $this->empresa::select(['id', 'nome', 'nome_fantasia']);
        return \DataTables::of($data)->make();
    }

    public function show(Empresa $id)
    {
        $data = ['data'=>$id];
        return $data;
    }

    public function store(Request $request)
    {
        try {
            $empresaData = $request->all();
            $this->empresa->create($empresaData);
            return response()->json(['mensagem' => 'Empresa criada com sucesso!', 201]);
        } catch (\Exception $e) {
            if(config('app.degug')){

                return response()->json(apiErro::ErroMensagem($e->getMessage(), 1010));
            }
        }

    }
}
