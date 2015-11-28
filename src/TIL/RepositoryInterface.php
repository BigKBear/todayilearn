<?php
namespace TIL;

interface RepositoryInterface
{
    public function find($id);
    
    public function findAll();
    
    public function save($data);
    
    public function delete($data);
}