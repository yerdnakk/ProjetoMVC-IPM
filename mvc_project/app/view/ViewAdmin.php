<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewAdmin extends ViewPadrao{
    
    public static function getHtmlButton(){
        $sButton = '<a href="#" class="btn btn-success" data-toggle="modal" onclick="addProduto()"><i class="material-icons">&#xE147;</i> <span>Adicionar Produto</span></a>';
        
        return $sButton;
    }
}
