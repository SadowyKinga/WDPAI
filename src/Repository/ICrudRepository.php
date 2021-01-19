<?php

interface ICrudRepository 
{
    public function findById($id);
    public function findAll($id);
    public function delete($id);
    public function save($entity);
}
?>
