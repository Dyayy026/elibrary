<?php
ob_start();
require('conn.php');
?>

<?php
if ($_SESSION['sch_id']) { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Edit Profile</title>
        <!-- all in one links -->
        <?php include '../../templates/links.php' ?>

        <link rel="stylesheet" href="../../css/sidebar-style.css">
        <link rel="stylesheet" href="../../css/editprofile.css">
        <script src="../../templates/js-links.php"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" />

        <style>
            .input-box {
                position: relative;
            }

            .input-box input {
                position: relative;


                transition: all 0.3s ease;
            }

            .input-box input:focus,
            .input-box input:valid {
                border-color: #4070F4;
            }

            .input-box i {
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                color: #a6a6a6;
                transition: all 0.3s ease;
            }



            .input-box i {
                right: 15px;
                cursor: pointer;
                padding: 8px;
            }

            .alert {
                display: flex;
                align-items: center;
                margin-top: -13px;
            }

            .alert .error {
                color: #D93025;
                font-size: 18px;
                display: none;
                margin-right: 8px;
            }

            .text {
                font-size: 18px;
                font-weight: 400;
                color: #a6a6a6;
            }

            .input-box.button input {
                border: none;
                font-size: 20px;
                color: #fff;
                letter-spacing: 1px;
                background: #4070F4;
                cursor: not-allowed;
            }

            .input-box.button input.active:hover {
                background: #265df2;
                cursor: pointer;
            }
        </style>

    </head>


    <body>
        <!-- sidebar -->
        <?php include('sidebar-faculty.php') ?>

        <!-- Contents-->
        <section class="home-section">
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text">Edit Profile</span>
            </div>
            <!--end of home content-->


            <!-- start of profile edit-->
            <div class="container cont-editprofile">
                <?php
                $sch_id = $_SESSION['sch_id'];
                $sql = "SELECT * FROM u_details WHERE sch_id='$sch_id'";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();

                $name = $row['f_name'] . " " . $row['m_in'] . " " . $row['l_name'];
                $email = $row['email'];
                $school = $row['school'];
                $pword = $row['pword'];
                $pencrypt = md5($pword);

                ?>

                <form action="edit_profile.php?id=<?php echo $sch_id ?>" method="POST">

                    <div class="container ">

                        <div class="input-group">
                            <!--  -->
                        </div>

                        <div class="input-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="fname" value="<?php echo $row['f_name'] ?>">
                        </div>

                        <div class="input-group">
                            <label>Middle Initial</label>
                            <input class="form-control" type="text" name="mname" value="<?php echo $row['m_in'] ?>">
                        </div>

                        <div class="input-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" name="lname" value="<?php echo $row['l_name'] ?>">
                        </div>

                        <div class="input-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" value="<?php echo $email ?>">
                        </div>

                        <div class="input-group">
                            <label>School</label>
                            <input class="form-control" type="text" name="school" value="<?php echo $school ?>">
                        </div>

                        <div class="input-group input-box">
                            <label>Password</label>
                            <input class="form-control" type="password" name="pword" id="pword" required>
                        </div>
                        <div class="input-group input-box">
                            <label>Confirm Password</label>
                            <input class="form-control" type="password" name="confirm_pw" id="confirm_pw" required>
                            <i class="fas fa-eye-slash show"></i>
                        </div>

                        <div class="alert">
                            <i class="fas fa-exclamation-circle error"></i>
                            <span class="textconf"></span>
                        </div>

                        <div class="input-group">
                            <button id="button" class="btn btn-dark" type="submit" name="update" style="background-color: #238C8F;">Update</button>
                        </div>
                    </div>

                </form>



            </div>

            <?php
            if (isset($_POST['update'])) {
                $sch_id = $_GET['id'];
                $fname = $_POST['fname'];
                $mname = $_POST['mname'];
                $lname = $_POST['lname'];
                $email = $_POST['email'];
                $school = $_POST['school'];
                $pword = $_POST['pword'];
                $pencrypt = md5($pword);

                $sql1 = "UPDATE u_details SET f_name='$fname', m_in='$mname', l_name='$lname', email='$email', school='$school', pword='$pencrypt' WHERE sch_id='$sch_id'";


                if ($conn->query($sql1) === TRUE) {
                    echo "<script src='../../js/alertupdateprof.js'></script>";
                    header("Refresh:1.00; url=view_profile.php", true, 303);
                } else {
                    //echo $conn->error;
                    echo "<script type='text/javascript'>alert('Error')</script>";
                }
            }
            ?>






        </section>


        <!-- side nav showing and sub menus -->
        <script>
            let arrow = document.querySelectorAll(".arrow");
            for (var i = 0; i < arrow.length; i++) {
                arrow[i].addEventListener("click", (e) => {
                    let arrowParent = e.target.parentElement.parentElement; //selecting main parent of arrow
                    arrowParent.classList.toggle("showMenu");
                });
            }
            let sidebar = document.querySelector(".sidebar");
            let sidebarBtn = document.querySelector(".bx-menu");
            console.log(sidebarBtn);
            sidebarBtn.addEventListener("click", () => {
                sidebar.classList.toggle("close");
            });
        </script>
        <script src="../../templates/js-links.php"></script>


                <!-- PASSWORD CONFIRM -->
                <script>
            const createPw = document.querySelector("#pword"),
                confirmPw = document.querySelector("#confirm_pw"),
                pwShow = document.querySelector(".show"),
                alertIcon = document.querySelector(".error"),
                alertText = document.querySelector(".textconf"),
                submitBtn = document.querySelector("#button");

            pwShow.addEventListener("click", () => {
                if ((createPw.type === "password") && (confirmPw.type === "password")) {
                    createPw.type = "text";
                    confirmPw.type = "text";
                    pwShow.classList.replace("fa-eye-slash", "fa-eye");
                } else {
                    createPw.type = "password";
                    confirmPw.type = "password";
                    pwShow.classList.replace("fa-eye", "fa-eye-slash");
                }
            });


            submitBtn.addEventListener("click", () => {
                if (createPw.value === confirmPw.value) {
                    alertText.innerText = "Password matched";
                    alertIcon.style.display = "none";
                    alertText.style.color = "#4070F4";

                } else {
                    alertText.innerText = "Password didn't matched";
                    alertIcon.style.display = "block";
                    alertText.style.color = "#D93025";
                    confirmPw.value = "";
                }
            });
        </script>




    </body>

    </html>



<?php } else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>