<?php
require('conn.php');

$id=$_GET['id'];

$sch_id=$_SESSION['sch_id'];

$sql="INSERT INTO borrowed (sch_id,b_id,time) VALUES ('$sch_id','$id', curtime())";

if($conn->query($sql) === TRUE)
{
echo "<script type='text/javascript'>alert('Request Sent to Admin.')</script>";
header( "Refresh:0.01; url=view_book.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Request Already Sent.')</script>";
    header( "Refresh:0.01; url=view_book.php", true, 303);

}




?>