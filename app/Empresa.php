<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nome', 'nome_fantasia', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
