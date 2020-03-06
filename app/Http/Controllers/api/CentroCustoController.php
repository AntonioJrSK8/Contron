<?php

namespace App\Http\Controllers\api;

use App\CentroCusto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CentroCustoController extends Controller
{
    public function index()
    {
        $data = CentroCusto::select(['id', 'descricao']);
        return \DataTables::of($data)->make();
    }
}
