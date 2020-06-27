<?php



namespace webchat\infra\config;

class Connection {
  private static $db;

  public static function getConnection(){

    try{

      $conn = new \PDO("sqlite:../src/infra/database/database.db");
      $conn->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
      self::$db = $conn;
      return self::$db;

    }catch(PDOException $error){
      throw new PDOException($error);
    };
      
  }


  public static function createTables(){

    $db = self::getConnection();
    $query = '
        CREATE TABLE IF NOT EXISTS users(
          name VARCHAR(200) NOT NULL,
          password VARCHAR(200) NOT NULL
        )
    ';

      $db->exec($query);

    $query = '
    CREATE TABLE IF NOT EXISTS messages(
      id INTEGER PRIMARY KEY AUTOINCREMENT,
      name VARCHAR(200) NOT NULL,
      body VARCHAR(200)NOT NULL
    )
    ';

    $db->exec($query);
  }
}


?>