<?php require('conn.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                        <h1>Login</h1>
                    </font>
                    <form action="login.php" method="POST">
                        <div class="form-group">
                            <label for="text" for="email">School ID No.</label>
                            <input type="text" class="form-control" placeholder="School ID No." name="sch_id" required="">
                        </div>

                        <div class="form-group">
                            <label class="label" for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="pword" required="">
                        </div>
                        <p class=""><a href="AAforgot_pass.php">Forgot Password?</a> </p>

                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-dark submit" name="login"><span>Log in</span> </button>
                        </div>
                    </form>

                    <hr>
                    <p class="text-center">Not a member? <a href="regform.php">Register</a> </p>
                </div> <!-- login wrap end -->
            </div>
            <!--form box end-->

            
        <!--log in code-->
        <?php
        if (isset($_POST['login'])) {
            $u = $_POST['sch_id'];
            $p = md5($_POST['pword']);

            $sql = "SELECT * FROM u_details WHERE date_added IS NOT NULL AND sch_id='$u'";

            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $x = $row['pword'];
            $y = $row['ut_id'];
           
            if (strcasecmp($x, $p) == 0 && !empty($u) && !empty($p)) {
                //echo "Login Successful";
                $_SESSION['sch_id'] = $u;


                if ($y == '1')
                    echo '<script>window.location="users/librarian/view_profile.php"</script>';

                elseif ($y == '2')
                    echo '<script>window.location="users/student/view_profile.php"</script>';

                elseif ($y == '3')
                    echo '<script>window.location="users/guest/view_profile.php"</script>';
                elseif ($y == '5')
                echo '<script>window.location="users/librarian/AAdisabled_page.php"</script>';
                else
                    echo '<script>window.location="users/faculty/view_profile.php"</script>';
            } else {
                echo "<script type='text/javascript'>alert('Failed to Login! Incorrect School ID No. or Password')</script>";
            }
        }

        ?>



        </div>
        <!--right side end xontext box-->





    </section>

    <!-- footer -->
    <?php include 'templates/footer.php' ?>

    <!-- js links-->
    <?php include 'templates/js-links.php' ?>

</body>

</html>