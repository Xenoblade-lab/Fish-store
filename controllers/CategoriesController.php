<?php 
  namespace Controllers;

  class CategoriesController{
    
       public function create($datas)
       {
         $categorie = new \Models\Categories();
         $categorie->category_name = $datas['category'];
         $categorie->save();
         header('Location: '. \Router\Router::route('admin'));
       }
  }

?>