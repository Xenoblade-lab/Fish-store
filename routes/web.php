<?php

     Router\Router::get('/', function() {
          App\App::view('index');
     });

     Router\Router::get('/products', function() {
          App\App::view('products');
     });
     
     Router\Router::get('/about', function() {
          App\App::view('about');
     });
     
     Router\Router::get('/contact', function() {
          App\App::view('contact');
     });
     
     Router\Router::get('/login', function() {
          $auth = new \Service\AuthService();
          
          if($auth->isLoggedIn()){
               header("Location: ". Router\Router::route(''));
          }
          App\App::view('connexion');
     });
     
     Router\Router::get('/register', function() {
          App\App::view('register');
     });

     Router\Router::get('/admin',[\Controllers\AdminController::class,'index']);


     Router\Router::post('/register', function() {
          $auth = new Service\AuthService();
          $auth->register($_POST);
     });
     
     Router\Router::post('/login', function() {
          $auth = new Service\AuthService();
          $auth->login($_POST);
     });

     Router\Router::post('/logout',function(){
          $auth = new Service\AuthService();
          $auth->logout();
     });

     Router\Router::get('/test',function(){
          $admin = new \Controllers\AdminController();
          $admin->stats();
     });

     Router\Router::post('/category/create',function(){
          $category = new  Controllers\CategoriesController();
          $category->create($_POST);
     });

     Router\Router::post('/product/create',function(){
          $product = new  Controllers\ProductsController();
          $product->create($_POST,$_FILES);
     });

     Router\Router::post('/users/[i:id]/delete',function($id){
          $user = new \Models\UserModel();
          $user->delete($id['id']);
     });
     Router\Router::post('/products/[i:id]/delete',function($id){
          $product = new \Models\Products();
          $product->delete($id['id']);
     });

     Router\Router::post('/category/[i:id]/delete',function($id){
          $category = new \Models\Categories();
          $category->delete($id['id']);
     });

     Router\Router::post('/category/[i:id]/update',function($id){
          $category = new \Models\Categories();
          $category->edit($id['id'],$_POST);
     });

     Router\Router::get('/category/[i:id]/edit',function($id){
       echo '<form action="'. Router\Router::route('category/'.$id['id'].'/update') .'" method="post">
      <label for="#">Catagorie</label>
      <input type="text" name="category">
      <button type="submit">Ajouter</button>
     </form>';
     });
?>