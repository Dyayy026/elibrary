<?php
require('conn.php');

$b_id=$_GET['id1'];
$sch_id=$_GET['id2'];
$title=$_GET['id3'];


$sql="DELETE FROM borrowed WHERE sch_id='$sch_id' AND b_id='$b_id'";

if($conn->query($sql) === TRUE)
{
	$sql1="INSERT INTO message (sch_id,msg,msg_date,time) VALUES ('$sch_id','Your request to borrow book:  $title  has been rejected due to lack of copies available',curdate(),curtime())";
 $result=$conn->query($sql1);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=borrowed.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:0.01; url=borrowed.php", true, 303);

}


?>