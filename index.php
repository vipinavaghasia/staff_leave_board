<?php
session_start();
?>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TAFE </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
 <!---JavaScript to search for specific data in a table.-->
<script src="css/css/bootstrap.css"></script>

<script src="js/js/bootstrap.js"></script>


     <link rel="stylesheet" href="css/style.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
     <style>
     </style>


   </head>
  <body>
    <header>
<nav class=" navbar navbar-expand-sm">
      <div class="container">

              <div class="row">
          <div class="col-md-6">

              </div>


    <div class="col-md-6" style="color:white; text-align:left;">
                  <h1><strong>Staff Leave Board</strong></h1>
      </div>
      </div>


<div class="row">
      <div class="col-md-12" style="text-align:right;">
        <a href="index.php" class="btn btn-secondary btn-mg active" role="button" aria-pressed="true">HOME</a>

            <div class="input-group mt-4">


                   <input type="text"   id="myInput" onkeyup="myFunction()" class="form-control"  placeholder="Search for names.."
                   title="Type in a name">
                   <div class="input-group-append">
                       <button type="button" class="btn btn-secondary" type="button">
                           <i class="fa fa-search"></i>
                       </button>
                   </div>
               </div>

               </div>

</div>
        </nav>

        <nav class="navbar navbar-expand-sm  justify-content-center mb-30"    style="background-color:#001133";>

            <div class="container">

             <button class="navbar-toggler text-right" type="button" data-toggle="collapse" data-target="#collapsibleNavbar"  id="nav-button">
  <span class="   fa fa-bars text-right"></span>
</button>
 <div class="collapse navbar-collapse" id="collapsibleNavbar">
   <!-- Left Side Of Navbar -->

          <ul class="navbar-nav   mr-auto" style="color:white;" >
            <li class="nav-item " >
              <a class="nav-link" href="view/form.php"> Leave Form</a>
              </li>
              <li class="nav-item " >
                <a class="nav-link" href="view/Leave_profile.php">Leave Profile</a>
                </li>
              <li class="nav-item " >
                <a class="nav-link" href="index.php"> Home</a>
                </li>
              </ul>
              <ul class="navbar-nav ml-auto">
                <li class="nav-item " >
                  <a class="nav-link" href="view/login.php">Login</a>
                  </li>
                  <li class="nav-item " >
                    <a class="nav-link" href="logout.php">Logout</a>
                    </li>

</ul></div></div>
</nav>
</header>
<div class="jumbotron text-center" style="margin-bottom:0;background-image:url('imges/tra.jpg'); ">

<div class="container mt-20">
  <div class="row">
    <div class="col-md-2 mt-20 " >
  </div>
    <div class="col-md-8  mt-20"  style="text-align:center;background-color:#ffffff;">
  <h1 style=" color: #357ebd">Staff Leave Board</h1>
  <hr class="style1">
  <script>
  function myFunction() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
      td = tr[i].getElementsByTagName("td")[0];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "";
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }
  </script>








  

      <div   id="myTable" class="table-responsive-sm">
      <?php
      include 'model/config.php';



    try {

        $conec = new Connection();
        $con   = $conec->Open();
        if ($con) {

            $sql = "SELECT staff.first_name,staff.last_name,leave_table.Leave_Type,leave_table.Start_date,leave_table.End_date,leave_table.Return_date FROM staff INNER JOIN leave_table ON staff.id=leave_table.Sid";
            $re  = $con->query($sql);

            echo "



              <table     class='table table-bordered mt-5'>
                <thead>

                  <tr>
                    <th> First Name</th>
                     <th>Last Name</th>
                      <th>Leave type</th>
                    <th>Start Date</th>
                    <th>End Date</th>
    <th>Back to work</th>

                  </tr>
                </thead>
                <tbody>";

foreach ($con->query($sql) as $row) {

    $start_date = $row['Start_date'];
$end_date = $row['End_date'];
$return_date = $row['Return_date'];
$start = date("d-m-Y", strtotime($start_date));
$end = date("d-m-Y", strtotime($end_date));
$return = date("d-m-Y", strtotime($return_date));
echo "<tr>";


echo "<td>" . $row['first_name']  . "</td>";
echo "<td>" . $row['last_name']  . "</td>";
echo "<td>" . $row['Leave_Type']  . "</td>";
echo "<td>" . $start. "</td>";
echo "<td>" . $end. "</td>";
echo "<td>" .$return. "</td>";

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
    </div>





  </div></div></div></div>
<?php

require("view/footer.php");
?>
</body></html>
