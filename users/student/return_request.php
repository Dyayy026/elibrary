<?php
require('conn.php');

$id=$_GET['id'];

$sch_id=$_SESSION['sch_id'];

$sql="INSERT INTO returns (sch_id,b_id) VALUES ('$sch_id','$id')";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Request Sent to Admin.')</script>";
header( "Refresh:0.01; url=current.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
    header( "Refresh:0.01; url=current.php", true, 303);

}




?>