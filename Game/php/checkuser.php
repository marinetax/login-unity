<?php
include "dbconnection.php";


$_SESSION["user"][] = $_REQUEST["user"];
  foreach ($_SESSION["user"] as $user){
}

$_SESSION["pass"][] = $_REQUEST["pass"];
foreach ($_SESSION["pass"] as $pass){
}
$user = $_POST['user'];

$pass = hash("sha256" , $_POST['pass'] );

$sql = "SELECT user From usuarios WHERE user =  '$user' AND pass = '$pass'";
$result = $pdo->query($sql);


if($result->rowCount() > 0){

  $data = array('done' => false , 'message' => "Bienvenido $user");
  Header('Content-Type: application/json');
  echo json_encode($data);
  exit();
}else{

  $data = array('done' => true , 'message' => "Error nombre de usuario");
  Header('Content-Type: application/json');
  echo json_encode($data);
  exit();


}


 ?>
