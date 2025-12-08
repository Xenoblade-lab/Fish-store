<?php
namespace Models;
class Model extends Database
{
    protected string $table;
    
    public function __construct()
    {
        parent::__construct();
        $this->connexion();
    }
    
    public function save()
    {
        // Todo
    }
    public function find($key, $value){
        // Todo
    }
}

?>