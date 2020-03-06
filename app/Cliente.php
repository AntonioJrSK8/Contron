<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'user_id', 'nome', 'nome_fantasia'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

}
