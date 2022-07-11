<?php require('conn.php'); ?>

<?php
require('includes/PHPMailer.php');
require('includes/SMTP.php');
require('includes/Exception.php');
//define name spaces
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

if(isset($_REQUEST['send']))
{
    $email = $_POST['to'];
    $sql = "SELECT email FROM u_details WHERE email = '$email' And date_added IS NOT NULL";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if ($row) {
        $_SESSION['user'] = $row['email']; // kailangan nakasession ang email para yung record nya lang ang maupdate ang password
        ?>
        <script>
        alert("<?php echo 'OTP has been sent to your email'?>");
        </script>
         echo '<script>window.location="AAverify_otp.php"</script>';
        
    </script>
    <?php
    extract($_REQUEST);
    // extract($_FILES);
    // extract($file);
    $otp = rand(100000,999999);
    $_SESSION['otp'] = $otp;
    $email = $_SESSION['to'];
    
    //create a instance phpmailer
    $mail = new PHPMailer();
    //set mailer to use smtp
    $mail->isSMTP();
    //define smtp host
    $mail->Host = "smtp.gmail.com";
    //enable smtp authentication
    $mail->SMTPAuth = "true";
    //set type of encryption (ssl/tls)
    $mail->SMTPSecure = "tls";
    //set port to connect smtp
    $mail->Port = "587";
    //set gmail user
    $mail->Username = "forcapstone312"; //before use see full video
    //set gmail password
    $mail->Password = "towfglvgxvohaxqa"; // see setting in youtube video working perfect
    //set gmail subject
    $mail->Subject = "Your verification code";
    //set sender email
    $mail->setFrom('forcapstone312@gmail.com', 'OTP Verification'); //setting good OTP verification as subject
    //email body
    $mail->Body="Dear user, we have receive a password reset request. Here is your OTP $otp";

    //add recipient
    $mail->addAddress($to);
    // $mail->addCC($CC);
    // $mail->addCC();
    // $mail->addBCC($BCC);
    // $mail->addAttachment($name);

    //closing smtp connection
    if($mail->Send())
    {
    $msg= "Email Sent";
    }
    else
    {
        $msg = "Email does not exist";
    }
    $mail->smtpClose();   
        }else {
            ?>
            <script>
            alert("<?php echo 'Email not found or your account has not been approved yet'?>");
            header('Location: forgotPass.php');
        </script>
        <?php
        }
    }
    ?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <!-- links in one  -->
    <?php include 'templates/links.php' ?>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/login-style.css">
    <style>
        body {
            background: url('img/home.png');
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light login-nav">
        <div class="container-fluid ">
            <div class="w-nav"> </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"   data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span data-toggle="collapse" class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end px-4 " id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item p-2 my-auto">
                        <a class="nav-link nav-link-fade-up" aria-current="page" href="index.php"> <span class="nav-link-fade-up">Home</span> </a>
                    </li>
                    <!-- <li class="nav-item p-2 my-auto">
                        <a class="nav-link nav-link-fade-up" href="#announcements"> <span class="nav-link-fade-up"> Announcements</span></a>
                    </li>
                    <li class="nav-item p-2 my-auto">
                        <a class="nav-link " href="#books"> <span class="nav-link-fade-up">Books</span> </a>
                    </li> -->

                </ul>
            </div>
        </div>
    </nav>


    <!-- section start -->
    <section>
        <!-- left side start -->
        <div class="col-6 img-box">
            <img src="img/login.png" alt="" class="img-fluid">
        </div>
        <!--left side end-->

        <!-- right side start content box -->
        <div class="col cont-box">

            <!-- form box -->
            <div class="form-box">
                <!-- login wrap start -->
                <div class="login-wrap">
                    <font face="rockwell">
                        <h1>Forgot Password</h1>
                    </font>
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="text" for="email">Email</label>
                            <input type="email" class="form-control" placeholder="Enter your email address" name="to" required="">
                        </div>
                        <p><i> OTP will be send to the email you provided.</i></p>

                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-dark submit button two" name="send"><span>Send OTP</span> </button>
                        </div>
                    </form>

                    <hr>
                    <p class=""><a href="login.php">Back to Login...</a> </p>
                </div> <!-- login wrap end -->
            </div>
            <!--form box end-->
        </div>
        <!--right side end xontext box-->





    </section>

    <!-- footer -->
    <?php include 'templates/footer.php' ?>

    <!-- js links-->
    <?php include 'templates/js-links.php' ?>

</body>

</html>

