<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewProdutos extends ViewPadrao{

    public static function getHtmlTable(array $aProdutos){
        $sHtml = '';

        foreach($aProdutos as $sProduto){
               $sHtml .= '<tr>
                            <td>'.$sProduto['procodigo'].'</td>
                            <td>'.$sProduto['pronome'].'</td>
                            <td>'.$sProduto['protamanho'].'</td>
                            <td>'.$sProduto['propreco'].' R$</td>
                            <td>'.$sProduto['proestoque'].' unidades</td>
                            <td>
                                <a href="#" class="edit" id="'.$sProduto['procodigo'].'" data-toggle="modal" data-target="#editModal" onclick="editProduto('.$sProduto['procodigo'].')"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></button>
                                <a href="index.php?pg=admin&act=delete&id='.$sProduto['procodigo'].'" class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                            </td>
                        </tr>';
                    };

        return $sHtml;
   }
   
   public static function getEmptyHtml(){
    $sHtml = '<div class="row col-xs-12 col-sm-12 col-md-12 col-lg-12" align="center">
                <h1>Não há produtos registrados.</h1>
            </div>';

    return $sHtml;
}
}

