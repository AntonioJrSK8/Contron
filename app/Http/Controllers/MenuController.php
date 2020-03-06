<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Rules\ValidarCampoUrl;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::getMenu();
        return view('menu.index', compact('menus'));
    }
    public function create()
    {
        return view('menu.create');
    }
    public function store(Request $request)
    {
        $dados = $this->_validate($request);
        Menu::create($dados);

        return redirect('menu/create')->with('mensagem', 'Gravado com sucesso');
    }
    public function edit($id)
    {
        $menu = Menu::find($id);

        return view('menu/edit', compact('menu'));

    }
    public function update(Request $request, $id)
    {
        $data = $this->_validate($request);
        $menu = Menu::find($id);
        $menu->fill($data);
        $menu->save();

        return redirect('menu')->with('mensagem', 'Gravado com sucesso');;
    }

    public function show($id)
    {
    }
    public function destroy($id)
    {
    }

    public function guardarOrdem(Request $request)
    {
        if ($request->ajax()) {
            $menu = new Menu;
            $menu->guardarOrdem($request->menu);
            return response()->json(['mensagem' => 'Menu ordenado com sucesso','status'=>true]);
        } else {
            abort(404);
        }
    }

    protected function _validate(Request $request)
    {
        $ruler = [
            'titulo' => 'required|max:50|unique:menus,titulo' . $request->input('id'),
            'url' => ['required', 'max:100', new ValidarCampoUrl],
            'icono' => '',
            'ordem' => '',
            'menu_id' => ''
        ];
        return $this->validate($request, $ruler);
    }


}
