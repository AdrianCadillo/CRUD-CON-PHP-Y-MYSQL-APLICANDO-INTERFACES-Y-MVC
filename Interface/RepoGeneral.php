<?php
/**
 * INTERFACE, para luego implementar la lógica
 */
interface RepoGeneral{
    /**
     * Método para CRUD COMPLETO, QUE SE IMPLEMENTARÁ
     */
    public function CrudOptimize($Query,$datos=array());

    /**
     * EXISTE DATO LÓGICO
     */
    public function existeDatoLogico($datos=[],$dato);

    /**
     * EXISTE DATO NO LÓGICO
     */

     public function existeDato($Sql,$data);
}