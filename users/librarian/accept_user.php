<?php

require('conn.php');


$sch_id=$_GET['id1'];


$sql="SELECT * FROM u_details WHERE sch_id='$sch_id'";
$result=$conn->query($sql);
$row=$result->fetch_assoc();

$user=$row['email'];



$sql1="UPDATE u_details SET date_added=curdate() WHERE sch_id='$sch_id'";
 
if($conn->query($sql1) === TRUE)
{
echo "<script type='text/javascript'>alert('User Accepted')</script>";
header( "Refresh:0.01; url=approve-users.php", true, 303);
}
else
{
	echo "<script type='text/javascript'>alert('Error')</script>";
    header( "Refresh:1; url=approve-users.php", true, 303);

}



?>


<?php
/*##########Script Information#########
  # Purpose: Send mail Using PHPMailer#
  #          & Gmail SMTP Server 	  #
  # Created: 24-11-2019 			  #
  #	Author : Hafiz Haider			  #
  # Version: 1.0					  #
  # Website: www.BroExperts.com 	  #
  #####################################*/

//Include required PHPMailer files
	require 'includes/PHPMailer.php';
	require 'includes/SMTP.php';
	require 'includes/Exception.php';
//Define name spaces
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;
//Create instance of PHPMailer
	$mail = new PHPMailer();
//Set mailer to use smtp
	$mail->isSMTP();
//Define smtp host
	$mail->Host = "smtp.gmail.com";
//Enable smtp authentication
	$mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
	$mail->SMTPSecure = "tls";
//Port to connect smtp
	$mail->Port = "587";
//Set gmail username
	$mail->Username = "avatarteam4@gmail.com";
//Set gmail password
	$mail->Password = "pogisiarjay";
//Email subject
	$mail->Subject = "Test email using PHPMailer";
//Set sender email
	$mail->setFrom('avatarteam4@gmail.com');
//Enable HTML
	$mail->isHTML(true);
//Attachment
	//$mail->addAttachment('img/attachment.png');
//Email body
	$mail->Body = "<h1>Your request has been accepted!!</h1></br><p>You may now login to your account.
	Please present your library visit form from your school. <br>
	<strong>Strictly no library visit form no entry<strong><br>Thank you.</p>";
//Add recipient
	$mail->addAddress($user);
//Finally send email
	if ( $mail->send() ) {
		echo "Email Sent..!";
	}else{
		//echo "Message could not be sent. Mailer Error: "{$mail->ErrorInfo};
	}
//Closing smtp connection
	$mail->smtpClose();

?>