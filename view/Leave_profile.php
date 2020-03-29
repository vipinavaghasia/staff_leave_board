<?php
session_start();
if(isset($_SESSION["id"])){
?>
<?php
require("navbar.php");
?>
<div class="jumbotron text-center" style="margin-bottom:0;background-image:url('../imges/tra.jpg'); ">

<div class="container mt-20">


  <div class="row">
    <div class="col-md-6  mt-20"  style="text-align:left;background-color:#ffffff;">
  <h1 style=" color: #357ebd"> Leave Information</h1>
</div>
    <div class="col-md-6  mt-20"  style="text-align:right;background-color:#ffffff;">
    <p  class=' btn btn-secondary  bt mt-2' style="text-align:right;" >
      <?php
      $name  =   $_SESSION["email"];
      echo ' Email: '.$name;
      ?>
    </p>
</div></div>
  <div class="row">
        <div class="col-md-12  mt-20"  style="text-align:left;background-color:#ffffff;">
  <hr class="style1">


<?php

$id  =$_SESSION["id"];

  include '../model/config.php';


      try {

          $conec = new Connection();
          $con   = $conec->Open();
          if ($con) {

              $sql = "SELECT staff.first_name,staff.last_name,leave_table.Lid,
              leave_table.Leave_Type,leave_table.Start_date,leave_table.End_date,leave_table.Return_date FROM staff
               INNER JOIN leave_table
               ON staff.id=leave_table.Sid
               WHERE staff.id=$id ";
              $re  = $con->query($sql);

              echo "



                <table class='table table-bordered mt-5'>
                  <thead>

                    <tr>
                      <th> id</th>
                      <th> First Name</th>
                       <th>Last Name</th>
                        <th>Leave type</th>
                      <th>Start Date</th>
                      <th>End Date</th>
      <th>Back to work</th>
   <th colspan='2'>Action</th>
                    </tr>
                  </thead>
                  <tbody>";

  foreach ($con->query($sql) as $row) {
  $leave_table_id=$row['Lid'];
      $start_date = $row['Start_date'];
  $end_date = $row['End_date'];
  $return_date = $row['Return_date'];
  $start = date("d-m-Y", strtotime($start_date));
  $end = date("d-m-Y", strtotime($end_date));
  $return = date("d-m-Y", strtotime($return_date));
  echo "<tr>";

echo "<td>" . $row['Lid']. "</td>";
  echo "<td>" . $row['first_name']  . "</td>";
  echo "<td>" . $row['last_name']  . "</td>";
  echo "<td>" . $row['Leave_Type']  . "</td>";
  echo "<td>" . $start. "</td>";
  echo "<td>" . $end. "</td>";
  echo "<td>" .$return. "</td>";

    echo "<td><a href='UpdateForm.php?lid=$leave_table_id'>Update</a></td>";
  echo "<td><a href='UpdateForm.php?lid=$leave_table_id'>Delete</a></td>";




  echo"</tr>";





  }

  echo "</tbody></table>";






          } else {
              echo $con;
          }
      } catch (PDOException $ex) {
          echo $ex->getMessage();
      }
    ?>




        </div>
      </div></div></div>


<?php


      require("footer.php");
      ?>
</body></html>
<?php
}
else{
  $redirectUrl = 'login.php';

  echo '<script type="application/javascript">alert("you need to login"); window.location.href = "'.$redirectUrl.'";</script>';

}
