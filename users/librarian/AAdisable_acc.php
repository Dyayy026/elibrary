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
        <title>Disable Account</title>
        <!-- all in one links -->
        <?php include '../../templates/links.php' ?>

        <link rel="stylesheet" href="../../css/sidebar-style.css">
        <link rel="stylesheet" href="../../css/editprofile.css">
        <script src="../../templates/js-links.php"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>


    <body>
        <!-- sidebar -->
        <?php include('sidebar-librarian.php') ?>

        <!-- Contents-->
        <section class="home-section">
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text">Disable Account</span>
            </div>
            <!--end of home content-->
            <h4 style="color: red; margin-left: 70px;">You are about to disable account of this user. <br>
                This action can not be revert.</h4>


            <!-- start of profile edit-->
            <div class="container cont-editprofile">
                <?php

                $sid=$_GET['id1'];
                 
                 $sql = "SELECT * FROM u_details INNER JOIN u_type
                 ON u_details.ut_id = u_type.ut_id WHERE date_added is NOT NULL AND sch_id = '$sid' AND acc_disable is NULL";
                   $result = $conn->query($sql);
                   $rowcount = mysqli_num_rows($result);

                while ($row = $result->fetch_assoc()) {
                    $sch_id = $row['sch_id'];
                    $name = $row['f_name']." ".$row['m_in']." ".$row['l_name'];
                    $usertype = $row['type'];
                    $email = $row['email'];
                    $date_added = $row['date_added'];
                }

                ?>  

                <form  action="#" method="POST"> 
        
                    <div class="container ">

                        <div class="input-group">
                            <!--  -->
                        </div>

                        <div class="input-group">
                            <label>Shool ID</label>
                            <input class="form-control" type="text" name="fname" value="<?php echo $sch_id ?>">
                        </div>

                        <div class="input-group">
                            <label>Name</label>
                            <input class="form-control" type="text" name="mname" value="<?php echo $name ?>">
                        </div>

                        <div class="input-group">
                            <label>User Type</label>
                            <input class="form-control" type="text" name="lname" value="<?php echo $usertype ?>">
                        </div>

                        <div class="input-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" value="<?php echo $email ?>">
                        </div>

                        <div class="input-group">
                            <label>Date Added</label>
                            <input class="form-control" type="text" name="school" value="<?php echo $date_added ?>">
                        </div>

                       

                        <!-- Pre Just in case magbago isip mo na gusto mo na napapaltan un profile pre -->
                        <!-- Ayoko nga-->
                        <!-- Photo Update -->
                        <!-- <div class="input-group">
                            <label for="text">Upload Photo</label>
                            <br>
                            <input id="input-style" class="form-control" type="file" id="formFile" name="photo">
                        </div> -->

                        <div class="input-group">
                        <td><a href="delete_user.php?id1=<?php echo $sch_id ?>" class="btn btn-danger">Disable Account</a></a>
                        </div>
                    </div>

                </form>



            </div>

            <?php
                if(isset($_POST['update']))
                {
                    $sch_id = $_GET['id'];
                    $fname=$_POST['fname'];
                    $mname=$_POST['mname'];
                    $lname=$_POST['lname'];
                    $email=$_POST['email'];
                    $school=$_POST['school'];
                    $pword=$_POST['pword'];
                    $pencrypt = md5($pword);

                    $sql1="UPDATE u_details SET f_name='$fname', m_in='$mname', l_name='$lname', email='$email', school='$school', pword='$pencrypt' WHERE sch_id='$sch_id'";
                    

                    if($conn->query($sql1) === TRUE){
                        echo "<script type='text/javascript'>alert('Success')</script>";
                        header( "Refresh:0.01; url=view_profile.php", true, 303);
                    }
                    else
                    {
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




    </body>

    </html>



<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>

