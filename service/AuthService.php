<?php 
 
  namespace Service;
  
  class AuthService 
  {
       public function register(array $data = [])
       {
          $user = new \Controllers\UserController();
      
          $user->create($data);
       }
       public function login(array $data = [])
       {
           $user = new \Controllers\UserController();
           $user->login($data);
       }    

       public function logout()
      {
          $_SESSION = array();
          session_destroy();
       }

       public static function requireLogin() 
       {
            if (!self::isLoggedIn()) {
                header('Location: ' .\Router\Router::route('login'));
                exit;
            }
        }
        
        public static function isLoggedIn() {
            return isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
        }

  }
?>