<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $fillable = [
        'data_solicitacao'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
