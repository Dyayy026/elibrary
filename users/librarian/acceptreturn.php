<?php
require('conn.php');

$b_id=$_GET['id1'];
$sch_id=$_GET['id2'];
$dues=$_GET['id3'];

$sql="SELECT ut_id FROM u_details WHERE sch_id='$sch_id'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$ut_id=$row['ut_id'];




$sql1="UPDATE borrowed SET rtn_date=curdate(),dues='$dues' WHERE b_id='$b_id' and sch_id='$sch_id'";
 
if($conn->query($sql1) === TRUE)
{$sql3="UPDATE books SET copies_avlbl=copies_avlbl+1 WHERE b_id='$b_id'";
 $result=$conn->query($sql3);
 $sql4="DELETE FROM returns WHERE b_id='$b_id' and sch_id='$sch_id'";
 $result=$conn->query($sql4);
 $sql6="DELETE FROM LMS.renew WHERE b_id='$b_id' and sch_id='$sch_id'";
 $result=$conn->query($sql4);
 $sql5="INSERT INTO message (sch_id,msg,msg_date,time) VALUES ('$sch_id','Your request for return of b_id: $b_id  has been accepted',curdate(),curtime())";
 $result=$conn->query($sql5);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=return_request.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=return_request.php", true, 303);

}





?>