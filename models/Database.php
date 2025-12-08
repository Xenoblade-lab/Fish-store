<?php
  namespace Models;
  class  Database
  {
    protected array $config;
    protected $connexion;

    public function __construct()
    {
        $this->config = require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR  . 'config.php';
    }
    public function connexion()
    {
        try{
           $this->connexion = new \PDO("mysql:host=" . $this->config['DB_HOST'] . ";port=3306" . ";dbname=" . $this->config['DB_NAME'] . ";charset=utf8mb4",$this->config['DB_USER'],$this->config['DB_PASS']);
           $this->connexion->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
          
        }catch(\PDOException $e){
            echo $e->getMessage();
        }
    }
  }
?>