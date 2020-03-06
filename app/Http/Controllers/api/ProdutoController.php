<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Produto;

class ProdutoController extends Controller
{
    public function index(){

        $data = Produto::select(['id', 'descricao']);
        return \DataTables::of($data)->make();
    }
}
