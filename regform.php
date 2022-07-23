<?php require('conn.php');?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <!-- links in one  -->
    <?php include 'templates/links.php' ?>
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/regform-style.css">
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

            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end px-4" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item p-2 my-auto">
                        <a class="nav-link" aria-current="page" href="index.php"> <span class="nav-link-fade-up">Home</span> </a>
                    </li>
                    <!-- <li class="nav-item p-2 my-auto">
                        <a class="nav-link" href="#announcements"> <span class="nav-link-fade-up"> Announcements</span></a>
                    </li>
                    <li class="nav-item p-2 my-auto">
                        <a class="nav-link" href="#books"> <span class="nav-link-fade-up">Books</span> </a>
                    </li> -->

                </ul>
            </div>
        </div>
    </nav>


    <!-- section start -->
    <section>
        <!-- left side start -->
        <div class="col-4 img-box">
            <img src="img/bookb2.jpg" alt="">
        </div>
        <!--left side end-->

        <!-- right side start content box -->
        <div class="col cont-box">

            <!-- form box -->
            <div class="form-box">
                <!-- login wrap start -->
                <div class="login-wrap">
                    <font face="rockwell">
                        <h1>Register</h1>
                        <h5>Please enter your complete information below:</h5>
                    </font>
                    <br>
                    <form action="regform.php" method="POST" enctype="multipart/form-data" id="form"> 
                        <div class="container">
                            <div class="row">
                                <div class="cont-divide col-lg-7">
                                    <div class="form-group">
                                        <label for="text">First Name:</label>
                                        <input id="input-style" type="text" class="form-control" name="fname" placeholder="Enter First Name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Middle Initial:</label>
                                        <input id="input-style" type="text" class="form-control" name="mname" placeholder="Enter Middle Initial" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Last Name:</label>
                                        <input id="input-style" type="text" class="form-control" name="lname" placeholder="Enter Last Name" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="text">School ID:</label>
                                        <input id="input-style" type="text" class="form-control" name="sch_id" placeholder="Enter School ID" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="text">School:</label>
                                        <input id="input-style" type="text" class="form-control" name="school" placeholder="Enter School" required="">
                                    </div>
                                    <div class="form-group">
                                        <label for="text">Email:</label>
                                        <input id="input-style" type="text" class="form-control" name="email" placeholder="Enter Email" required="" >
                                    </div>
                                    <span id="email-check"></span>
                                    <!-- <div class="form-group">
                                        <label for="text">Password</label>
                                        <input id="input-style" type="password" class="form-control" name="pword" placeholder="Enter Password" required="">
                                    </div> -->
                                </div>
                                <div class="col ">

                                    <div class="form-group up-photo">
                                        <label for="text">Upload Photo</label>
                                        <input id="input-style" class="form-control" type="file" id="formFile" name="photo" required="">

                                        <h6><i>This will be your profile picture</i></h6>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="form-control btn btn-dark submit button two" name="submit">Register</button>
                                    </div>
                                </div>


                            </div>
                        </div>



                        <!--reg form code here-->
                        <?php
                        if (isset($_POST['submit'])) {
                            $ut_id = '3';
                            $fname = $_POST['fname'];
                            $mname = $_POST['mname'];
                            $lname = $_POST['lname'];
                            $sch_id = $_POST['sch_id'];
                            $school = $_POST['school'];
                            $email = $_POST['email'];
                            $pword = $sch_id;
                            $pencrypt = md5($pword);

                            //insert photo
                            $fileName = $_FILES['photo']['name'];
                            $fileTmpName = $_FILES['photo']['tmp_name'];
                            $fileSize = $_FILES['photo']['size'];
                            $fileError = $_FILES['photo']['error'];
                            $fileType = $_FILES['photo']['type'];

                            $fileExt = explode('.', $fileName);
                            $fileActualExt = strtolower(end($fileExt));

                            $allowed = array('jpg', 'jpeg', 'png');

                            if (in_array($fileActualExt, $allowed)) {
                                if ($fileError === 0) {
                                    if ($fileSize < 100000000000) {
                                        $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                                        $fileDestination = 'users/guest/uploads/' . $fileNameNew;
                                        move_uploaded_file($fileTmpName, $fileDestination);
                                    } else {
                                        echo "File is too big";
                                    }
                                } else {
                                    echo "Error uploading the file";
                                }
                            } else {
                                echo "File type not accepted";
                            }


                            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                                $sql3 = "SELECT * FROM u_details WHERE email = '$email'";
                                $result= mysqli_query($conn, $sql3);
                                $num = mysqli_num_rows($result);

                              

                                if($num >= 1){
                                    echo "<script type='text/javascript'> Swal.fire('Registration failed! Email provided is not availabe', 'Try again' ,'error').then(function(){window.location = 'regform.php'}); </script>";
                                }else{
                                    $sql = "INSERT INTO u_details(ut_id,f_name,m_in,l_name,sch_id,school,email,pword,photo) VALUES ('$ut_id','$fname','$mname','$lname','$sch_id','$school','$email', '$pencrypt','$fileNameNew')";

                                    if ($conn->query($sql) === TRUE) {
                                       

                                        echo "<script type='text/javascript'> Swal.fire('Registration sent to admin. Your school id is your default password. Please change immediately', 'Thank you' ,'success').then(function(){window.location = 'processing.php'}); </script>";
                                        //echo '<script>window.location="processing.php"</script>';
                                        //echo "<script type='text/javascript'> Swal.fire({position: 'bottom-end', icon: 'info',  title: 'Your work has been saved'}) </script>";
                                    }else{

                                        echo "Error: " . $sql . "<br>" . $conn->error;
                                        echo "<script type='text/javascript'> Swal.fire('User Already Exist', 'Make sure you enter the right ID', 'error').then(function(){window.location = 'processing.php'}); </script>";
                                    }
                                }
                            }else {
                                echo "Invalid Email";
                            }
                        }
                        


                        ?>

                    </form>

                    <hr>


                </div> <!-- login wrap end -->
            </div>
            <!--form box end-->

        </div>
        <!--right side end xontext box-->


        <!--login code-->



    </section>

    <!-- footer -->
    <?php include 'templates/footer.php' ?>

    <!-- js links-->
    <?php include 'templates/js-links.php' ?>



</body>

</html>