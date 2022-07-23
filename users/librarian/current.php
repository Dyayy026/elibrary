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
        <title>Currently Borrowed Books</title>
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
                <span class="text">Currently Borrowed Books</span>
            </div>
            <!--end of home content-->
            <!-- start -->
            <div class="container" id="brw-table">

                <div class="span9">
                    <form action="current.php" method="post">
                        <div class="control-group">
                            <label class="control-label" for="Search"><b>Search:</b></label>
                            <div class="controls">
                                <input type="text" id="title" name="search" placeholder="Enter Roll No of Student/books Name/books Id." class="span8 form-control" required>
                                <button type="submit" name="submit" class="btn" style="background-color: #238C8F; border:none;"><i class='bx bx-search' ></i></button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <?php 
                        $limit = 5;  
                        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
                        $start_from = ($page-1) * $limit; 
                    ?>
                    <?php
                    if (isset($_POST['submit'])) {
                        $s = $_POST['search'];
                        $sql = "SELECT borrowed.b_id,sch_id,title,bw_due,bw_date,datediff(curdate(),bw_due) as x from borrowed,books where (bw_date is NOT NULL and rtn_date is NULL and books.b_id = borrowed.b_id) and (sch_id='$s' or borrowed.b_id='$s' or title like '%$s%')";
                    } else
                        $sql = "SELECT borrowed.b_id,sch_id,title,bw_due,bw_date,datediff(curdate(),bw_due) as x from borrowed,books where bw_date is NOT NULL and rtn_date is NULL and books.b_id = borrowed.b_id";
                    $result = $conn->query($sql);
                    $rowcount = mysqli_num_rows($result);

                    if (!($rowcount))
                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                    else {


                    ?>
                        <table id="example" class="table table-hover ">
                            <thead>
                                <tr>
                                    <th>School ID No</th>
                                    <th>Book ID</th>
                                    <th>Title</th>
                                    <th>Borrow Date</th>
                                    <th>Due date</th>
                                    <th>Dues</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php



                                //$result=$conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $sch_id = $row['sch_id'];
                                    $b_id = $row['b_id'];
                                    $name = $row['title'];
                                    $issuedate = $row['bw_date'];
                                    $duedate = $row['bw_due'];
                                    $dues = $row['x'];

                                ?>

                                    <tr>
                                        <td><?php echo strtoupper($sch_id) ?></td>
                                        <td><?php echo $b_id ?></td>
                                        <td class="capitalize"><?php echo $name ?></td>
                                        <td><?php echo $issuedate ?></td>
                                        <td><?php echo $duedate ?></td>
                                        <td><?php if ($dues > 0)
                                                echo "<font color='red'>" . $dues . "</font>";
                                            else
                                                echo "<font color='white'>0</font>";
                                            ?>
                                    </tr>
                            <?php }
                            } ?>
                            </tbody>
                        </table>
                        <?php 
                            //dito lang nagana css
                            $sql = "SELECT COUNT(bw_id) FROM borrowed WHERE bw_date IS NOT NULL";  
                            $rs_result = mysqli_query($conn, $sql);  
                            $row = mysqli_fetch_row($rs_result);  
                            $total_records = $row[0];  
                            $total_pages = ceil($total_records / $limit);  
                            $pagLink = "<div class='pagination'>";

                            for($i=1; $i<=$total_pages; $i++){
                                $pagLink .= "<a style='text-decoration:none;
                                padding: 5px;
                                margin:1px;
                                border-radius: 5px;
                                border: 1px solid #238C8F;
                               
                                color: #238C8F;
                                margin-right: 0.50em;
                                

                                ' 
                                
                                
                                href='current.php?page=".$i."'>".$i."</a>";};

                                 echo $pagLink;'</div>';
                            
                            ?>
                </div>

                <!--/.span9-->
            </div>
            </div>
            <!--/.container-->
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