<?php
require('db.inc.php');
$msg="";
if (isset($_POST['email']) && isset($_POST['password']))
{ 
  $email =mysqli_real_escape_string($con,$_POST['email']);
  $password =mysqli_real_escape_string($con,$_POST['password']);
  $res=mysqli_query($con,"select * from employee where email='$email' and password='$password'");
  $count=mysqli_num_rows($res);
  if($count>0){
    $row = mysqli_fetch_assoc($res);
      $_SESSION['ROLE'] = $row['role'];
      $_SESSION['USER_ID'] = $row['id'];
      $_SESSION['USER_NAME'] = $row['name'];
      header("Location:index_.php");
      die();
  }else{
    $msg = "Please enter correct login details";
  }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Login</title>
    <link rel="stylesheet" href="style/login.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form method="post">
        <div class="txt_field">
          <input type="email" name="email" required>
          <span></span>
          <label>Email address</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" required>
          <span></span>
          <label>Password</label>
        </div>
        <input type="submit" value="Login">
        <div class="signup_link">
         <div style="color:red;"><?php echo $msg; ?></div>
        </div>
      </form>
    </div>

  </body>
</html>
