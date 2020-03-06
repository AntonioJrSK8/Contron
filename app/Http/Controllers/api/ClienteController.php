<?php

namespace App\Http\Controllers\api;

use App\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $data = Cliente::select(['id', 'nome']);
        return \DataTables::of($data)->make();
    }
}
