<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewLogin;
use App\Model\ModelLogin;

class ControllerLogin extends ControllerPadrao
{

    protected function processPage()
    {      
        $sTitle = 'Login';
       
        $sContent = ViewLogin::render([ 
            'showLogin' => ViewLogin::getHtmlLogin()  
        ]);

        if(isset($_POST['submit'])){
            $oModelLogin = new ModelLogin;

            $sUser = $_POST['user'];
            $sPass = $_POST['pass'];
    
            if($iUserId = $oModelLogin->verifyUser($sUser,$sPass)){
                $oSession = new \App\Client\Session;
                $oSession->login($iUserId);   
                $oControllerHome = new \App\Controller\ControllerHome;
                return $oControllerHome->processPage();
            }else{
                $this->footerVars = [
                    'footerContent' => \App\View\ViewFooter::getLoginErrorAlertHtml()
                ]; 
            }

        }

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }
}
