<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewHome;
use App\Client\Session;
use App\View\ViewHeader;
use App\View\ViewFooter;

class ControllerHome extends ControllerPadrao
{

    protected function processPage()
    {
        if(!$this->issetSession()){
            $oControllerLogin = new \App\Controller\ControllerLogin;       
            return $oControllerLogin->processPage();
        };
        
        $sTitle = 'Home';

        $oModelProdutos = new \App\Model\ModelProdutos;
        $aProdutos = $oModelProdutos->getAll();

        if(isset($_GET['id'])){
            $sId = $_GET['id'];
            $oSession = new \App\Client\Session;
            $sUserId = $oSession->getUserId();
            
            $oModelCarrinho = new \App\Model\ModelCarrinho;
            $oModelCarrinho->id = $sId;                
            if(!$oModelCarrinho->selectProduto($sUserId)){
                $oModelCarrinho->insertProduto();
                $this->footerVars = [
                    'footerContent' => ViewFooter::getAddAlertHtml()
                ]; 
            }else{
                $this->footerVars = [
                    'footerContent' => ViewFooter::getExistsAlertHtml()
                ];
            }
            
        }

        $sContent = ViewHome::render([
            'homeContent' => $this->setContentHome($aProdutos)
        ]);

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }

    private function setContentHome($aProdutos){
        return $aProdutos == [] ? ViewHome::getEmptyHtml() : ViewHome::getCardHtml($aProdutos);  
    }
}
