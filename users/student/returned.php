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
        <?php include('sidebar-student.php') ?>

        <!-- Contents-->
        <section class="home-section">
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text">Returned</span>
            </div>
            <!--end of home content-->


            <!-- start -->
            <div class="container" id="brw-table">
                            <form class="form-horizontal row-fluid" action="returned.php" method="POST">
                                <div class="control-group">
                                    <!--e<label class="control-label" for="Search"><b>Search:</b></label>-->
                                    <div class="controls">
                                        <input type="text" id="title" name="title" placeholder="Enter Book Name/Book Id." class="span8 form-control" required>
                                        <button type="submit" name="submit"class="btn"  style="background-color: #238C8F; border: 1px transparent solid;"><i class='bx bx-search'></i></button>
                                    </div>
                                </div>
                            </form>
                            <br>
                            <?php
                            $sch_id = $_SESSION['sch_id'];
                            if(ISset($_POST['submit']))
                                {$s=$_POST['title'];
                                    $sql="SELECT * FROM borrowed,books WHERE sch_id = '$sch_id' AND bw_date IS NOT NULL AND rtn_date IS NOT NULL AND books.b_id = borrowed.b_id AND (borrowed.b_id='$s' or title like '%$s%')";

                                }
                            else
                                $sql="SELECT * FROM borrowed,books WHERE sch_id = '$sch_id' AND bw_date IS NOT NULL AND rtn_date IS NOT NULL AND books.b_id = borrowed.b_id";

                            $result=$conn->query($sql);
                            $rowcount=mysqli_num_rows($result);

                            if(!($rowcount))
                                echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                            else
                            {

                            ?>
                    <table id="example" class="table table-hover " >
                        <thead>
                            <tr>
                                <th>Book ID</th>
                                <th>Title</th>
                                <th>Borrow Date</th>
                                <th>Return Date</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php


                            while($row=$result->fetch_assoc())
                            {
                                $b_id=$row['b_id'];
                                $name=$row['title'];
                                $ISsuedate=$row['bw_date'];
                                $returndate=$row['rtn_date'];                            
                        ?>

                                    <tr>
                                        <td><?php echo $b_id ?></td>
                                        <td><?php echo $name ?></td>
                                        <td><?php echo $ISsuedate ?></td>
                                        <td><?php echo $returndate ?></td>
                                    </tr>
                        <?php }} ?>
                        </tbody>
                        
                    <!-- just in case gusto mo parin ng may footer pre -->
                    <!-- <tfoot>
                        <tr>
                            <th>Ref ID</th>
                            <td>Copies</td>
                            <th>Returnee</th>
                            <th>ISsuer</th>
                            <th>ISsue Date</th>
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





