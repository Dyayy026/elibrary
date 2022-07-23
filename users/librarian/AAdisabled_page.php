<?php require('conn.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- links in one  -->
    <?php include '../../templates/links.php' ?>
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/login-style.css">
    <style>
        body {
            background: url('../../img/home.png');
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
                        <a class="nav-link nav-link-fade-up" aria-current="page" href="../../login.php"> <span class="nav-link-fade-up">Home</span> </a>
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
            <img src="../../img/login.png" alt="" class="img-fluid">
        </div>
        <!--left side end-->

        <!-- right side start content box -->
        <div class="col cont-box">


            <div class="col">
                
                <h1>Your Account has been disabled.</h1>
            </div>
        </div>
        <!--right side end xontext box-->





    </section>

    <!-- footer -->
    <?php include '../../templates/footer.php' ?>

    <!-- js links-->
    <?php include '../../templates/js-links.php' ?>

</body>

</html>