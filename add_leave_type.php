<?php
require('top.inc.php');


if($_SESSION['ROLE'] !=1){
  header('Location: add_employee.php?id='.$_SESSION['USER_ID']);
  die();
}

// $res=mysqli_query($con,"SELECT * FROM leave_type")
if (isset($_POST['leave_type']))
{ 
  $leave_type =mysqli_real_escape_string($con,$_POST['leave_type']);
  mysqli_query($con,"Insert into leave_type (leave_type) values ('$leave_type')");
  header("Location:leave_type.php");
  die;
}
?>
  <div class="data">
  <div class="form_class">
  <h3>leave_type Form</h3>
  <br><br>

<div>
<form method="post">
    <h3>Leave  Name</h3>
    <input type="text" name="leave_type" placeholder="Enter your Leave type..." required>
    <input type="submit" value="Submit">
  </form>
</div>
</div>
    </div>

<?php
require('footer.inc.php');
?>