<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewFooter extends ViewPadrao{

    public static function getAddAlertHtml(){
        $sHtml = '<div class="alert alert-success" role="alert">
                      Produto adicionado com sucesso! 
                  </div>';

        return $sHtml;
    }

    public static function getErrorAlertHtml(){
        $sHtml = '<div class="alert alert-danger" role="alert">
                      Erro de processamento! Tente novamente mais tarde.
                  </div>';

        return $sHtml;
    }

    public static function getRemoveAlertHtml(){
        $sHtml = '<div class="alert alert-success" role="alert">
                      Produto removido com sucesso!
                 </div>';

        return $sHtml;
    }

    public static function getExistsAlertHtml(){
        $sHtml = '<div class="alert alert-danger" role="alert">
                      Este produto já existe no carrinho!
                 </div>';

        return $sHtml;
    }

    public static function getUpdateAlertHtml(){
        $sHtml = '<div class="alert alert-success" role="alert">
                      Produto alterado com sucesso!
                 </div>';

        return $sHtml;
    }

    public static function getUserCreateAlertHtml(){
        $sHtml = '<div class="alert alert-success" role="alert">
                      Usuário criado com sucesso!
                  </div>';

        return $sHtml;
    }

    public static function getLoginErrorAlertHtml(){
        $sHtml = '<div class="alert alert-danger" role="alert">
                      Usuário ou senha incorreta! Tente novamente.
                  </div>';

        return $sHtml;
    }

    public static function getUserExistsAlertHtml(){
        $sHtml = '<div class="alert alert-danger" role="alert">
                      Nome de usuário já existente!
                  </div>';

        return $sHtml;
    }
}
