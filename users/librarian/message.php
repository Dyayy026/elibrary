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
        <title>Message</title>
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
                <span class="text">Message</span>
            </div>
            <!--end of home content-->

            <!-- start -->
            <div class="container cont-message">
                <div class="module">
                    <div class="module-head">
                        <h3>Send a message</h3>
                    </div>
                    <div class="module-body">

                        <br>

                        <form action="message.php" method="POST">
                            <div class="input-group">
                                <label><b>Receiver School ID No:</b></label>
                                <div class="input-group">
                                    <input type="text" id="sch_id" name="sch_id" placeholder="School ID No" class="form-control" required>
                                </div>
                            </div>


                            <div class="input-group">
                                <label><b>Message:</b></label>
                                <div class="input-group">
                                    <input type="text" id="Message" name="Message" placeholder="Enter Message" class="form-control" required>
                                </div>
                                <hr>


                                <div class="input-group">
                                    <div class="input-group">
                                        <button type="submit" name="submit" class="btn btn-dark " style="background-color: #238C8F;">Add Message</button>
                                    </div>
                                </div>
                        </form>

                    </div>
                </div>
            </div>









            <!--/.container-->
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

            <?php
            if (isset($_POST['submit'])) {
                $sch_id = $_POST['sch_id'];
                $message = $_POST['Message'];

                $sql1 = "INSERT INTO message (sch_id,msg,msg_date,time) VALUES ('$sch_id','$message',curdate(),curtime())";

                if ($conn->query($sql1) === TRUE) {
                    echo "<script type='text/javascript'> Swal.fire('Message Sent', 'Thank you' ,'success'); </script>";
                } else { //echo $conn->error;
                    echo "<script type='text/javascript'> Swal.fire('Error', '.', 'error'); </script>";
                }
            }
            ?>
    </body>

    </html>


<?php } else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>