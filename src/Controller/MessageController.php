<?php


namespace webchat\Controller;
use webchat\model\Message;


class MessageController{

  public static function sendMessage(){
    $message = new Message();
    $message->setName($_POST['name']);
    $message->setBody($_POST['body']);
    $message->createMessage();
  }

  public static function receiveMessage(){
    $message = new Message();
    $row = $message->getMessages($_GET['index']);
    echo json_encode($row);
  }
}

?>