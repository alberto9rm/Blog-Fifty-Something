<?php

$host = 'localhost';
$db_name = 'something';
$root = 'root';
$password = 'Admin';

try{
    
$base= new PDO("mysql: host=$host;dbname=$db_name",  $root, $password);
$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Comprobar si la constante ya está definida
  if (!defined('LEER_MAS')) {
    define('LEER_MAS', 'Read More');
}

} catch(Exception $Z){

echo('Error connecting to database: ' . $Z->getMessage());
}



?>