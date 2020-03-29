<?php
include '../model/config.php';



try {

  $conec = new Connection();
  $con   = $conec->Open();
  $output='';
  if ($con) {

      $sql = "SELECT * FROM `staff` WHERE first_name LIKE'%".$_POST["search"]."%'";
      $re  = $con->query($sql);
      if($re->rowcount()>0)//if row  found
      {
$output .="
              <table     class='table table-bordered mt-5'>
                <thead>

                  <tr>
                    <th> First Name</th>
                     <th>Last Name</th>
                      <th>Leave type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
    <th>Back to work</th>

                  </tr>";




        foreach ($con->query($sql) as $row) {
$output .="
<tr>


<td>" . $row['first_name']  . "</td>
<td>" . $row['last_name']  . "</td>
<td>" . $row['email']  . "</td>

</tr>";
        }
        echo $output;
}
else {
  echo'Data Not Found';
}


?>
