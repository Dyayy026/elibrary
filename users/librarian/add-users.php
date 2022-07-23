<?php
require('conn.php');
?>

<?php 
if ($_SESSION['sch_id']) {
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Add Students</title>
        <!-- all in one links -->
        <?php include '../../templates/links.php' ?>

        <link rel="stylesheet" href="../../css/sidebar-style.css">
        <link rel="stylesheet" href="../../css/borrowed.css">
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
                <span class="text">Add Students</span>
            </div>
            <!--end of home content-->


            <!-- start -->
            <div class="container cont-editprofile">

                <form action="add-users.php" method="POST" enctype="multipart/form-data">

                    <div class="container ">

                        <div class="input-group">
                            <!--  -->
                        </div>

                        <div class="input-group">
                            <label>First Name</label>
                            <input class="form-control" type="text" name="fname" value=""required>
                        </div>

                        <div class="input-group">
                            <label>Middle Initial</label>
                            <input class="form-control" type="text" name="mname" value=""required>
                        </div>

                        <div class="input-group">
                            <label>Last Name</label>
                            <input class="form-control" type="text" name="lname" value=""required>
                        </div>

                        <div class="input-group">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" value=""required>
                        </div>

                        <div class="input-group">
                            <label>School No.</label>
                            <input class="form-control" type="text" name="sch_id1" value=""required>
                        </div>

                        <div class="input-group">
                            <label>Date Added</label>
                            <input class="form-control" type="date" name="date_added" value=""required>
                        </div>

                        <div class="input-group">
                            <label>Default Picture</label>
                            <input type="file" name="photo" value="" class=" form-control"  aria-label="Upload">
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
                            <button class="btn btn-dark" type="submit" name="submit" style="background-color: #238C8F; border:none;">Add User</button>
                        </div>
                    </div>

                     <!--add user code here-->
                        <?php
                            if(isset($_POST['submit']))
                            {
                                $ut_id='2';
                                $fname=$_POST['fname'];
                                $mname=$_POST['mname'];
                                $lname=$_POST['lname'];
                                $sch_id1=$_POST['sch_id1'];
                                $school='LSPU-SCC';
                                $email=$_POST['email'];
                                $date_added=$_POST['date_added'];
                                $pword=$sch_id1;
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

                                if (in_array($fileActualExt, $allowed)){
                                    if( $fileError === 0){
                                        if( $fileSize < 100000000000){
                                            $fileNameNew = uniqid('',true).".".$fileActualExt;
                                            $fileDestination = '../student/uploads/'.$fileNameNew;
                                            move_uploaded_file($fileTmpName, $fileDestination);
                                        }
                                        else{
                                            echo "File is too big";
                                        }
                                    }
                                    else{
                                        echo "Error uploading the file";
                                    }
                                }
                                else{
                                    echo "File type not accepted";
                                }
                                

                                
                            
                                $sql="INSERT INTO u_details(ut_id,f_name,m_in,l_name,sch_id,school,email,pword,date_added,photo) VALUES ('$ut_id','$fname','$mname','$lname','$sch_id1','$school','$email', '$pencrypt','$date_added','$fileNameNew')";
                            
                                if ($conn->query($sql) === TRUE) {
                                echo "<script type='text/javascript'>alert('Student Added. ID is the default password')</script>";
                                } else {
                                    echo "Error: " . $sql . "<br>" . $conn->error;
                                echo "<script type='text/javascript'>alert('User Exists')</script>";
                                }
                                }
                        
                        ?>




                </form>



            </div>




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





