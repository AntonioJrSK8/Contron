<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuRol extends Model
{
    protected $table = 'menu_rol';
    protected $fillable = ['titulo', 'url', 'icono', 'menu_id', 'ordem'];
    protected $guarded = [];
    protected $timestemps = false;
}
