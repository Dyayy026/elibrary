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
        <title>User Request</title>
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
                <span class="text">User Requests </span>
            </div>
            <!--end of home content-->


            <!-- start -->
            <div class="container" id="brw-table">
                <table id="example" class="table table-hover " >
                    <thead>
                        <tr>
                            <th>School ID No.</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>School</th>
                            <th>User Picture</th>
                            <th colspan="2" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql="SELECT * FROM u_details WHERE date_added IS NULL";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $sch_id=$row['sch_id'];
                                $name=$row['f_name']." ".$row['m_in']." ".$row['l_name'];
                                $email=$row['email'];
                                $school=$row['school'];   
                                //removing space
                                //pre paayos ulit ng path mag mumula to sa folder ng students ay thanks
                                $str = "../guest/uploads/" . $row['photo'];
                                $new_str = str_replace(' ', '', $str);  
                                    
                        ?>
                    

                        <tr>
                            <td><?php echo $sch_id ?></td>
                            <td><?php echo $name ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $school ?></td>
                            <td><img src="<?php echo $new_str?>" alt="User Picture" style="width:100px; height:100px; border-radius: 10px;"></td>
                            <td align="center">
                                <?php
                                    echo "<a href=\"accept_user.php?id1=".$sch_id."\" class=\"btn btn-dark\">Accept</a>";
                                ?></td>
                            <td align="center"><a href="reject_user.php?id1=<?php echo $sch_id ?>" class="btn btn-danger">Reject</a></td>
                            
                        </tr>
                        <?php } ?>
                        
                    </tbody>
                    <!-- just in case gusto mo parin ng may footer pre -->
                    <!-- Ayoko pre -->
                    <!-- <tfoot>
                        <tr>
                            <th>Ref ID</th>
                            <td>Copies</td>
                            <th>Returnee</th>
                            <th>Issuer</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Fine</th>
                        </tr>
                    </tfoot> -->
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