<?php 
  namespace Controllers;
  class UserController
  {   
    
      public function index()
      {
        
      }
      public function login($data){
  
        $user = new \Models\UserModel();
        var_dump($data);
        $foundUser = $user->find("email", $data['email']);
        var_dump($foundUser);
        
        if($foundUser)
        {
            if(!password_verify($data['password'],$foundUser->mdp)){
                 echo "mot de passe ou emal incorrect";
                 header("Location:" . \Router\Router::route('login'));
                 exit;
            }
         
        }

        $_SESSION['username'] = $foundUser->username;
        $_SESSION['email'] = $foundUser->email;
        $_SESSION['role'] = $foundUser->role;
        $_SESSION['user_id'] = $foundUser->id;
        header("Location: " . \Router\Router::route(''));
      }
      public function create($datas){
      
        $user = new \Models\UserModel();
        $user->id = mt_rand(1000, mt_getrandmax());
        $user->username = $datas['username'];
        $user->email = $datas['email'];
        $user->mdp = password_hash($datas['password'],PASSWORD_DEFAULT);
        $user->save();
        header("Location: " . \Router\Router::route('login'));
        exit;
      }
  }
?>