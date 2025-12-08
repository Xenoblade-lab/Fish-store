<?php
  namespace Models;

  class Categories extends Model{
     public int $id;
     public string $category_name;
     public $created_at;

    protected string $table = "categories"; 

     public function save()
     {
        $this->connexion->query("INSERT INTO {$this->table}(category_name) VALUE('{$this->category_name}')");
     }
     public function all(){
        return $this->connexion->query("SELECT * FROM {$this->table}")->fetchAll(\PDO::FETCH_OBJ);
     }
  }

?>