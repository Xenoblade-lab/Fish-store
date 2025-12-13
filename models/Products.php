<?php 
  namespace Models;

  class Products extends Model
  {
     public string $name;
     public int $category_id;
     public float $price;
     public string $description;
     public string $image;
     public bool $featured;
     protected string $table = "products";

     public function save(){
       $smt =  $this->connexion->prepare("INSERT INTO  {$this->table}(name,category_id, price, description, image, featured) VALUES (:name, :id, :price, :describe, :img, :feature)");
       $smt->execute([
        'name' => $this->name,
        'id' => $this->category_id,
        'price' => $this->price,
        'describe' => $this->description,
        'img' => $this->image,
        'feature' => $this->featured ? $this->featured : 0
       ]);
     }
     public function all()
     {
          return $this->connexion->query("SELECT {$this->table}.*,categories.category_name FROM products INNER JOIN categories ON products.category_id = categories.id")->fetchAll(\PDO::FETCH_OBJ);
     }
  }
?>