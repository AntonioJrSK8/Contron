<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CentroCusto extends Model
{
    protected $table = 'centro_custos';

    protected $fillable = [
        'descricao', 'user_id'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

}
