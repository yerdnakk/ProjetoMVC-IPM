<?php

namespace App\Controller;
error_reporting(E_ERROR | E_PARSE);

use App\Controller\ControllerPadrao;
use App\View\ViewAdmin;
use App\View\ViewProdutos;
use App\View\ViewForm;
use App\Model\ModelProdutos;
use App\View\ViewFooter;

class ControllerAdmin extends ControllerPadrao
{

    protected function processPage()
    {
        if(!$this->issetSession()){
            $oControllerLogin = new \App\Controller\ControllerLogin;
            return $oControllerLogin->processPage();
        };

        $sTitle = 'Administrador';
        
        $oModelProduto = new ModelProdutos;
        $aProdutos = $oModelProduto->getAll(); 

        $sContent = ViewAdmin::render([
            'showTable' => $this->getTableContent($aProdutos),
            'insertButton' => ViewAdmin::getHtmlButton()
        ]);

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
    
    protected function processDelete() {       
        $sId = $_GET['id'];
             
        $oModelProduto = new ModelProdutos;
        $oModelProduto->id = $sId;
        $this->verifyProduto($oModelProduto);
        
        return $this->processPage();
    }
    
    protected function processUpdate() {  
        $sId = $_GET['id'];
        $oModelProduto = new \App\Model\ModelProdutos;
        $aProduto = $oModelProduto->selectById([
            'procodigo' => $sId
        ]);

        if(isset($_POST['submit'])){           
            $oModelProduto->id = $sId;
    
            $aValues = $this->getValues();

            if($oModelProduto->updateProduto($aValues)){
                $this->footerVars = [
                    'footerContent' => ViewFooter::getUpdateAlertHtml()
                ]; 
            }else{
                $this->footerVars = [
                    'footerContent' => ViewFooter::getErrorAlertHtml()
                ];     
            }

            return $this->processPage();      
        }else{
            $retorna = ['dados' => $aProduto];
            return json_encode($retorna);
        }    
    }

    protected function processInsert(){

        if(isset($_POST['submit'])){
            $oModelProduto = new ModelProdutos;
            $aValues = $this->getValues();

            if($oModelProduto->insertProduto($aValues)){
                $this->footerVars = [
                    'footerContent' => ViewFooter::getAddAlertHtml()
                ]; 
            }else{
                $this->footerVars = [
                    'footerContent' => ViewFooter::getErrorAlertHtml()
                ];     
            }

            return $this->processPage();
        }  
      
    }

    private function verifyProduto($oModelProduto){
        if($oModelProduto->deleteProduto()){
            $this->footerVars = [
                'footerContent' => ViewFooter::getRemoveAlertHtml()
            ]; 
        }else{
            $oModelCarrinho = new \App\Model\ModelCarrinho;
            $oModelCarrinho->id = $oModelProduto->id;
            $oModelCarrinho->deleteProduto();
            $this->verifyProduto($oModelProduto);
        }
    }

    private function getTableContent($aProdutos){
        return isset($aProdutos) ? ViewProdutos::getHtmlTable($aProdutos) : ViewProdutos::getEmptyHtml();
    }

    private function getValues(){
        $sNome = $this->SanitizeString($_POST['nome']);
        $sPreco = $this->SanitizeString($_POST['preco']);
        $sEstoque = $this->SanitizeString($_POST['estoque']);
        $sTamanho = $_POST['tamanho'];
        $sDescricao = $_POST['descricao'];     
        $sNomeImagem = md5(uniqid()) . '-' . time() . '.jpg';   
        $sPastaImagem = __DIR__."/../imagens/";
        $sArquivoNome = $sPastaImagem . $sNomeImagem;
        move_uploaded_file($_FILES['imagem']['tmp_name'],$sArquivoNome);

        return [$sNome,$sPreco,$sEstoque,$sNomeImagem,$sTamanho,$sDescricao];
    }
}
