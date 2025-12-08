<?php
  namespace Models;

  class UserModel extends Model
  {
      public int $id;
      public string $username;
      public string $email;
      public string $mdp;
      protected string $table = "users";

      public function save()
      {
          $this->connexion->query("INSERT INTO " . $this->table . " (id, username, email, mdp) VALUES (" . $this->id . ", '" . $this->username . "', '" . $this->email . "', '" . $this->mdp . "')");
      }

      public function find($key,$value)
      {
           $stmt = $this->connexion->prepare("SELECT * FROM " . $this->table . " WHERE " . $key ." =:value");
           $stmt->bindParam('value', $value);
           $stmt->execute();
           return $stmt->fetch(\PDO::FETCH_OBJ);
      }
      
  }
?>