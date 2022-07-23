<?php

require('conn.php');


$sch_id=$_GET['id1'];


$sql="SELECT * FROM u_details WHERE sch_id='$sch_id'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$acc_status = "Disabled";


$sql1="UPDATE u_details SET  acc_disable = '$acc_status',date_disabled=curdate(),ut_id = '5' WHERE sch_id = '$sch_id'";
 
if($conn->query($sql1) === TRUE)
{
echo "<script type='text/javascript'>alert('Account has been disabled')</script>";
header( "Refresh:0.01; url=viewall-users.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=viewall-users.php", true, 303);

}



?>

