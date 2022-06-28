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
        <?php include('sidebar-faculty.php') ?>

        <!-- Contents-->
        <section class="home-section">
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text">Currently Borrowed Books</span>
            </div>
            <!-- End of home content -->


            <!-- start -->
            <div class="container" id="brw-table">

                <div class="span9">
                    <form action="current.php" method="post">
                        <div class="control-group">
                            <!--<label class="control-label" for="Search"><b>Search:</b></label>-->
                            <div class="controls">
                                <input type="text" id="title" name="search" placeholder="Enter School ID No of Student/Book title/book ID." class="span8 form-control" required>
                                <button type="submit" name="submit" class="btn" style="background-color: #238C8F; border: 1px transparent solid;"><i class='bx bx-search'></i></button>
                            </div>
                        </div>
                    </form>
                    <br>
                    <?php
                    $sch_id = $_SESSION['sch_id'];
                    if (isset($_POST['submit'])) {
                        $s = $_POST['search'];
                        $sql = "SELECT * FROM borrowed,books WHERE sch_id = '$sch_id' and bw_date is NOT NULL and rtn_date is NULL and books.b_id = borrowed.b_id and (borrowed.b_id='$s' or title like '%$s%')";
                    } else
                        $sql = "SELECT * FROM borrowed,books WHERE sch_id = '$sch_id' and bw_date is NOT NULL and rtn_date is NULL and books.b_id = borrowed.b_id";
                    $result = $conn->query($sql);
                    $rowcount = mysqli_num_rows($result);

                    if (!($rowcount))
                        echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                    else {


                    ?>
                        <table id="example" class="table table-hover ">
                            <thead>
                                <tr>
                                    <th>Book ID</th>
                                    <th>Book Title</th>
                                    <th>Issue Date</th>
                                    <th>Due date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                <?php



                                //$result=$conn->query($sql);
                                while ($row = $result->fetch_assoc()) {
                                    $b_id = $row['b_id'];
                                    $name = $row['title'];
                                    $issuedate = $row['bw_date'];
                                    $duedate = $row['bw_due'];

                                ?>

                                    <tr>
                                        <td><?php echo $b_id ?></td>
                                        <td class="capitalize"><?php echo $name ?></td>
                                        <td><?php echo $issuedate ?></td>
                                        <td><?php echo $duedate ?></td>
                                        <td><a href="return_request.php?id=<?php echo $b_id; ?>" class="btn btn-dark">Return</a></td>
                                    </tr>
                            <?php }
                            } ?>
                            </tbody>
                        </table>
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