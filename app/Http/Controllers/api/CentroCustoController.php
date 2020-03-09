<?php

namespace App\Http\Controllers\api;

use App\CentroCusto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CentroCustoController extends Controller
{
    private $centroCusto;

    public function __construct(CentroCusto $centroCusto)
    {
        $this->centroCusto = $centroCusto;
    }

    public function index()
    {
        $data = $this->centroCusto::select(['id', 'descricao']);
        return \DataTables::of($data)->make();
    }

}
