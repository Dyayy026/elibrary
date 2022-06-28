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
        <title>Book a Visit</title>
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
        <?php include('sidebar-guest.php') ?>

        <!-- Contents-->
        <section class="home-section">
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text">Book a Visit</span>
            </div>
            <!--end of home content-->


            <!-- start -->
            <div class="container cont-editprofile">

                <form action="#" method="POST" enctype="multipart/form-data">

                    <div class="container ">

                        <div class="input-group">
                            <!--  -->
                        </div>
                       

                        <div class="input-group">
                            <label>Visitor's Name:</label>
                            <input class="form-control" type="text" name="vname" value="" placeholder="Enter visitor's name" required>
                        </div>

                        <div class="input-group">
                            <label>Visitor's Student's ID:</label>
                            <p><?php echo $_SESSION['sch_id']?></p>
                        </div>

                        <div class="input-group">
                            <label>School:</label>
                            <input class="form-control" type="text" name="school" value=""  placeholder="Enter School" required>
                        </div>

                        

                        <div class="input-group">
                            <label>Date of Visit</label>
                            <input class="form-control" type="date" name="date" value="" required>
                        </div>

                      


                       <input type="hidden" name="uid">

                        <div class="input-group">
                             <button class="btn btn-dark" id="btn" name="submit" style="background-color: #238C8F; border: 1px transparent solid;">Submit Request</button>
                        </div>
                    </div>

                    <?php

                        $sname = "localhost";
                        $uname = "root";
                        $pword = "";
                        $db = "library";

                        $conn = mysqli_connect($sname,$uname,$pword,$db);

                        if(isset($_POST['submit'])){
                            $vname = $_POST['vname'];
                            $school = $_POST['school'];
                            $date = $_POST['date'];
                            $date_rquested = date('Y-m-d');
                            $status = 'Pending';
                            $sch_id = $_SESSION['sch_id'];
                            
                            
                            // $file = $_POST['photo'];

                        
                                $sql = "INSERT INTO tb_sched(v_name,schl_id,schl_name,sch_date,date_rqsted,status)
                                VALUES('$vname','$sch_id','$school','$date','$date_rquested','$status')";
                                $result = mysqli_query($conn, $sql);

                                if($result){
                                echo "<script type='text/javascript'>alert('Schedule Created! You can check it on Request Approval')</script>";
                                }else{
                                echo "<script type='text/javascript'>alert('Schedule not created!')</script>";
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





