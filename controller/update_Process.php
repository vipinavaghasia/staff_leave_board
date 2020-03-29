<?php
session_start();
?>
<?php
require("inputFilter.php");
include '../model/config.php';

require("../model/dbfunction.php");

if(isset($_POST['Update']))
{
  $sid  = $_SESSION["id"];

$Lid=$_POST['Lid'];

        $first_name = !empty($_POST['first_name'])? inputFilter(($_POST['first_name'])): null;

        $last_name = !empty($_POST['last_name'])? inputFilter(($_POST['last_name'])): null;
       $email= !empty($_POST['email'])? inputFilter(($_POST['email'])): null;
      $password = !empty($_POST['password'])? inputFilter(($_POST['password'])): null;

            $Leave_Type = !empty($_POST['Leave_Type'])? inputFilter(($_POST['Leave_Type'])): null;

        $Start_date= !empty($_POST['Start_date'])? inputFilter(($_POST['Start_date'])): null;
     $End_date = !empty($_POST['End_date'])? inputFilter(($_POST['End_date'])): null;

        $Return_date = !empty($_POST['Return_date'])? inputFilter(($_POST['Return_date'])): null;
echo  $Leave_Type;
echo  $Start_date;
echo$End_date;
echo$Return_date;
echo$Lid;
echo  $sid;

        updete_staff_info($Leave_Type,$Start_date,$End_date,$Return_date,$sid,$Lid);
        $redirectUrl = '../index.php';

        echo '<script type="application/javascript">alert("Successfully apply"); window.location.href = "'.$redirectUrl.'";</script>';

}
if(isset($_POST['Delete']))
{
  $Lid=$_POST['Lid'];

delete_Leave_table_info($Lid);
$redirectUrl = '../index.php';

echo '<script type="application/javascript">alert("Successfully Deleted record"); window.location.href = "'.$redirectUrl.'";</script>';
}


?>
