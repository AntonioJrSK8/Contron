<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    protected $fillable = [
        'descricao', 'tipo', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
