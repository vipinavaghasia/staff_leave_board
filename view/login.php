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

  <form action="../controller/Login_Process.php" method='post' role="form">

  <div class="form-group">
  <label for="email" class="text-primary">Email:</label><br>
  <input type="text" name="email"     class="form-control" required>
  </div>
  <div class="form-group">
  <label for="pwd" class="text-primary">Password:</label><br>
  <input type="text" name="password"     class="form-control" required>
  </div>

            <?php
            if(isset($_SESSION["error"])){
              $error = $_SESSION["error"];
              echo "<p>$error</p>";
            }
            ?>
      <div class="form-group">
          <input type="submit" value="Submit" class="btn btn-secondary  bt mt-2" ></div>
  	</form></div></div></div></div></div>



    <?php
require("footer.php");
?>
</body></html>
