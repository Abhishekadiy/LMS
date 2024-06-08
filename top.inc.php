<?php
require('db.inc.php');
if(!isset($_SESSION['ROLE']))
{
    header("Location:index_.php");
    die();
};
?>

<html>
<title>SideBar Menu</title>

<html>
<title>SideBar Menu</title>

<head>
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" type="text/css" href="style/nav.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body> <input type="checkbox" id="menu">
   <nav> <label>LMS</label>
      <ul>
        <div style="color: White;"> Welcome <?php echo  $_SESSION['USER_NAME'] ?>&nbsp;
        
        <span>
        <a   style="color: White;"   href="logout.php">
         <i class="fa fa-sign-out text-success"></i>
         <span>Log Out</span>
         </a>
        </span></div>
      

      </ul> <label for="menu" class="menu-bar"> <i class="fa fa-bars"></i> </label>
   </nav>
   <div class="side-menu">
      <center>
      <?php if($_SESSION['ROLE'] ==1)  { ?>
         <h2>Admin Menu</h2> 
  <?php } else { ?>
   <h2>Employee Menu</h2>     <?php } ?>
      </center> 


         <?php if($_SESSION['ROLE'] ==1)
         { ?>

        
      <a href="index_.php">
         <i class="fa fa-building text-success"></i>
         <span>Department</span>
         </a>


         <a href="leave_type.php" >
            <i class="fa fa-table text-success"></i>
            <span>Leave Type</span>
            </a>
 
            <a href="employee.php" >
               <i class="fa fa-users text-success"></i>
               <span>Employees</span>
               </a>

               <a href="leave.php">
         <i class="fa fa-sign-out text-success"></i>
         <span>Leave</span>
         </a>

         
         <?php } else { ?>

            <a href="add_employee.php?id=<?php echo  $_SESSION['USER_ID'] ?>">
         <i class="fa fa-building text-success"></i>
         <span>Profile</span>
         </a>

         <a href="leave.php">
         <i class="fa fa-sign-out text-success"></i>
         <span>Leave</span>
         </a>


         <?php } ?>



   </div>