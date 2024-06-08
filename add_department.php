<?php
require('top.inc.php');
// $res=mysqli_query($con,"SELECT * FROM department")
if (isset($_POST['department']))
{ 
  $department =mysqli_real_escape_string($con,$_POST['department']);
  mysqli_query($con,"Insert into department (department) values ('$department')");
  header("Location:index_.php");
  die;
}
?>
  <div class="data">
  <div class="form_class">
  <h3>Department Form</h3>
  <br><br>

<div>
<form method="post">
    <h3>Department Name</h3>
    <input type="text" name="department" placeholder="Enter your department name..." required>
    <input type="submit" value="Submit">
  </form>
</div>
</div>
    </div>

<?php
require('footer.inc.php');
?>