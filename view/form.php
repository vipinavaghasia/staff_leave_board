<?php
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


<form class="form-horizontal" role="form" name="myform1" action="../controller/AddNewStaffAndLeaveDateProcess.php"    method="post"
  id="form"  >
 
    <div class="form-group">
        <label  class= " col-sm-3  control-label"     for="first_name" >First Name:<sup style="color:#F00">*</sup></label>
        <div class="col-sm-8">
            <input type="text"    name="first_name" class="form-control" autofocus    required>

            <span class="error"    id="name2"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="lastName" class="  col-sm-3 control-label">Last Name:<sup style="color:#F00">*</sup></label>
        <div class="col-sm-8">
            <input type="text"  name="last_name" class="form-control"  autofocus  required>
             <span class="error"    id="Lname"></span>

        </div>
    </div>
    <div class="form-group  ">
        <label for="email" class="  col-sm-3 control-label">Email:<sup style="color:#F00">*</sup></label>
        <div class="col-sm-8">
            <input type="text"     id="email" name="email" class="form-control" autofocus  required>


        </div>
        <div class="form-group  ">
            <label for="email" class="  col-sm-3 control-label">Password:<sup style="color:#F00">*</sup></label>
            <div class="col-sm-8">
                <input type="pws"     id="password" name="password" class="form-control" autofocus  required>


            </div>


    </div>

     <div class="form-group">

  <label for="Leave" class="col-sm-3 control-label">Leave Type:<sup style="color:#F00">*</sup></label><br>
  <div class="col-sm-8">
<select class="custom-select mr-sm-2"   name="Leave_Type" >

<option value=""></option>
<option  name="Leave_Type" value="Parental leave">Parental leave</option>
<option  name="Leave_Type" value="Annual leave">Annual leave</option>
</select>
<span class="error"    id="ge"></span></div>
</div>

<div class="form-group">
  <label for="date" class="col-sm-3 control-label">start_date:<sup style="color:#F00">*</sup></label><br>
    <div class="col-sm-8">
  <input type="date" name="Start_date"    class="form-control" required>

    </div></div>
    <div class="form-group">
      <label for="date" class="col-sm-3 control-label">End_date:<sup style="color:#F00">*</sup></label><br>
        <div class="col-sm-8">
      <input type="date" name="End_date"    class="form-control" required>

        </div></div>
        <div class="form-group">
          <label for="date" class="col-sm-3 control-label">Return_date:<sup style="color:#F00">*</sup></label><br>
            <div class="col-sm-8">
          <input type="date" name="Return_date"    class="form-control" required>

            </div></div>







                 <div class="form-group">
                     <div class="col-sm-8">


<input type="submit" value="Submit"  type='button'  class=' btn btn-secondary mt-2' name="submit" >

    </div>
           </div></div></div>

</form> <!-- /form -->

      </div>
    </div></div></div></div>

        <?php
    require("footer.php");
    ?>
</body></html>
