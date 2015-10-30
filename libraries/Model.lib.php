<?php
/* Should our models really be made up of interfaces and traits? 
*Is there a better way?
*/
interface iModel{

public function create($data);
public function delete($id);
public function save($id,$data);
public function find($id);
public function findAll();
}

trait Model{
    public function find($id){
    return $this->load($id);
    }
}