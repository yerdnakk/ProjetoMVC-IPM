<?php

namespace App\Model;

use App\Model\ModelPadrao;
use App\Db\Connection;

class ModelProdutos extends ModelPadrao{
    
    public $id;

    public function getTable(){
        return 'tbprodutos';
    }
    
    public function deleteProduto(){
        return parent::delete([
            'procodigo' => $this->id
        ]);   
    }
    
    public function updateProduto($aValues){
        $aWhere = ['procodigo' => $this->id];
        return parent::update($aValues,$aWhere);
    }

    public function insertProduto($aValues){       
        return parent::insert($aValues);
    }
}
