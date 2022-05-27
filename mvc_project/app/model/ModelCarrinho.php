<?php

namespace App\Model;

use App\Model\ModelPadrao;
use App\Model\ModelProdutos;
use App\Db\Connection;

class ModelCarrinho extends ModelPadrao{
    
    public $id;

    public function getTable(){
        return 'tbcarrinho';
    }
    
    public function selectProduto($sUserId){
        return parent::selectById([
            'procodigo' => $this->id
        ],[
            'usercodigo' => $sUserId
        ]);    
    }

    public function insertProduto(){
        $oSession = new \App\Client\Session;
        $sUserId = $oSession->getUserId();
        $aValues = [$sUserId];
        return parent::insert($aValues,$this->id);
    }

    public function deleteProduto($sUserId = NULL){
        return parent::delete([
            'procodigo' => $this->id
        ],$sUserId);   
    }
    
    public function joinProduto($sUserId){
        $oConn = Connection::get();
        $sJoin = 'SELECT tbprodutos.procodigo, tbprodutos.pronome, tbprodutos.propreco, tbprodutos.proimagem, tbprodutos.protamanho,tbusers.usercodigo
                  FROM tbprodutos
                  INNER JOIN tbcarrinho ON tbprodutos.procodigo = tbcarrinho.procodigo
                  INNER JOIN tbusers ON tbusers.usercodigo = tbcarrinho.usercodigo';
        $oResult = pg_query($oConn,$sJoin);
        $aData = [];
        while($aResultado = pg_fetch_assoc($oResult)){
            if($aResultado['usercodigo'] == $sUserId) $aData[] = $aResultado;
        }
        
        return $aData;
    }
}