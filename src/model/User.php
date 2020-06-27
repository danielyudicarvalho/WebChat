<?php
namespace webchat\model;

use webchat\infra\config\Connection;


class User{

  private $name;
  private $password;
  private $db;

  public function __construct(){
    $this->db = Connection::getConnection();
  }


  public function getName(){
    return $this->name;
  }

  public function getPassword(){
    return $this->password;
  }

  public function setName($data){
    $this->name = $data;
  }

  public function setPassword($data){
    $this->password  =$data;
  }



  public function createUser(){
    $query = '
      INSERT INTO users (name, password) VALUES(:name, :password)
    ';

    $stmt = $this->db->prepare($query);
    $stmt->bindValue('name', $this->getName());
    $stmt->bindValue('password',$this->getPassword());
    $stmt->execute();

  }

  public function deleteUser(){

  }

  public function findOne(){
    $query = '
      SELECT * FROM users WHERE name = :name
    ';

    $stmt = $this->db->prepare($query);
    $stmt->bindValue('name',$this->getName());
    $stmt->execute();
    $response = $stmt->fetch(\PDO::FETCH_ASSOC);
    if($response>0){
      return $response;
    }else{
      return null;
    };

    $connection = null;

  }


  public function Auth(){
      $query = '
      SELECT * FROM users WHERE name = :name AND password = :password
    ';

    $stmt = $this->db->prepare($query);
    $stmt->bindValue('name',$this->getName());
    $stmt->bindValue('password',$this->getPassword());
    $stmt->execute();
    $response = $stmt->fetch(\PDO::FETCH_ASSOC);
    if($response>0){
      return true;
    }else{
      return false;
    };

    $connection = null;

  }

  public function findAll(){

    $query = '
      SELECT * FROM users
    ';

    $stmt = $this->db->query($query);
    $users = [];

    while($rows = $stmt->fetch(\PDO::FETCH_ASSOC)){
      $users[] = $rows['name'];
    }

    return $users;
    $connection = null;
  }

}

?>