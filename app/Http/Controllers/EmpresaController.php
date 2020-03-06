<?php

namespace App\Http\Controllers;

use App\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    public function index(){
        return view('empresa.lista');
    }

    public function create()
    {
        return view('empresa.create');
    }

    public function store(Request $request)
    {
        $data = $this->_validate($request);
        Empresa::create($data);

        return redirect()->route('empresa.index');
    }

    protected function _validate(Request $request)
    {
        $ruler = [
            'user_id' => 'required',
            'nome' => 'required|max:255',
            'nome_fantasia' => 'required|max:255',
        ];
        return $this->validate($request, $ruler);
    }
}
