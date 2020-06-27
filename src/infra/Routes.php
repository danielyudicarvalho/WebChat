<?php


namespace webchat\infra;

class Routes{

  private $routes;


  public function __construct(){
    $this->initRoutes();
    $this->runPage($this->getURL());
  }

  public function setRoutes($data){
    $this->routes = $data;
  }

  public function getRoutes(){
    return $this->routes;
  }


  public function initRoutes(){

   
    $route['home'] = Array(
      'path'=>'/',
      'controller'=>'userController',
      'action'=>'index'
    );

    $route['enter'] = Array(
      'path'=>'/enter',
      'controller'=>'userController',
      'action'=>'createUser'
    );

    $route['send'] = Array(
      'path'=>'/sendMessage',
      'controller'=>'messageController',
      'action'=>'someTest'
    );

    $route['receive'] = Array(
      'path'=>'/receiveMessage',
      'controller'=>'testMessageController',
      'action'=>'getMessages'
    );


    $route['test'] = Array(
      'path'=>'/testController',
      'controller'=>'testMessageController',
      'action'=>'sendMessage'
    );

    $this->setRoutes($route);
  }

  public function getURL(){
    $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return $url;
  }

  public function runPage($url){
    foreach($this->getRoutes() as $key=>$routes){
      if($routes['path'] == $url){
        $class = "webchat\\Controller\\".ucfirst($routes['controller']);
        $controller = new $class;
        $action = $routes['action'];
        $controller->$action();
      }
    }
  }

}

?>