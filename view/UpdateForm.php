<?php
session_start();
require("navbar.php");
?>
<div class="jumbotron text-center" style="margin-bottom:0;background-image:url('imges/tra.jpg'); ">

<div class="container mt-20">
  <div class="row">
    <div class="col-md-2 mt-20 " >
  </div>
    <div class="col-md-8  mt-20"  style="text-align:left;background-color:#ffffff;">
  <h1 style=" color: #357ebd">Staff Leave Board</h1>
  <hr class="style1">

<div class="container">
  <?php
  include '../model/config.php';
    $leave_table_id= $_GET['lid'];

  $staff_id =$_SESSION["id"];


    $conec = new Connection();
    $con   = $conec->Open();
    if ($con) {

        $sql = "SELECT * FROM staff where id=$staff_id";
          $sql1 = "SELECT * FROM  leave_table where Lid=$leave_table_id";
        $result1= $con->prepare($sql);
  $result1->execute();
  $result2  = $con->prepare($sql1);
      $result2->execute();
        for($i=0; $row = $result1->fetch(); $i++){
  echo'

  <form action="../controller/update_Process.php"  method = "POST" role="form">
<input name="id" value="'.$row["id"].'"   type="hidden"  required>
       <div class="form-group">
           <label  class= " col-sm-3  control-label"     for="first_name" >First Name:<sup style="color:#F00">*</sup></label>
           <div class="col-sm-8">
               <input type="text"   value="'.$row["first_name"].'"  name="first_name" class="form-control" autofocus    required>

               <span class="error"    id="name2"></span>
           </div>
       </div>
       <div class="form-group">
           <label for="lastName" class="  col-sm-3 control-label">Last Name:<sup style="color:#F00">*</sup></label>
           <div class="col-sm-8">
               <input type="text"  value="'.$row["last_name"].'"         name="last_name" class="form-control"  autofocus  required>
                <span class="error"    id="Lname"></span>

           </div>
       </div>
       <div class="form-group  ">
           <label for="email" class="  col-sm-3 control-label">Email:<sup style="color:#F00">*</sup></label>
           <div class="col-sm-8">
               <input type="text"   value="'.$row["email"].'"    id="email" name="email" class="form-control" autofocus  required>


           </div>
           <div class="form-group  ">
               <label for="email" class="  col-sm-3 control-label">Password:<sup style="color:#F00">*</sup></label>
               <div class="col-sm-8">
                   <input type="pws"    value="'.$row["password"].'"   id="password" name="password" class="form-control" autofocus  required>


               </div>


       </div>';
}
for($i=0; $row = $result2->fetch(); $i++){
      echo'
<input name="Lid" value="'.$row["Lid"].'"   type="hidden"  required>
         <div class="form-group">

      <label for="Leave" class="col-sm-3 control-label">Leave Type:<sup style="color:#F00">*</sup></label><br>
      <div class="col-sm-8">
    <select class="custom-select mr-sm-2"    name="Leave_Type" >

    <option value="">'.$row["Leave_Type"].' </option>
    <option  name="Leave_Type" value="Parental leave">Parental leave</option>
    <option  name="Leave_Type" value="Annual leave">Annual leave</option>
    </select>
    <span class="error"    id="ge"></span></div>
    </div>

    <div class="form-group">
      <label for="date" class="col-sm-3 control-label">start_date:<sup style="color:#F00">*</sup></label><br>
        <div class="col-sm-8">
      <input type="date" name="Start_date"    value="'.$row["Start_date"].'"    class="form-control" required>

        </div></div>
        <div class="form-group">
          <label for="date" class="col-sm-3 control-label">End_date:<sup style="color:#F00">*</sup></label><br>
            <div class="col-sm-8">
          <input type="date" name="End_date"     value="'.$row["End_date"].'"   class="form-control" required>

            </div></div>
            <div class="form-group">
              <label for="date" class="col-sm-3 control-label">Return_date:<sup style="color:#F00">*</sup></label><br>
                <div class="col-sm-8">
              <input type="date" name="Return_date"     value="'.$row["Return_date"].'"   class="form-control" required>

                </div></div>







                     <div class="form-group">
                         <div class="col-sm-8">

                         <input type ="submit"          class="btn btn-secondary mt-2" name="Update" value="Update">
                               <input type ="submit" class="btn btn-secondary mt-2"        name="Delete" value="Delete">


        </div>
               </div></div></div>

    </form> ';
  }
}?>
    </div></div></div></div></div>



    <?php
require("footer.php");
?>
</body></html>
