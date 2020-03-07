<?php

namespace App\Http\Controllers;

use App\Rol;
use Illuminate\Http\Request;

class RolController extends Controller
{
    public function index()
    {
        $datas = Rol::orderBy('id')->get();
        return view('rol.index', compact('datas'));
    }

    public function create()
    {
        return view('rol.create');
    }
    public function show()
    {
        //
    }
    public function store(ValidacionRol $request)
    {
        Rol::create($request->all());
        return redirect('rol')->with('mensagem', 'Rol criado com exito');
    }

    public function edit($id)
    {
        $data = Rol::findOrFail($id);
        return view('rol.edit', compact('data'));
    }

    public function update(ValidacionRol $request, $id)
    {
        Rol::findOrFail($id)->update($request->all());
        return redirect('rol')->with('mensagem', 'Rol atualizado com exito');
    }

    public function destroy(Request $request, $id)
    {
        if ($request->ajax()) {
            if (Rol::destroy($id)) {
                return response()->json(['mensagem' => 'Rol deletado com exito']);
            } else {
                return response()->json(['mensagem' => 'ng']);
            }
        } else {
            abort(404);
        }
    }
}
