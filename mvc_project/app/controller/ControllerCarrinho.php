<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\Model\ModelCarrinho;
use App\View\ViewCarrinho;
use App\View\ViewFooter;

class ControllerCarrinho extends ControllerPadrao
{

    protected function processPage()
    {

        if(!$this->issetSession()){
            $oControllerLogin = new \App\Controller\ControllerLogin;
            return $oControllerLogin->processPage();
        };

        $oSession = new \App\Client\Session;
        $sUserId = $oSession->getUserId();
        
        $oModelCarrinho = new ModelCarrinho;
        $aProdutos = $oModelCarrinho->joinProduto($sUserId);

        $sTitle = 'Carrinho';

        $sContent = ViewCarrinho::render([      
            'showItens' => $this->getContentItens($aProdutos)
        ]);

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }

    protected function processDelete(){

        $sId = $_GET['id'];
             
        $oModelCarrinho = new ModelCarrinho;
        $oModelCarrinho->id = $sId;
        $oSession = new \App\Client\Session;
        $sUserId = $oSession->getUserId();

        if($oModelCarrinho->deleteProduto($sUserId)){
            $this->footerVars = [
                'footerContent' => ViewFooter::getRemoveAlertHtml()
            ]; 
        }else{
            $this->footerVars = [
                'footerContent' => ViewFooter::getErrorAlertHtml()
            ];     
        }
        
        return $this->processPage();
    }

    private function getContentItens($aProdutos){
        return $aProdutos != [] ? ViewCarrinho::getItens($aProdutos) : ViewCarrinho::getEmptyHtml();
    }
}
