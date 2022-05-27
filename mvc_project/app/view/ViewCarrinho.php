<?php

namespace App\View;

use App\View\ViewPadrao;

class ViewCarrinho extends ViewPadrao{

    private static $iTotal,$iTax = 0;

    public static function getItens(array $aProduto){
        $sHtmlItens = '<div class="px-2 px-lg-0">
            <div class="pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 bg-white rounded shadow-sm mb-5">
        
                    <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col" class="border-0 bg-light">
                            <div class="p-2 px-3 text-uppercase">Produto</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Preço</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Quantidade</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Subtotal</div>
                            </th>
                            <th scope="col" class="border-0 bg-light">
                            <div class="py-2 text-uppercase">Remover</div>
                            </th>
                        </tr>
                        </thead>
                        <tbody>';
        foreach($aProduto as $sProduto){
            $sHtmlItens .= '<tr>
                                <th scope="row" class="border-0">
                                <div class="p-2">
                                    <img src="app/imagens/'.$sProduto['proimagem'].'" alt="'.$sProduto['pronome'].'" width="70" class="img-fluid rounded shadow-sm">
                                    <div class="ml-3 d-inline-block align-middle">
                                    <h5 class="mb-0"><a class="text-dark d-inline-block align-middle">'.$sProduto['pronome'].'</a></h5><span class="text-muted font-weight-normal font-italic d-block">Tamanho: '.$sProduto['protamanho'].'</span>
                                    </div>
                                </div>
                                </th>
                                <td class="border-0 align-middle"><strong>'.$sProduto['propreco'].' R$</strong></td>
                                <td class="border-0 align-middle"><strong>1</strong></td>
                                <td class="border-0 align-middle"><strong>'.$sProduto['propreco'].' R$</strong></td>
                                <td class="border-0 align-middle"><a href="index.php?pg=carrinho&act=delete&id='.$sProduto['procodigo'].'" class="text-dark"><i class="fa fa-trash"></i></a></td>
                            </tr>';
            self::getTotalValue($sProduto['propreco']);     
        }

        $sHtmlItens .= ' </tbody>
                </table>
            </div>
            </div>
        </div>'.self::getSummaryHtml();

        return $sHtmlItens;
    }

    private static function getTotalValue($sValue){
        self::$iTotal += $sValue;
    }

    private static function getTaxValue(){
        $iTotal = self::$iTotal;
        switch($iTotal){
            case ($iTotal < 100):
                self::$iTax = 15;
                break;          
            case ($iTotal < 300):
                self::$iTax = 10;
                break;
            case ($iTotal < 500):
                self::$iTax = 5;
                break;
            default:
                self::$iTax = 0;
                break;
        }
    }
   
    public static function getTotalPriceHtml(){
        self::getTaxValue();
        $sHtmlPrice = '<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Subtotal do pedido</strong><strong>'.self::$iTotal.' R$</strong></li>';
        self::$iTotal += self::$iTax;
        $sHtmlPrice .= '<li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Taxa de envio</strong><strong>'.self::$iTax.' R$</strong></li>                
                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Total</strong>
                        <h5 class="font-weight-bold">'.self::$iTotal.' R$</h5>
                        </li>';

        return $sHtmlPrice;
    }

    private static function getSummaryHtml(){
        $sSummary = '<div class="row py-5 p-4 bg-white rounded shadow-sm">
        <div class="col-lg-6">               
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Informações adicionais</div>
          <div class="p-4">
            <p class="font-italic mb-4">Se você quer adicionar alguma informação, por favor digite abaixo.</p>
            <textarea name="" cols="30" rows="2" class="form-control"></textarea>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Resumo do pedido</div>
          <div class="p-4">
            <p class="font-italic mb-4">Os custos adicionais são calculados de acordo com o valor total do pedido.</p>
            <ul class="list-unstyled mb-4">'.self::getTotalPriceHtml().'
            </ul><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" class="btn btn-dark rounded-pill py-2 btn-block" target="_blank">Continuar a compra</a>
                          
                        </div>
                      </div>
                    </div>
              
                  </div>
                </div>
              </div>';

        return $sSummary;
    }

    public static function getEmptyHtml(){
        $sEmpty = '<h1 class="text-white">Nenhum item no carrinho.</h1>';
        return $sEmpty;
    }
}