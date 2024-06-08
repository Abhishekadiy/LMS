<?php
require('top.inc.php');

if(isset($_GET['type']) && $_GET['type'] =='delete' && isset($_GET['id']))
{
    $id =mysqli_real_escape_string($con,$_GET['id']);
     mysqli_query($con,"delete from `leave` where id='$id'");
}

if(isset($_GET['type']) && $_GET['type'] =='update' && isset($_GET['id']))
{
    $id =mysqli_real_escape_string($con,$_GET['id']);
    $status =mysqli_real_escape_string($con,$_GET['status']);
     mysqli_query($con,"update `leave` set leave_status='$status' where id='$id'");
}


if($_SESSION['ROLE'] ==1){
    $eid=$_SESSION['USER_ID'];
    $sql="SELECT `leave`.*,employee.name FROM `leave`,employee 
    where `leave`.employee_id=employee.id order by `leave`.id desc";
 } else { 
          $eid=$_SESSION['USER_ID'];
          $sql="SELECT `leave`.*,employee.name FROM `leave`,employee 
          where `leave`.employee_id= '$eid' and `leave`.employee_id=employee.id order by `leave`.id desc";
    
         }



$res=mysqli_query($con,$sql)
?>
  <div class="data">
      <div class="Box-title">
       <h2>leave</h2>
      


       <?php if($_SESSION['ROLE'] ==1)  { ?>
         <h2></h2> 
  <?php } else { ?>
    <h4 ><a style="color:grey" href="add_leave.php">ADD leave</h4>     <?php } ?>



       </div>
       <div class="header_fixed">
        <table>
            <thead>
                <tr>
                    <th width="10%">S No.</th>
                    <th width="5%">ID</th>
                    <th width="19%">Employee Name </th>
                    <th width="15%">From </th>
                    <th width="15%">To</th>
                    <th width="21%">Description</th>
                    <th width="80%">Status</th>
                    <th ></th>
                  
                </tr>
            </thead>
            <tbody>
                <?php
                $i=1;
                 while($row=mysqli_fetch_assoc($res)){?>
                 <tr>
                    <td> <?php echo $i?></td>
                    <td><?php echo $row['id']?></td>
                    <td><?php echo $row['name']?></td>
                    <td><?php echo $row['leave_from']?></td>
                    <td><?php echo $row['leave_to']?></td>
                    <td><?php echo $row['leave_description']?></td>
                    <td><?php if($row['leave_status'] ==1)
                    {
                        echo "  Applied";
                    }

                    if($row['leave_status'] ==2)
                    {
                        echo " Aproved";
                    }

                    if($row['leave_status'] ==3)
                    {
                        echo " Rejected";
                    }
                    ?>
                    <?php if($_SESSION['ROLE']==1){ ?>
                    <select type="text" onchange="update_leave_status('<?php echo $row['id']?>',this.options[this.selectedIndex].value)">
                        <option value="">Update Status</option>
                        <option value="2" >Approved</option>
                        <option value="3" >Rejected</option>
                    </select>
                   <?php } ?>
                   
                </td>
                <?php
                if($row['leave_status'] ==1){?>
                  <td><a href="leave.php? id= <?php echo $row['id']?>&type=delete" >DELETE</a></td>
              <?php } else { ?>
                <td></td>    <?php } ?>
                 
                </tr>
                <?php
                $i++;
                 }?>
            </tbody>
        </table>
    </div>

    </div>

<script>

    function update_leave_status(id,select_value){
        window.location.href = 'leave.php?id='+id+' &type=update&status='+select_value;
    }
</script>

<?php
require('footer.inc.php');
?>