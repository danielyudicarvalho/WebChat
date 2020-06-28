<?php


namespace webchat\Controller;
use webchat\model\User;


class UserController{


  public function index(){
    require '../src/views/entry.phtml';
  }

  public function logoutUser(){
    session_destroy();
    header('Location:/');
  }

  public function createUser(){
    $user = new User();
    $user->setName($_POST['name']);
    $user->setPassword($_POST['password']);
    
    if($_POST['login'] == 'signUp'){
      if($user->findOne()){
        header('Location: /?alert=userCreated');
      }else{
        $user->createUser();
        session_start();
        $_SESSION['user'] = $user->getName();
        $users = [];
        $users = $user->findAll();
        require '../src/views/main.php';
      }
    }else if($_POST['login'] == 'signIn'){
      if($user->auth()){
        session_start();
        $_SESSION['user'] = $_POST['name'];
        $users = [];
        $users = $user->findAll();
        require '../src/views/main.php';
      }else{
        header('Location: /?alert=wrongRegister');
      }
    }
    


  }

}


?>