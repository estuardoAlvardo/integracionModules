<?php
 
$databaseHost = 'localhost:8889';
$databaseName = 'officient';
$databaseUsername = 'root';
$databasePassword = 'Admin11!';
 
try {
    
    // http://php.net/manual/en/pdo.connections.php
    $dbConn = new PDO("mysql:host={$databaseHost};dbname={$databaseName}", $databaseUsername, $databasePassword,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    
    $dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Setting Error Mode as Exception
    // More on setAttribute: http://php.net/manual/en/pdo.setattribute.php
    //echo 'conexion a la base de datos funcional';

} catch(PDOException $e) {
    echo $e->getMessage();
}

?>