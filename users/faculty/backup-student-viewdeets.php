<?php include('crud.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>View Details</title>
    <!-- all in one links -->
    <?php include '../../templates/links.php' ?>

    <link rel="stylesheet" href="../../css/sidebar-style.css">
    <link rel="stylesheet" href="../../css/viewdetails-style.css">
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
            <span class="text">View Details</span>
        </div>
        <!--end of home content-->


        <!-- start -->
        <div class="container">

            <form action="crud.php" method="POST">
                <!-- php -->
                <?php if (isset($_SESSION['message'])) : ?>
                    <div class="msg">
                        <?php
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        ?>
                        <!-- php -->
                    </div>
                <?php endif ?>

                <!-- update -->

                <?php
                if (isset($_GET['view'])) {
                    $b_id = $_GET['view'];
                    $record = mysqli_query($db, "SELECT * FROM books 
                        INNER JOIN categories ON books.cat_id = categories.cat_id
                         WHERE b_id=$b_id");

                    // if (count($record)) {
                    $n = mysqli_fetch_array($record);
                    $b_id = $n['b_id'];
                    $title = $n['title'];
                    $author = $n['author'];
                    $pub_year = $n['pub_year'];
                    $category = $n['category'];
                    $copies_owned = $n['copies_owned'];
                    $copies_avlbl = $n['copies_avlbl'];
                    $date_added = $n['date_added'];

                    $str = "../librarian/uploads/" . $n['photo'];
                    $new_str = str_replace(' ', '', $str);
                    // }
                }
                ?>

                <div class="container-fluid justify-content" id="cont-box">
                    <div class="row">

                        <div class="col-lg-4 " >
                            <img src="<?php echo $new_str ?>" alt="Book Image" class="bk-img">
                        </div>
                        <div class="col-lg-8">
                            <div class="text-wrap">
                                <p class="capitalize">Author: <?php echo $author; ?></p>
                                <p>Category: <?php echo $category; ?></p>
                                <p>Publication Date: <?php echo $pub_year; ?></p>
                                <p>Copies Owned: <?php echo $copies_owned; ?></p>
                                <p>Copies Available: <?php echo $copies_avlbl; ?></p>
                                <p>Date Added: <?php echo $date_added; ?></p>
                            </div>

                        </div>


                    </div>


                </div>

                <div class="container " id="cont-btn-modify">
                    <table>
                        <tr>
                            <td>
                                
                                <?php
                                    if($copies_avlbl > 0)
                                        echo "<button class='btn btn-dark' id='btn-edit'><a href=\"brw_req.php?id=".$b_id."\" class=\"btn btn-edit\">Borrow</a></button>";
                                    else
                                        echo "Book is currently unavailable";
                                ?>
                                
                                
                                
                            </td>
                        </tr>
                    </table>
                </div>



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