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
        <title>Visitor's Information</title>
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
                <span class="text">Visitor's Information</span>
            </div>
            <!--end of home content-->


            <?php
            $sname = "localhost";
            $uname = "root";
            $pword = "";
            $db = "library";
            $conn = mysqli_connect($sname,$uname,$pword,$db);

             $id = $_GET['approveid']; //kinukuha ang ID na nakaset pa url. Yun ang id ng data na kinlick ni user.
             $sql = "SELECT * FROM tb_sched WHERE id = $id"; //line 47-55 display data sa textbox
             $result = mysqli_query($conn, $sql);
             $row = mysqli_fetch_assoc($result);

             $id = $row['id'];
             $v_name = $row['v_name'];
             $schl_id = $row['schl_id'];
             $schl_name = $row['schl_name'];
             $sch_date = $row['sch_date'];
             $form = $row['form'];
             $date_rqsted = $row['date_rqsted'];
             $status = $row['status'];


            if(isset($_POST['approve'])){
             $id = $_POST['id'];
             $status = "Approved";


                $sql="UPDATE tb_sched SET id = $id, status = '$status' WHERE id = $id";

                $result = mysqli_query($conn, $sql);
                if($result){
                    echo "<script type='text/javascript'>alert('Request Approved. You can check approved request.')</script>";
                    echo '<script>window.location="AAreq_approval.php"</script>';
                }else{
                  die("Connection Error " . mysqli_connect_error());
                }
            }

            if(isset($_POST['denied'])){
                $id = $_POST['id'];
                $status = "Denied";
   
                   $sql="UPDATE tb_sched SET id = $id, status = '$status' WHERE id = $id";
   
                   $result = mysqli_query($conn, $sql);
                   if($result){
                    echo "<script type='text/javascript'>alert('Request has been denied. You can check denied requests.')</script>";
                    echo '<script>window.location="AAreq_approval.php"</script>';
                   }else{
                     die("Connection Error " . mysqli_connect_error());
                   }
            }
            ?>
            <!-- start -->
            <div class="container cont-editprofile">

                <form action="#" method="POST" enctype="multipart/form-data">

                    <div class="container ">

                        <div class="input-group">
                            <!--  -->
                        </div>
                       
                        <div class="input-group">
                            <label>Visitor's Student's ID:</label>
                            <input class="form-control" type="text" name="id" value="<?php echo $id;?>" >
                        </div>

                        <div class="input-group">
                            <label>Visitor's Name:</label>
                            <input class="form-control" type="text" name="vname" value="<?php echo $v_name;?>" >
                        </div>

                        <div class="input-group">
                            <label>Student's ID:</label>
                            <input class="form-control" type="text" name="schl_id" value="<?php echo $schl_id;?>">
                        </div>

                        <div class="input-group">
                            <label>School Name:</label>
                            <input class="form-control" type="text" name="school" value="<?php echo $schl_name;?>">
                        </div>

                        <div class="input-group">
                            <label>Schedule Date:</label>
                            <input class="form-control" type="date" name="date" value="<?php echo $sch_date;?>">
                        </div>

                        <div class="input-group">
                            <label>Date Requested:</label>
                            <input class="form-control" type="date" name="rq_date" value="<?php echo $date_rqsted;?>">
                        </div>

                        <div class="input-group">
                            <label>Form:</label>
                            <input class="form-control" type="text" name="form" value=" <?php echo   $form;?>">
                        </div>

                        <div class="input-group">
                            <label>Status:</label>
                            <select name="status" id="cars">
                            <option value="approved">Approved</option>
                            <option value="pending">Pending</option>
                            <option value="denied">Denied</option>
                            </select>
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
                        <button class="btn btn-dark" name="approve" class = "text-light" style="text-decoration:none;">Approve</a></button>
                        </div>
                        <div class="input-group">
                        <button class="btn btn-danger" name="denied" class = "text-light" style="text-decoration:none;">Deny</a></button>
                        </div>
                        <div class="input-group">
                        <button class="btn btn-dark" id="btn"><a href="AAreq_approval.php" class = "text-light" style="text-decoration:none;">Back</a></button>
                        </div>
                    </div>

                   
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





