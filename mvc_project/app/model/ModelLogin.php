<?php

namespace App\Model;

use App\Model\ModelPadrao;
use App\Db\Connection;

class ModelLogin extends ModelPadrao{
    
    public function getTable(){
        return 'tbusers';
    }
    
    public function insertUser($sUser,$sPass,$sAdmin){
        $aValues = [$sUser,$sPass,$sAdmin];
        parent::insert($aValues);    
    }

    public function selectUser($sId){
        return parent::selectById([
            'usercodigo' => $sId
        ]);    
    }

    public function existsUser($sUsername){
        $aUsers = parent::getAll();
        foreach($aUsers as $sUser){
            if($sUser['username'] == $sUsername) return true;
        }
        return false;
    }

    public function verifyUser($sUser,$sPass){
        $aUsers = parent::getAll();
        foreach($aUsers as $sValue){
            if($sValue['username'] == $sUser && $sValue['userpass'] == $sPass) return $sValue['usercodigo'];    
        }
    }
    
}
