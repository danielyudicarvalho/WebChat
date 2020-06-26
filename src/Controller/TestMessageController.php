<?php


namespace webchat\Controller;

use webchat\model\Message;
use webchat\config\Connection;


class TestMessageController{

  public function getMessages(){
    $message = new Message();
    $result = $message->getMessage($_GET['index']);
    echo json_encode($result);
  }

  public function sendMessage(){
    $message = new Message();
    $message->setName($_POST['name']);
    $message->setBody($_POST['body']);
    $message->createMessage();
  }
 
}



?>