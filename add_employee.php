<?php
require('top.inc.php');
$name='';
$email='';
$mobile='';
$password='';
$department_id='';
$address='';
$birthday='';
$id='';

if (isset($_GET['id'])) {
  $id=mysqli_real_escape_string($con,$_GET['id']);

  if($_SESSION['ROLE']==2 && $_SESSION['USER_ID']!=$id){
    die();
  }


  $res=mysqli_query($con,"select * from employee where id ='$id'");
  $row=mysqli_fetch_assoc($res);
  $name=$row['name'];
  $email=$row['email'];
  $mobile=$row['mobile'];
  $password=$row['password'];
  $department_id=$row['department_id'];
  $address=$row['address'];
  $birthday=$row['birthday'];


  

}
if (isset($_POST['submit']))
{ 
  $name =mysqli_real_escape_string($con,$_POST['name']);
  $email =mysqli_real_escape_string($con,$_POST['email']);
  $mobile =mysqli_real_escape_string($con,$_POST['mobile']);
  $password =mysqli_real_escape_string($con,$_POST['password']);
  $department_id =mysqli_real_escape_string($con,$_POST['department_id']);
  $address =mysqli_real_escape_string($con,$_POST['address']);
  $birthday =mysqli_real_escape_string($con,$_POST['birthday']);


  mysqli_query($con,"Insert into employee (name,email,mobile,password,department_id,address,birthday,role) values
   ('$name','$email','$mobile','$password','$department_id','$address','$birthday','2')");
  header("Location:employee.php");
  die;
}
?>
  <div class="data">
  <div class="form_class">
  <div class="form_allign">
  <?php if($_SESSION['ROLE'] ==1)  { ?>
  <h3>Employee Form</h3>
  <?php } else { ?>
    <h3>Employee Details</h3>     <?php } ?>
  <br>

<div>
  
<form method="post">
    <h3>Name</h3>
    <input type="text" name="name" value="<?php echo $name; ?>"placeholder="Enter employee name..." required>

    <h3>Email</h3>
    <input type="email" name="email" value="<?php echo $email; ?>" placeholder="Enter employee Email ID..." required>

    <h3>Mobile</h3>
    <input type="text" name="mobile" value="<?php echo $mobile; ?>" placeholder="Enter employee mobile no..." required>

    <h3>Password</h3>
    <input type="password" name="password" value="<?php echo $password; ?>" placeholder="Enter employee Password..." required>



    <h3>Department</h3>
    <select type="text" name="department_id" placeholder="Select Department..." required>
      <option value="">Select Department</option>
      <?php
      $res=mysqli_query($con,"SELECT * from department order by department desc");
      While($row = mysqli_fetch_assoc($res)){
        if($department_id ==$row['id']){
          echo "<option selected= 'selected' value=".$row['id'].">".$row['department']."</option>";
        }else{
        echo "<option value=".$row['id'].">".$row['department']."</option>";}


      } ?>
  </select>



    <h3>Address</h3>
    <input type="text" name="address" value="<?php echo $address; ?>" placeholder="Enter employee Address..." required>

    <h3>Birthday</h3>
    <input type="date" name="birthday" value="<?php echo $birthday; ?>" placeholder="Enter employee Birthday..." required>

    <?php if($_SESSION['ROLE'] ==1){ ?>
    <input type="submit" name="submit" value="Submit">
    <?php } ?>
  </form> 
</div>
</div>
</div>
    </div>

<?php
require('footer.inc.php');
?>