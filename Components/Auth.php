<?php


class Auth
{
    public $db;

    public function __construct(QueryBuilder $db)
    {
        $this->db = $db;
    }

    public function register($email, $password)
    {
      $data = [
      "email" => $email,
      "password" => md5($password)
    ];

        $this->db->store("users", $data);
    }


    public function login($email, $password){

    $sql = "SELECT * FROM users WHERE email=:email AND password=:password LIMIT 1";

    $password = md5($password);

    $statement = $this->db->pdo->prepare($sql);

    $statement->bindParam(":email", $email);

    $statement->bindParam(":password", $password);

    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user){
      $_SESSION["user"] = $user;
      return true;
    }

    return false;
  }

    public function logout(){
      unset($_SESSION['user']);
    }


    public function check(){
      if(isset($_SESSION['user'])){
        return true;
      }

      return false;
    }


    static public function currentUser(){

      if(isset($_SESSION['user'])){
        return $_SESSION['user'];
      }
    }

    public function getCleanPassword(){
      $user = self::currentUser();
    }

}