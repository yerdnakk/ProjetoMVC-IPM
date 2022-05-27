<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewForm extends ViewPadrao{
    
    public static function getNomeHtml($sValue = ''){
        $sNome = '<div class="form-group">
                      <label for="nome">Nome</label>
                      <input type="text" class="form-control" name="nome" id="nome" value="'.$sValue.'" placeholder="Nome" required>
                  </div>';

        return $sNome;
    }

    public static function getPrecoHtml($sValue = ''){
        $sPreco = ' <div class="form-group">
                        <label for="preco">Preço</label>
                        <input type="text" class="form-control" name="preco" id="preco" value="'.$sValue.'" placeholder="Preço" required>
                    </div>';

        return $sPreco;
    }

    public static function getEstoqueHtml($sValue = ''){
        $sEstoque = '<div class="form-group">
                        <label for="estoque">Estoque</label>
                        <input type="number" class="form-control" name="estoque" id="estoque" value="'.$sValue.'" placeholder="Estoque" required>
                    </div><br>';

        return $sEstoque;
    }

    public static function getImageHtml(){
        $sImage = '<div class="form-group">
                        <input type="file" class="form-control-file" name="imagem" id="imagem" required>
                    </div><br>';
        
        return $sImage;
                    
    }

    public static function getButtonAddHtml(){
        $sButton = '<button type="submit" name="submit" class="btn btn-primary">Adicionar</button>';
        $sButton .= self::getButtonBackHtml();
        return $sButton;
    }

    public static function getButtonUpdateHtml(){
        $sButton = '<button type="submit" name="submit" class="btn btn-primary">Alterar</button>';
        $sButton .= self::getButtonBackHtml();
        return $sButton;
    }

    public static function getButtonBackHtml(){
        $sBack = '<a class="btn btn-secondary" href="index.php?pg=admin">Voltar</a>';
        return $sBack;
    }
}
