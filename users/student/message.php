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
        <link rel="stylesheet" href="../../css/table-style.css">
        <script src="../../templates/js-links.php"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>

    <body>
        <!-- sidebar -->
        <?php include('sidebar-student.php') ?>

        <!-- Contents-->
        <section class="home-section">
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text">Message</span>
            </div>
            <!--end of home content-->
            <!-- start -->
            <div class="container" id="brw-table">

                    <table id="example" class="table table-hover ">
                        <thead>
                            <tr>
                                <th>Message</th>
                                <th>Date</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $sch_id=$_SESSION['sch_id'];
                            $sql="SELECT * FROM message WHERE sch_id='$sch_id' ORDER BY msg_date DESC,time DESC";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $msg=$row['msg'];
                                $date=$row['msg_date'];
                                $time=$row['time'];
                            
                           
                        ?>
                                <tr>
                                    <td><?php echo $msg ?></td>
                                    <td><?php echo $date ?></td>
                                    <td><?php echo $time ?></td>
                                </tr>
                        <?php } ?>
                        </tbody>
                    </table>
            </div>

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


<?php } else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>