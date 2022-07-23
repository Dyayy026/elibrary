<?php
require('conn.php');
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<!-- PRE PAAYOS UN PATH DITO SA PAGKUHA DUN SA LIBRARIAN NA PHOTOS, DI KO KASI ALAM SAN KUNIN EH, DI SIYA NALABAS DITO -->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <!-- all in one links -->
    <?php include '../../templates/links.php' ?>

    <link rel="stylesheet" href="../../css/sidebar-style.css">
    <link rel="stylesheet" href="../../css/viewbooks-style.css">
    <title>Books</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <!-- sidebar -->
    <?php include('sidebar-guest.php') ?>

    <!-- Contents-->
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Books</span>
        </div>
        <!-- End of home content -->


        <!-- start -->
        <div class="container" id="this">
            <div class="row">

                <?php 
                        $limit = 4;  
                        if (isset($_GET["page"])) { $page  = $_GET["page"]; } else { $page=1; };  
                        $start_from = ($page-1) * $limit; 
                    ?>
                    <?php
                        
                            $sql = "SELECT * FROM books 
                            INNER JOIN categories ON books.cat_id = categories.cat_id ORDER BY title  ASC LIMIT $start_from, $limit ";
                            $result = $conn->query($sql);
                            $rowcount = mysqli_num_rows($result);

                        if (!($rowcount))
                            echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
                        else {


                    ?>

                <!-- fetching data -->
                <?php while ($row = mysqli_fetch_assoc($result)) { ?>


                    <?php
                    //removing space
                    $str = "../librarian/uploads/" . $row['photo'];
                    $new_str = str_replace(' ', '', $str);
                    $title = $row['title'];
                    $author = $row['author'];
                    $pub_year = $row['pub_year'];
                    $category = $row['category'];
                    $serial = $row['serial_number'];
                    $copies_owned = $row['copies_owned'];
                    $copies_avlbl = $row['copies_avlbl'];
                    $date_added = $row['date_added'];

                    ?>


                    <div class="col-lg-5 m-4 " id="bk-box">
                        <div class="box box-solid ">
                            <div class="box-top col-md-4">
                                <img src="<?php echo $new_str ?>" class='thumbnail' />
                            </div>
                            <div class="box-body prod-body">

                                <p class="font-weight-bold" id="text"><?php echo $title ?></p>
                                <p class="font-weight-bold capitalize" id="sub-text">By: <?php echo  $author ?></p>

                                <div class="box-footer h-25 align-items-center">
                                    <!-- Button trigger view deets -->
                                    <a></a>
                                    <a href="view_deets.php?view=<?php echo $row['b_id']; ?>" class="edit_btn">View Details</a>
                                </div>

                            </div>
                        </div>

                    </div>

                    <?php }
                            } ?>
            </div>
        </div>
        <div class="span9" style="margin-left:50px;">
                <?php 
                //dito lang nagana css
                $sql = "SELECT COUNT(b_id) FROM books";  
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
                    
                    
                    href='view_book.php?page=".$i."'>".$i."</a>";};

                        echo $pagLink;'</div>';
                    
                ?>
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
</body>

</html>