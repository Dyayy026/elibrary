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
        <title>Return Request</title>
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
                <span class="text">Return Requests </span>
            </div>
            <!--end of home content-->


            <!-- start -->
                <div class="container" id="brw-table">
                      
                    <table id="example" class="table table-hover " >
                                  <thead>
                                    <tr>
                                      <th>School ID No.</th>
                                      <th>Book ID</th>
                                      <th>Book Title</th>
                                      <th>Fine</th>
                                      <th>Dues</th>
                                      <th>Action</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php
                            $sql="SELECT returns.b_id,returns.sch_id,title,fine,datediff(curdate(),bw_due) AS x FROM returns,books,borrowed WHERE returns.b_id=books.b_id AND returns.b_id=borrowed.b_id AND returns.sch_id=borrowed.sch_id";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $b_id=$row['b_id'];
                                $sch_id=$row['sch_id'];
                                $name=$row['title'];
                                $dues=$row['x']; ;
                                $fine=$row['fine'];
                                
                            
                           
                            ?>
                                    <tr>
                                      <td><?php echo ($sch_id) ?></td>
                                      <td><?php echo $b_id ?></td>
                                      <td class="capitalize"><b><?php echo $name ?></b></td>
                                      <td>
                                        <?php 
                                        if($dues < 1)
                                            echo $fine;
                                            else
                                            echo 'PHP 200'; ?>
                                      </td>
                                      <td><?php 
                                      if($dues > 0)
                                          echo $dues;
                                          else
                                          echo 0; ?></td>
                                      <td><center>
                                                                                
                                        <a href="acceptreturn.php?id1=<?php echo $b_id; ?>&id2=<?php echo $sch_id; ?>&id3=<?php echo $dues ?>" class="btn btn-dark">Accept</a>
                                         
                                        <!--a href="rejectreturn.php?id1=<?php echo $b_id; ?>&id2=<?php echo $sch_id; ?>" class="btn btn-danger">Reject</a-->
                                    </center></td>
                                    </tr>
                               <?php } ?>
                               </tbody>
                                </table>
                            </div>
                    <!--/.span3-->
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


<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>