<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdemServico extends Model
{
    protected $table = 'ordem_servicos';

    protected $fillable = [
        'descricao'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
