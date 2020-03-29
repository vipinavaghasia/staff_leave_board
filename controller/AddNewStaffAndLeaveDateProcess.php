
<?php
require("inputFilter.php");
include '../model/config.php';

require("../model/dbfunction.php");





if(!empty([$_POST])){




      $name = !empty($_POST['first_name'])? inputFilter(($_POST['first_name'])): null;

      $last_name = !empty($_POST['last_name'])? inputFilter(($_POST['last_name'])): null;
     $email= !empty($_POST['email'])? inputFilter(($_POST['email'])): null;
         $password = !empty($_POST['password'])? inputFilter(($_POST['password'])): null;
         //password_hash
           $password=password_hash($password,PASSWORD_DEFAULT);
    $Leave_Type = !empty($_POST['Leave_Type'])? inputFilter(($_POST['Leave_Type'])): null;
      $Start_date = !empty($_POST['Start_date'])? inputFilter(($_POST['Start_date'])): null;
   $End_date = !empty($_POST['End_date'])? inputFilter(($_POST['End_date'])): null;

      $Return_date = !empty($_POST['Return_date'])? inputFilter(($_POST['Return_date'])): null;



          $conec = new Connection();
          $con   = $conec->Open();
          if ($con) {
          $stmt=$con->prepare("select * from staff where first_name=:n and email=:e");
              $stmt->bindParam(':n',$name);
          $stmt->bindParam(':e',$email);
          $stmt->execute();

          $rows =$stmt->fetch();

          if($stmt->rowcount()>0)//if row  found
        {

$staff_id = $rows['id'];
  Add_Leave($Leave_Type,$Start_date,$End_date,$Return_date,$staff_id);
          $redirectUrl = '../view/form.php';

           echo '<script type="application/javascript">alert("Successfully apply"); window.location.href = "'.$redirectUrl.'";</script>';

}

else{




      Leave_form($name,$last_name,$email,$password,$Leave_Type,$Start_date,$End_date,$Return_date);

      $redirectUrl = '../index.php';

      echo '<script type="application/javascript">alert("Successfully apply"); window.location.href = "'.$redirectUrl.'";</script>';
}
}
}
?>
