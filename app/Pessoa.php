<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    protected $table = 'pessoas';

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

    public function getDocumentoNumeroFormattedAttribute()
    {
        $document = $this->documento_numero;
        if (!empty($document)) {
            if (strlen($document) == 11) {
                $document = preg_replace('/(\d{3})(\d{3})(\d{3})(\d{2})/', '$1.$2.$3-$4', $document);
            } elseif (strlen($document) == 14) {
                $document = preg_replace('/(\d{2})(\d{3})(\d{3})(\d{4})(\d{2})/', '$1.$2.$3/$4-$5', $document);
            }
        }
        return $document;
    }

    public function setDocumentoNumeroFormattedAttribute($value)
    {
        $this->attributes['documento_numero'] = preg_replace('/[^0-9]/', '', $value);
    }

}
