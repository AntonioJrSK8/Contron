<?php

namespace App\Http\Controllers\api;

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
        dd($request->all());
    }
}
