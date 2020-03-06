<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function empresas()
    {
        return $this->hasOne('App\Empresa');
    }

    public function clientes()
    {
        return $this->hasMany('App\Cliente');
    }

    public function pedidos()
    {
        return $this->hasMany('App\Pedido');
    }

    public function produtos()
    {
        return $this->hasMany('App\Produto');
    }

    public function ordemservicos()
    {
        return $this->hasMany('App\OrdemServico');
    }

    public function centrocustos()
    {
        return $this->hasMany('App\CentroCusto');
    }

    public function menus()
    {
        return $this->hasMany('App\Menu');
    }

}
