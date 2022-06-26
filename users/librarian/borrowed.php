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
        <title>Borrowed</title>
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
                <span class="text">Borrow Requests </span>
            </div>
            <!--end of home content-->


            <!-- start -->
            <div class="container" id="brw-table">
                <table id="example" class="table table-hover " >
                    <thead>
                        <tr>
                            <th>School ID No.</th>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>Copies Available</th>
                            <th colspan="2" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql="SELECT * FROM borrowed, books WHERE bw_date IS NULL AND borrowed.b_id=books.b_id ORDER BY time";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $b_id=$row['b_id'];
                                $sch_id=$row['sch_id'];
                                $title=$row['title'];
                                $avail=$row['copies_avlbl'];
                                
                                    
                        ?>
                    

                        <tr>
                            <td><?php echo $sch_id ?></td>
                            <td><?php echo $b_id ?></td>
                            <td class="capitalize"><?php echo $title ?></td>
                            <td><?php echo $avail ?></td>
                            <td align="center">
                                <?php
                                    if($avail > 0)
                                    {echo "<a href=\"accept.php?id1=".$b_id."&id2=".$sch_id."&id3=".$title."\" class=\"btn btn-dark\">Accept</a>";}
                                    else{ echo "<script type='text/javascript'>alert('No Copies Available!!!')</script>";}
                                ?></td>
                            <td align="center"><a href="reject.php?id1=<?php echo $b_id ?>&id2=<?php echo $sch_id ?>&id3=<?php echo $title ?>" class="btn btn-danger">Reject</a></td>
                            
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