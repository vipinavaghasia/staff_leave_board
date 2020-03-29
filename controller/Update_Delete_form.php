<?php
session_start();
?>
<?php
require("inputFilter.php");
include '../model/config.php';

require("../model/dbfunction.php");

if(isset($_POST['Update']))
{
  $id  = $_SESSION["id"];
echo$id;


        $name = !empty($_POST['name'])? inputFilter(($_POST['name'])): null;

        $last_name = !empty($_POST['last_name'])? inputFilter(($_POST['last_name'])): null;
       $email= !empty($_POST['email'])? inputFilter(($_POST['email'])): null;
      $leave_type = !empty($_POST['leave_type'])? inputFilter(($_POST['leave_type'])): null;
        $start_date = !empty($_POST['start_date'])? inputFilter(($_POST['start_date'])): null;
     $end_date = !empty($_POST['end_date'])? inputFilter(($_POST['end_date'])): null;

        $return_date = !empty($_POST['return_date'])? inputFilter(($_POST['return_date'])): null;
echo   $leave_type;
echo "name " ;

    echo $return_date;

        updete_Leave_form($id,$name,$last_name,$email,$leave_type,$start_date,$end_date,$return_date);
        $redirectUrl = '../index.php';

        echo '<script type="application/javascript">alert("Successfully apply"); window.location.href = "'.$redirectUrl.'";</script>';

}
if(isset($_POST['Delete']))
{
  $id  = $_SESSION["id"];
echo$id;
delete_Leave_form($id);
$redirectUrl = '../index.php';

echo '<script type="application/javascript">alert("Successfully apply"); window.location.href = "'.$redirectUrl.'";</script>';
}


?>
