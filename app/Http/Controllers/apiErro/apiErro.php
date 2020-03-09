<?php

namespace App\apiErro;

class apiErro {

    public static function apiErro($mensagem, $code)
    {
        return [
            'msg' => $mensagem,
            'code' => $code
        ];
    }

}
