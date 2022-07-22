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
        <title>Disabled Accounts</title>
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
                <span class="text">Disabled Accounts</span>
            </div>
            <!--end of home content-->
            <!-- start -->
            <div class="container" id="brw-table">

                <div class="span9">
                    <form action="AAdisabled_accounts.php" method="post">
                        <div class="control-group">
                            <!--<label class="control-label" for="Search"><b>Search:</b></label>-->
                            <div class="controls">
                                <input type="text" id="title" name="search" placeholder="Enter School ID No of Student" class="span8 form-control" required>
                                <button type="submit" name="submit" class="btn"><i class='bx bx-search'></i></button>
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
                        $sql = "SELECT * FROM u_details INNER JOIN u_type
                        ON u_details.ut_id = u_type.ut_id WHERE date_added is NOT NULL AND sch_id='$s'";
                    } else
                    $sql = "SELECT * FROM u_details INNER JOIN u_type
                    ON u_details.ut_id = u_type.ut_id WHERE date_added is NOT NULL AND acc_disable is NOT NULL ORDER BY l_name  ASC LIMIT $start_from, $limit ";
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
                                    <th>Name</th>
                                    <th>User Type</th>
                                    <th>E-Mail</th>
                                    <th>Date Added</th>
                                    <th>Date Disabled</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php



                                //$result=$conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $sch_id = $row['sch_id'];
                                    $name = $row['f_name']." ".$row['m_in']." ".$row['l_name'];
                                    $usertype = $row['type'];
                                    $email = $row['email'];
                                    $date_added = $row['date_added'];
                                    $date_disabled = $row['date_disabled'];
                                    
                        

                                ?>

                                    <tr>
                                        <td><?php echo $sch_id ?></td>
                                        <td class="capitalize"><?php echo $name ?></td>
                                        <td ><?php echo $usertype?></td>
                                        <td><?php echo $email ?></td>
                                        <td><?php echo $date_added?></td>
                                        <td><?php echo $date_disabled?></td>

                        
                                    </tr>
                            <?php }
                            } ?>
                            </tbody>
                        </table>

                        <?php 
                            //dito lang nagana css
                            $sql = "SELECT COUNT(u_id) FROM u_details";  
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
                                
                                
                                href='AAdisabled_accounts.php?page=".$i."'>".$i."</a>";};

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