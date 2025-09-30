<?php
/**
 *
 */
class DB_connect

{

  function connect()
  {
    try
    {
    $PDO = new PDO("mysql:host=".DB::$host.";dbname=".DB::$db."",DB::$user,DB::$pw, array(
        PDO::ATTR_PERSISTENT => true));
    }
    catch(PDOException $e)
    { echo $e->getMessage(); }
    $PDO->beginTransaction();
  }
}

?>
