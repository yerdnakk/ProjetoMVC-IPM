<?php

namespace App\Controller;

use App\View\ViewPage,
    App\View\ViewHeader,
    App\View\ViewFooter,
    App\Client\Session;

abstract class ControllerPadrao
{
  
    public static $sAdmin;
    protected $headerVars = [];
    protected $footerVars = [];

    function render()
    {
        $sAction = $_GET['act'] ??= '';

        switch ($sAction) {
            case 'insert':
                return $this->processInsert();
            case 'update':
                return $this->processUpdate();
            case 'delete':
                return $this->processDelete();
            case 'logout':
                return $this->processLogout();
        }

        return $this->processPage();
    }

    protected function processInsert()
    {
    }

    protected function processUpdate()
    {
    }

    protected function processDelete()
    {
    }

    protected function processLogout()
    { 
        $oSession = new Session;
        $oSession->logout();
        $oControllerLogin = new \App\Controller\ControllerLogin;
        return $oControllerLogin->processPage();      
    }

    protected function processPage()
    {           
    }

    protected function getHeader($aVars = [])
    {
        return ViewHeader::render($aVars);
    }

    protected function getFooter($aVars = [])
    {
        return ViewFooter::render($aVars);
    }

    protected function getPage($sTitle, $sContent)
    {
        if($this->footerVars == []) $this->footerVars = [
            'footerContent' => ''
        ];

        if($this->headerVars == []) $this->headerVars = [
            'showHome' => '',
            'showAdmin' => '',
            'showCarrinho' => '',
            'showLogin' => ''
        ];

        $sHeader = $this->getHeader($this->headerVars);
        $sFooter = $this->getFooter($this->footerVars);

        return ViewPage::render([
            'title'   => $sTitle,
            'header'  => $sHeader,
            'content' => $sContent,
            'footer'  => $sFooter
        ]);
    }

    protected function sanitizeString($sString){       
        return $sString = filter_var($sString,FILTER_SANITIZE_STRING);
    }

    protected function issetSession(){
        $oSession = new Session;
        $sAdmin = $oSession->isAdmin();
        if($oSession->isLogged()){
            return $this->headerVars = [
                'showHome' => ViewHeader::getHomeHtml(),
                'showAdmin' => $this->getContentAdmin($sAdmin),
                'showCarrinho' => ViewHeader::getCarrinhoHtml(),
                'showLogin' => ViewHeader::getLogoutHtml()
            ];
        }  
    }

    private function getContentAdmin($sAdmin){
        return $sAdmin == 't' ? ViewHeader::getAdminHtml() : '';
    }
}
