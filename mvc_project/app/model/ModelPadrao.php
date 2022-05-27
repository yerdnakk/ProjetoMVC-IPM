<?php

namespace App\Model;
error_reporting(E_ERROR | E_PARSE);

use App\Db\Connection;

abstract class ModelPadrao
{
    abstract function getTable();

    public function getAll()
    {
        $oConn = Connection::get();
        $sSelect = 'SELECT * FROM '.$this->getTable();
        $oResult = pg_query($oConn,$sSelect);
        while($aResultado = pg_fetch_assoc($oResult)){        
            $aData[] = $aResultado;
        }
        return $aData;
    }

    protected function insert($aValues,$sId='DEFAULT')
    { 
        $oConn = Connection::get();
        $sInsert = 'INSERT INTO '.$this->getTable().' VALUES ('.$sId;
        foreach($aValues as $sValue){
            $sInsert .= ','.$this->getBdValue($sValue);
        }
        $sInsert .= ')';
        $oResult = pg_query($oConn,$sInsert);
        return $oResult;
    }

    protected function delete($aValues, $sUserId = NULL)
    {
        $aWhere = isset($sUserId) ? ['usercodigo' => $sUserId] : ['1' => '1'];
        $oConn = Connection::get();
        $sDelete = 'DELETE FROM '.$this->getTable().' WHERE ';
        foreach($aValues as $sKey => $sValue){
            $sDelete .= $sKey.' = '.$sValue;
        }
        $sDelete .= ' AND ';
        foreach($aWhere as $sKey => $sValue){
            $sDelete .= $sKey.' = '.$sValue;
        }
        $oResult = pg_query($oConn,$sDelete);
        return $oResult;
    }

    protected function update($aValues, $aWhere)
    {
        $oConn = Connection::get();
        $sUpdate = 'UPDATE '.$this->getTable().' SET pronome = $1,propreco = $2,proestoque = $3,proimagem = $4,protamanho = $5,prodescricao = $6 WHERE ';    
        foreach($aWhere as $sKey => $sValue){
            $sUpdate .= $sKey.' = '. $sValue;
        }
        $oResult = pg_query_params($oConn,$sUpdate,$aValues);
        return $oResult;
    }

    /**
     * Retorna o valor pronto para ser 
     * adicionado no comando SQL
     * @param mixed $xValue
     * @return mixed
     */
    protected function getBdValue($xValue)
    {
        if (!empty($xValue) || !is_null($xValue)) {
            if (is_string($xValue)) {
                return '\'' . pg_escape_string($xValue) . '\'';
            }

            return $xValue;
        }

        return 'NULL';
    }

    public function selectById($aValues, $aWhere = ['1'=>'1']){
        $oConn = Connection::get();
        $sSelect = 'SELECT * FROM '.$this->getTable().' WHERE ';
        foreach($aValues as $sKey => $sValue){
            $sSelect .= $sKey.' = '.$sValue;
        }
        $sSelect .= ' AND ';
        foreach($aWhere as $sKey => $sValue){
            $sSelect .= $sKey.' = '.$sValue;
        }
        $oResult = pg_query($oConn,$sSelect);
        //$bRow = pg_fetch_row($oResult);
        //return $bRow; 
        while($aResultado = pg_fetch_assoc($oResult)){
            $aData = $aResultado;
        }
        return $aData;
    }

}
