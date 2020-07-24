<?php

try
{

$pdo = new PDO('mysql:host=localhost;dbname=unity' , 'root' , '');
$pdo ->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
$pdo ->exec('SET NAMES"utf8"');

}
catch (PDOException $e)
{

  $error = "ERROR CONNECTING TO DATABASE" . $e->getMessage();

  exit();

}


 ?>
