<?php require('conn.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify OTP</title>
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
                        <h1>Verify OTP</h1>
                    </font>
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="text" for="email">Enter your OTP</label>
                            <input type="text" class="form-control" placeholder="Check your email for your OTP" name="otp" required="">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-dark submit button two" name="verify_otp"><span>Verify</span> </button>
                        </div>
                    </form>

                    <hr>
                    <p class=""><a href="AAforgot_pass.php">Back</a> </p>

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

<?php 
    if(isset($_POST["verify_otp"])){
        $otp = $_SESSION['otp']; 
        $email = $_SESSION['to'];
        $otp_code = $_POST['otp'];

        if($otp != $otp_code){
            ?>
           <script>
               alert("Invalid OTP code");
           </script>
           <?php
        }else{
           // mysqli_query($connect, "UPDATE user_details SET status = 1 WHERE email = '$email'");
            ?>
             <script>
                 alert("OTP verified, you may now change your password");
                   window.location.replace("AAreset_pass.php");
             </script>
             <?php
        }

    }

?>