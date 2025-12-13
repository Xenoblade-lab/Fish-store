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
    public function delete($id){
        $this->connexion->query("DELETE FROM {$this->table} WHERE id = {$id}");
    }
    public function find($key, $value){
        // Todo
    }
    public function edit($id,$datas){
        //
    }

    public function all(){
    
       return $this->connexion->query("SELECT * FROM {$this->table}")->fetchAll(\PDO::FETCH_OBJ);
    }
}

?>