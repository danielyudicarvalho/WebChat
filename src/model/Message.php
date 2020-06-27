<?php


namespace webchat\model;

use webchat\infra\config\Connection;

class Message{


  private $name;
  private $body;
  private $db;

  public function __construct(){
    $this->db = Connection::getConnection();
  }

  public function setName($data){
    $this->name = $data;
  }
  
  public function setBody($data){
    $this->body = $data;
  }


  public function getName(){
    return $this->name;
  }
  
  public function getBody(){
    return $this->body;
  }

  public function createMessage(){
    $query = '
      INSERT INTO messages (name, body) VALUES(:name, :body)
    ';

    $stmt =  $this->db->prepare($query);
    $stmt->bindValue('name',$this->getName());
    $stmt->bindValue('body',$this->getBody());
    $stmt->execute();

  }

  public function getMessage($index){
    $query = '
      SELECT * FROM messages WHERE id > '.$index.'
    ';
    $stmt = $this->db->query($query);
    $response = Array();

    while($row = $stmt->fetch(\PDO::FETCH_ASSOC)){
      $response['items'][] = $row;
    }

    return $response;
    
  }

  public function testando(){
    echo 'trouble';
  }

  
}
?>