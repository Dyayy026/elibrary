<?php
require('conn.php');

$b_id=$_GET['id1'];
$sch_id=$_GET['id2'];
$title=$_GET['id3'];
$bw_id=$_GET['id4'];

$sql="SELECT ut_id FROM u_details WHERE sch_id='$sch_id'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$category=$row['ut_id'];



if($category == '2' || $category == '3' || $category == '4' )
{$sql1="UPDATE borrowed SET bw_date=curdate(), bw_due=date_add(curdate(),interval 60 day) where b_id='$b_id' and sch_id='$sch_id' and bw_id='$bw_id'";
 
if($conn->query($sql1) === TRUE)
{$sql3="UPDATE books SET copies_avlbl=copies_avlbl-1 WHERE b_id='$b_id'";
 $result=$conn->query($sql3);
 $sql5="INSERT INTO message (sch_id,msg,msg_date,time) VALUES ('$sch_id','Your request to borrow book: $title  has been accepted',curdate(),curtime())";
 $result=$conn->query($sql5);
echo "<script type='text/javascript'>alert('Success')</script>";
header( "Refresh:0.01; url=borrowed.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=borrowed.php", true, 303);

}
}
else
{$sql2="UPDATE borrowed SET bw_date=curdate(),bw_due=date_add(curdate(),interval 30 day) WHERE b_id='$b_id' AND sch_id='$sch_id'";

if($conn->query($sql2) === TRUE)
{$sql4="UPDATE bookS SET copies_avlbl=copies_avlbl-1 WHERE b_id='$b_id'";
 $result=$conn->query($sql4);
 $sql6="INSERT INTO message (sch_id,msg,msg_date,time) VALUES ('$sch_id','Your request to borrow book: $title has been accepted',curdate(),curtime())";
 $result=$conn->query($sql6);
echo "<script type='text/javascript'>Swal.fire({
    position: 'top-end',
    icon: 'success',
    title: 'Accepted',
    showConfirmButton: false,
    timer: 1500
  })</script>";
header( "Refresh:1; url=borrowed.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=borrowed.php", true, 303);

}
}



?>