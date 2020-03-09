<?php

namespace App\apiErro;

class apiErro {

    public static function ErroMensagem($mensagem, $code)
    {
        return [
            'msg' => $mensagem,
            'code' => $code
        ];
    }

}
