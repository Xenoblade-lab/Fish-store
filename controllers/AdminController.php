<?php 
namespace Controllers;
class AdminController
{
    public function index()
    {  
       $categories = new \Models\Categories();
       $users = new \Models\UserModel();
       $products = new \Models\Products();

        \App\App::view('admin'.DIRECTORY_SEPARATOR.'index',['categories'=>$categories,'users'=>$users,'products'=>$products]);
    }

    public function stats()
    {
        $user = new \Models\UserModel();
        $product = new \Models\Products();
        $category = new \Models\Categories();

        return [
            'users' => count($user->all()),
            'products' => count($product->all()),
            'categories' => count($category->all())
        ];
    }
}
?>