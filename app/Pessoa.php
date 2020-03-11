<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    const TYPE_INDIVIDUAL = 'individual';

    const TYPE_LEGAL = 'legal';

    const STATUS_CIVIL = [
        1 => 'Solteiro',
        2 => 'Casado',
        3 => 'Divociado'
    ];

    protected $fillable = [
        'id',
        'nome',
        'documento_numero',
        'email',
        'fone',
        'defaulter', //inadimplente
        'data_nascimento',
        'sexo',
        'status_civil',
        'def_fisica',
        'empresa_nome',
        'pessoa_tipo',
    ];

    public static function getPessoaType($type)
    {
        return $type == Pessoa::TYPE_LEGAL ? $type : Pessoa::TYPE_INDIVIDUAL;
    }

    public function getSexoFormattedAttribute()
    {
        return $this->pessoa_tipo == self::TYPE_INDIVIDUAL ? ($this->sexo == 'm' ? 'Masculino' : 'Feminino') : "";
    }

    public function getDataNascimentoFormattedAttribute()
    {
        return $this->pessoa_tipo == self::TYPE_INDIVIDUAL ? (new \DateTime($this->data_nascimento))->format('d/m/Y') : "";
    }

    public function setDocumentoNumeroFormattedAttribute($value)
    {
        $this->attributes['documento_numero'] = preg_replace('/[^0-9]/', '', $value);
    }

}
