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

     Router\Router::get('/admin', function() {
          App\App::view('admin'.DIRECTORY_SEPARATOR.'index');
     });


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

     Router\Router::post('/category/create',function(){
          $category = new  Controllers\CategoriesController();
          $category->create($_POST);
     });

     Router\Router::post('/product/create',function(){
          $product = new  Controllers\ProductsController();
          $product->create($_POST);
     });
     
?>
