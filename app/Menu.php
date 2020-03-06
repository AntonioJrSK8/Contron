<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';
    protected $fillable = ['titulo', 'url', 'icono', 'menu_id', 'ordem'];
    protected $guarded = ['id'];
    //protected $timestemps = true;

    public function getFilhos($pais, $line)
    {
        $children = [];
        foreach ($pais as $line1) {
            if($line['id'] == $line1['menu_id']){
                $children = array_merge($children, [array_merge($line1, ['submenu'=>$this->getFilhos($pais, $line1)])]);
            }
        }
        return $children;
    }
    public function getPais($front)
    {
        if ($front) {
            return $this->whereHas('roles', function($query){
                $query->where('rol_id', session()->get('rol_id'))->orderby('menu_id');
            })->where('estado', 1)
            ->orderby('menu_id')
            ->orderby('ordem')
            ->get()
            ->toArray();
        } else {
            return $this->orderby('menu_id')
                        ->orderby('ordem')
                        ->get()
                        ->toArray();
        }
    }
    public static function getMenu($front=false)
    {
        $menus = new Menu();
        $pais = $menus->getPais($front);
        $menuAll = [];
        foreach ($pais as $line) {
            if($line['menu_id'] != 0)
                break;
            $item = [array_merge($line, ['submenu'=>$menus->getFilhos($pais, $line)])];
            $menuAll = array_merge($menuAll, $item);
        }
        return $menuAll;
    }

    public function guardarOrdem($menu)
    {
        $menus = json_decode($menu);
        foreach ($menus as $var => $value) {
            $this->where('id', $value->id)->update(['menu_id' => 0, 'ordem' => $var + 1]);
            if (!empty($value->children)) {
                foreach ($value->children as $key => $vchild) {
                    $update_id = $vchild->id;
                    $parent_id = $value->id;
                    $this->where('id', $update_id)->update(['menu_id' => $parent_id, 'ordem' => $key + 1]);

                    if (!empty($vchild->children)) {
                        foreach ($vchild->children as $key => $vchild1) {
                            $update_id = $vchild1->id;
                            $parent_id = $vchild->id;
                            $this->where('id', $update_id)->update(['menu_id' => $parent_id, 'ordem' => $key + 1]);

                            if (!empty($vchild1->children)) {
                                foreach ($vchild1->children as $key => $vchild2) {
                                    $update_id = $vchild2->id;
                                    $parent_id = $vchild1->id;
                                    $this->where('id', $update_id)->update(['menu_id' => $parent_id, 'ordem' => $key + 1]);

                                    if (!empty($vchild2->children)) {
                                        foreach ($vchild2->children as $key => $vchild3) {
                                            $update_id = $vchild3->id;
                                            $parent_id = $vchild2->id;
                                            $this->where('id', $update_id)->update(['menu_id' => $parent_id, 'ordem' => $key + 1]);
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
}
