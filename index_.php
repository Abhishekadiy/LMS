<?php
require('top.inc.php');


if($_SESSION['ROLE'] !=1){
    header('Location: add_employee.php?id='.$_SESSION['USER_ID']);
    die();
}


if(isset($_GET['type']) && $_GET['type'] =='delete' && isset($_GET['id']))
{
    $id =mysqli_real_escape_string($con,$_GET['id']);
     mysqli_query($con,"delete from department where id='$id'");
}

$res=mysqli_query($con,"SELECT * FROM department order by ID desc")
?>
  <div class="data">
      <div class="Box-title">
       <h2>Department</h2>
       <h4 ><a style="color:grey" href="add_department.php">ADD Department</h4>
       </div>
       <div class="header_fixed">
        <table>
            <thead>
                <tr>
                    <th width="8%">S No.</th>
                    <th width="5%">ID</th>
                    <th width="10%">Department </th>
                    <th width="60%"></th>
                    <th width="10%"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                 while($row=mysqli_fetch_assoc($res)){?>
                 <tr>
                    <td> <?php echo $i?></td>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['department']?></td>
                    <td></a><td>
                        <a href="index_.php? id= <?php echo $row['id']?>&type=delete" >DELETE</a></td></td>
                 
                </tr>
                <?php
                $i++;
                 }?>
            </tbody>
        </table>
    </div>

    </div>

<?php
require('footer.inc.php');
?>