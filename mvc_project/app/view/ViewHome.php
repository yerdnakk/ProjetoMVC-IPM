<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewHome extends ViewPadrao{

    public static function getCardHtml(array $aProdutos){

        $sCard = '';

        foreach($aProdutos as $sProduto){
            $sCard .=  '
                    <div class="col">
                        <div class="card h-100">
                            <img src="app/imagens/'.$sProduto['proimagem'].'" class="card-img-top" alt="Produto"/>
                            <div class="card-body">
                                <h5 class="card-title text-black">'.$sProduto['pronome'].'</h5>
                                <h6 class="card-title text-danger">'.$sProduto['propreco'].' R$</h6>
                                <p class="card-text">
                                   <i>'.$sProduto['prodescricao'].'</i>
                                </p>
                                <p>
                                   Tamanho: <h6 class="text-black">'.$sProduto['protamanho'].'</h6>
                                </p>
                                <a href="index.php?pg=home&id='.$sProduto['procodigo'].'" class="btn btn-outline-secondary text-black">Adicionar ao Carrinho</a>
                            </div>
                        </div>
                    </div>
                        ';
        }

      return $sCard;    
    }

    public static function getEmptyHtml(){
        $sHtml = '<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                    <h1 class="text-light">Estamos sem produtos no momento. Volte novamente mais tarde!</h1>
                </div>
        ';

        return $sHtml;
    }
}
