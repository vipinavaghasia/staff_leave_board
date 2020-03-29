<?php
require("inputFilter.php");
include '../model/config.php';

require("../model/dbfunction.php");


if (!empty($_POST['email'])) {
  $email = $_POST['email'];


    $conec = new Connection();
    $con   = $conec->Open();
    if ($con) {
    $stmt=$con->prepare("select * from staff where email=:e");
    $stmt->bindParam(':e',$email);
    $stmt->execute();

    $rows =$stmt->fetch();

    if($stmt->rowcount()>0)//if row  found
  {
    echo "<span class='status-not-available'> Username Not Available.</span>";
  }else{
  echo "<span class='status-available'> Username Available.</span>";
  }
}

}
?>
