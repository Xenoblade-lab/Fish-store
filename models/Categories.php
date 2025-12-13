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
     public function edit($id, $datas)
     {
      $smt =  $this->connexion->prepare("UPDATE {$this->table} SET category_name = :nom , updated_at = NOW() WHERE id = {$id}");
      $smt->execute([
         'nom' => $datas['category']
      ]);

     }
  }

?>