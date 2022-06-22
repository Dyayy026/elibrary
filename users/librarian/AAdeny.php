<?php
require('conn.php');

$sch_id=$_GET['id'];


$sql="UPDATE tb_sched SET status = 'Denied' WHERE id = '$sch_id'";

if($conn->query($sql) === TRUE)
{
	$sql1="INSERT INTO message (sch_id,msg,msg_date,time) VALUES ('$sch_id','Your request has been rejected!',curdate(),curtime())";
 $result=$conn->query($sql1);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=AAbookavisit1.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=AAbookavisit1.php", true, 303);

}


?>