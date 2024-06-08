<?php
require('top.inc.php');

if (isset($_POST['submit']))
{ 
  $leave_id =mysqli_real_escape_string($con,$_POST['leave_id']);
  $leave_from =mysqli_real_escape_string($con,$_POST['leave_from']);
  $leave_to =mysqli_real_escape_string($con,$_POST['leave_to']);
  $employee_id =$_SESSION['USER_ID'];
  $leave_description =mysqli_real_escape_string($con,$_POST['leave_description']);



  mysqli_query($con,"Insert into `leave` (leave_id,leave_from,leave_to,employee_id,leave_description,leave_status) values
   ('$leave_id','$leave_from','$leave_to','$employee_id','$leave_description',1)");
  header("Location:leave.php");
  die;
}
?>
  <div class="data">
  <div class="form_class">
  <div class="form_allign">
  <?php if($_SESSION['ROLE'] ==1)  { ?>
  <h3>leave Form</h3>
  <?php } else { ?>
    <h3>leave Details</h3>     <?php } ?>
  <br>

<div>
  
<form method="post">
    <h3>Leave Type</h3>
    <select type="text" name="leave_id" placeholder="Select leave type..." required>
      <option value="">Select leave_type</option>
      <?php
      $res=mysqli_query($con,"SELECT * from leave_type order by leave_type desc");
      While($row = mysqli_fetch_assoc($res)){
        if($leave_type_id ==$row['id']){
          echo "<option selected= 'selected' value=".$row['id'].">".$row['leave_type']."</option>";
        }else{
        echo "<option value=".$row['id'].">".$row['leave_type']."</option>";}
       } ?>
  </select>

   
  
  <h3>From Date</h3>
    <input type="date" name="leave_from"  placeholder="Enter leave Birthday..." required>

 

    
    <h3>To Date</h3>
    <input type="date" name="leave_to"  placeholder="Enter leave Birthday..." required>




    <h3>Description</h3>
    <input type="text" name="leave_description"  required>

    <input type="submit" name="submit" value="Submit">
  
  </form> 
</div>
</div>
</div>
    </div>

<?php
require('footer.inc.php');
?>