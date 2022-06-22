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
        <title>Denied Requests</title>
        <!-- all in one links -->
        <?php include '../../templates/links.php' ?>

        <link rel="stylesheet" href="../../css/sidebar-style.css">
        <link rel="stylesheet" href="../../css/table-style.css">
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
                <span class="text">Denied Requests</span>
            </div>
            <!--end of home content-->


            <!-- start -->
            <div class="container" id="brw-table">

                <table id="example" class="table table-hover " >
                    <thead>
                        <tr>
                        <th scope="col">Request ID</th>
                        <th scope="col">Visitor's Name</th>
                        <th scope="col">Student's ID</th>
                        <th scope="col">School Name</th>
                        <th scope="col">Schedule Date</th>
                        <th scope="col">Date Requested</th>
                        <th scope="col">Form</th>
                        <th scope="col">Status</th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php


                        $sname = "localhost";
                        $uname = "root";
                        $pword = "";
                        $db = "library";
                        $conn = mysqli_connect($sname,$uname,$pword,$db);




                        $sql = "SELECT * FROM `tb_sched` WHERE status = 'denied' ORDER BY id desc;;";
                        $result = mysqli_query($conn, $sql);
                        if($result){
                            while($row=mysqli_fetch_assoc($result)){
                        $id = $row['id'];
                        $vname = $row['v_name'];
                        $schl_id = $row['schl_id'];
                        $schl_name = $row['schl_name'];
                        $sch_date = $row['sch_date'];
                        $date_requested = $row['date_rqsted'];
                        $form = $row['form'];
                        $status = $row['status'];
                            

                            echo '<tr>
                            <td>'.$id.'</td>        
                            <td>'.$vname.'</td>
                            <td>'.$schl_id.'</td>
                            <td>'.$schl_name.'</td>
                            <td>'.$sch_date.'</td>
                            <td>'.$date_requested.'</td>
                            <td>'.$form.'</td>
                            <td>'.$status.'</td>
                            </tr>';
                            }
                        }
                        ?>
                    </tbody>
                   
                </table>

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