<?php
ob_start();
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
        <title>Welcome</title>
        <!-- all in one links -->
        <?php include '../../templates/links.php' ?>

        <link rel="stylesheet" href="../../css/sidebar-style.css">
        <link rel="stylesheet" href="../../css/profileview-style.css">
        <script src="../../templates/js-links.php"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>


    <body>

        <!-- sidebar -->
        <?php include('sidebar-faculty.php') ?>

        <!-- Contents-->
        <section class="home-section">
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text">Welcome</span>
            </div>
            <!--end of home content-->


            <!-- start of profile container-->
            <?php
            $sch_id = $_SESSION['sch_id'];
            $sql = "SELECT * FROM u_details WHERE sch_id='$sch_id'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();

            $name = $row['f_name'] . " " . $row['m_in'] . " " . $row['l_name'];
            $email = $row['email'];
            $school = $row['school'];
            $pword = $row['pword'];
            //removing space
            $str = "uploads/" . $row['photo'];
            $new_str = str_replace(' ', '', $str);
            $path2 = "https://img.icons8.com/bubbles/100/000000/user.png";
            ?>
            <div class="page-content page-container" id="page-content">
                <div class="padding">
                    <div class="row container d-flex justify-content-center">
                        <div class="col-xl-11 col-md-10">
                            <div class="card user-card-full">
                                <div class="row m-l-0 m-r-0">
                                    <div class="col-md-4 bg-c-lite-green user-profile1">
                                        <div class="card-block text-center text-white">
                                            <div class="m-b-25 "> <img src="<?php echo file_exists($new_str) ? $new_str : $path2  ?>" class="img-radius img-fluid" alt="User-Profile-Image" > </div>
                                            <h6 class="f-w-600 capitalize"><?php echo $name; ?></h6>
                                            <p>Faculty</p> <i class=" mdi mdi-square-edit-outline feather icon-edit m-t-10 f-16"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-block">
                                            <h6 class="m-b-20 p-b-5 b-b-default f-w-600">Information</h6>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">Email</p>
                                                    <h6 class="text-muted f-w-400"><?php echo $email; ?></h6>
                                                </div>
                                                <div class="col-sm-6">
                                                    <p class="m-b-10 f-w-600">School</p>
                                                    <h6 class="text-muted f-w-400 capitalize"><?php echo $school; ?></h6>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <!-- <div id="password-view">
                                                    <input type="password" value="<?php echo $pword; ?>" id="myInput">
                                                    <i class="bi bi-eye-fill" id="show" onclick="toggleHide()"></i>
                                                    <i class="bi bi-eye-slash-fill" id="hide" onclick="toggleHide()"></i>
                                                </div> -->
                                            </div>
                                            <!-- Pre na eto un edit profile button -->
                                            <!-- salamat pre <# -->
                                            <div class="row" id="cont-btn">
                                                <div class="col-sm-3">
                                                    <a href="edit_profile.php"><button class="btn btn-dark " style="background-color: #238C8F; border: 1px transparent solid;">Edit Profile</button></a>
                                                </div>

                                            </div>

                                            <ul class="social-link list-unstyled m-t-40 m-b-10">
                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="facebook" data-abc="true"><i class="mdi mdi-facebook feather icon-facebook facebook" aria-hidden="true"></i></a></li>
                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="twitter" data-abc="true"><i class="mdi mdi-twitter feather icon-twitter twitter" aria-hidden="true"></i></a></li>
                                                <li><a href="#!" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="instagram" data-abc="true"><i class="mdi mdi-instagram feather icon-instagram instagram" aria-hidden="true"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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

        <!-- toggle hide password -->
        <script>
            function toggleHide() {
                var x = document.getElementById("myInput");
                if (x.type === "password") {
                    x.type = "text";
                    document.getElementById('hide').style.display = 'inline-block';
                    document.getElementById('show').style.display = 'none';
                } else {
                    x.type = "password";
                    document.getElementById('hide').style.display = 'none';
                    document.getElementById('show').style.display = 'inline-block';
                }
            }
        </script>

        <!-- image alternative profile -->
        <script type='text/javascript'>
            document.getElementById('myImage').src = "newImage.png";

            document.getElementById('myImage').onload = function() {
                alert("done");
            }

            document.getElementById('myImage').onerror = function() {
                alert("Inserting alternate");
                document.getElementById('myImage').src = "alternate.png";
            }
        </script>

        <script src="../../templates/js-links.php"></script>


    </body>

    </html>



<?php } else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>