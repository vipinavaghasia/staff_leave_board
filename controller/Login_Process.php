<?php
session_start();
require("inputFilter.php");
include '../model/config.php';

require("../model/dbfunction.php");

if(!empty([$_POST])){





     $email= !empty($_POST['email'])? inputFilter(($_POST['email'])): null;
$password =!empty($_POST['password'])? inputFilter(($_POST['password'])): null;
  //checking email for admin
    //checking password and username
  try{

    $conec = new Connection();
    $con   = $conec->Open();
    if ($con) {
    $stmt=$con->prepare("select * from staff where email=:e");
    $stmt->bindParam(':e',$email);
    $stmt->execute();

    $rows =$stmt->fetch();
  if(password_verify($password, $rows['password']))
    {
//assign session veriable

    $_SESSION["name"]=$rows["first_name"];
      $_SESSION["email"]=$email;
  $_SESSION["id"]=$rows["id"];

     $_SESSION["success"]="welcom to staff leave board";
//redirect page
      header('location:../index.php');
    }
    else{
      //password or username not match go back to login page
      $_SESSION["error"]="incorrect email";
      header('location:../view/login.php');
    }
  }}
  catch(PDOException $ex)
  {
    $ex->getMessage();
    die();
  }
}

?>
