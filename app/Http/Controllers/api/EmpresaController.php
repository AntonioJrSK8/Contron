<?php

namespace App\Http\Controllers\api;

use App\Empresa;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index()
    {
        $data = Empresa::select(['id', 'nome', 'nome_fantasia']);
        return \DataTables::of($data)->make();
    }
}
