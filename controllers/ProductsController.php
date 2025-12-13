<?php 
  namespace Controllers;

  class ProductsController
  {

    public function create($data,$file)
    {
     
         $product = new \Models\Products();
        // Logic to create a product
       if(isset($file['image']) && $file['image']['error'] == 0){
          $directory = dirname(__DIR__). DIRECTORY_SEPARATOR ."public". DIRECTORY_SEPARATOR . "assets". DIRECTORY_SEPARATOR . "images";
          $image = basename($file['image']['name']);
          $directory_to_upload = $directory . DIRECTORY_SEPARATOR . $image;
          $imageFiletype = strtolower(pathinfo($image,PATHINFO_EXTENSION));
          $allowed = ["jpg","jpeg","png","gif"];

          if(in_array($imageFiletype,$allowed)){
            if(file_exists($directory_to_upload)){
              $image = time().".".$imageFiletype;
              $directory_to_upload = $directory . DIRECTORY_SEPARATOR . $image;
            }
          }
          if(move_uploaded_file($file['image']['tmp_name'], $directory_to_upload)){
               $product->image = $directory . DIRECTORY_SEPARATOR . $image;
          }
       }
        $product->name = $data['product'];
        $product->price = (float)$data['price'];
        $product->description = $data['describe'];
        $product->category_id = $data['category_id'];
        $product->featured = 0;
  
        $product->save();
    }

  }

?>