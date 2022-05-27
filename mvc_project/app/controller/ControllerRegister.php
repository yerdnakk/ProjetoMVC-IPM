<?php

namespace App\Controller;

use App\Controller\ControllerPadrao;
use App\View\ViewRegister;
use App\Model\ModelLogin;

class ControllerRegister extends ControllerPadrao
{

    protected function processPage()
    {
        $sTitle = 'Registrar';

        $sContent = ViewRegister::render([ 
            'showRegister' => ViewRegister::getHtmlRegister()
        ]);

        if(isset($_POST['submit'])){
            $oModelLogin = new ModelLogin;

            $sUser = $this->sanitizeString($_POST['user']);
            $sPass = $this->sanitizeString($_POST['pass']);
            $sAdmin = isset($_POST['admin']) ? 'true' : 'false';    

            if($oModelLogin->existsUser($sUser)){
                $this->footerVars = [
                    'footerContent' => \App\View\ViewFooter::getUserExistsAlertHtml()
                ];    
            }else{
                $oModelLogin->insertUser($sUser,$sPass,$sAdmin);
                $this->footerVars = [
                    'footerContent' => \App\View\ViewFooter::getUserCreateAlertHtml()
                ];          
            }
              
        }

        return parent::getPage(
            $sTitle,
            $sContent
        );
    }

}