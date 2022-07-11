<?php require('conn.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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
                        <h1>Reset Password</h1>
                    </font>
                    <form action="#" method="POST">
                        <div class="form-group">
                            <label for="text" for="email">Enter New Password</label>
                            <input type="password" class="form-control" placeholder="Enter New Password" name="pword1" required="">
                        </div>
                        <div class="form-group">
                            <label class="label" for="password">Confirm Password</label>
                            <input type="password" class="form-control" placeholder="Confirm Password" name="pword2" required="">
                        </div>
                        <p class=""><a href="AAforgot_pass.php">Back to Forgot Password?</a> </p>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-dark submit button two" name="submit"><span>Reset</span> </button>
                        </div>
                    </form>
                    <hr>
                </div> <!-- login wrap end -->
            </div>
            <!--form box end-->

        </div>
        <!--right side end xontext box-->

        <?php
    if(isset($_POST["submit"])&& $_SESSION['user']){

		
        $psw = $_POST["pword1"];
		$psw2 = $_POST["pword2"];
        $email = $_SESSION['user'];

		if($psw == $psw2){

			$sql = mysqli_query($conn, "SELECT * FROM u_details WHERE email='$email'");
			$query = mysqli_num_rows($sql);
			  $fetch = mysqli_fetch_assoc($sql);
	
			if($email){
				$hash = md5($psw);
				$new_pass = $hash;
				mysqli_query($conn, "UPDATE u_details SET pword='$new_pass' WHERE email='$email'");
				?>
				<script>
					alert("<?php echo "Your password reset is succesful"?>");
					window.location.replace("login.php");
					
				</script>
				<?php
			}else{
				?>
				<script>
					alert("<?php echo "Please try again"?>");
				</script>
				<?php
			}
		}
		else{
			?>
				<script>
					alert("<?php echo "Passwords did not match!"?>");
				</script>
				<?php
		}

    }

?>




    </section>

    <!-- footer -->
    <?php include 'templates/footer.php' ?>

    <!-- js links-->
    <?php include 'templates/js-links.php' ?>

</body>

</html>



