<?php
include "dbconnection.php";

$_SESSION["user"][] = $_REQUEST["user"];
  foreach ($_SESSION["user"] as $user){
}
$_SESSION["email"][] = $_REQUEST["email"];
foreach ($_SESSION["email"] as $email){
}
$_SESSION["pass"][] = $_REQUEST["pass"];
foreach ($_SESSION["pass"] as $pass){
}
$_SESSION["repass"][] = $_REQUEST["repass"];
  foreach ($_SESSION["repass"] as $repass){
}

$user = $_POST['user'];
$email = $_POST['email'];
$pass = hash("sha256" , $_POST['pass'] );
$repass = $_POST['repass'];


$sql = "SELECT user From usuarios WHERE user = '$user'";
$result = $pdo->query($sql);

if($result->rowCount() > 0){

  $data = array('done' => false , 'message' => "Error nombre de usuario ya existe");
  Header('Content-Type: application/json');
  echo json_encode($data);
  exit();

}else{

  $sql = "SELECT email From usuarios WHERE email = '$email'";
  $result = $pdo->query($sql);

  if($result->rowCount() > 0)
  {

    $data = array('done' => false , 'message' => "Error email ya existe");
    Header('Content-Type: application/json');
    echo json_encode($data);
    exit();

  }

  else
  {
    $sql = "INSERT INTO usuarios (user, email, pass, repass) VALUES ('$user', '$email', '$pass', '$repass')";
$pdo->query($sql);

if($result->rowCount() > 0)
{

  $data = array('done' => false , 'message' => "Usuario nuevo creado");

  exit();

}

  }

}
 ?>
