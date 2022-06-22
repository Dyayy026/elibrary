<?php include('crud.php'); ?>
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
    <?php include('sidebar-student.php') ?>

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

                <!-- sql query-->
                <?php $results = mysqli_query($db, "SELECT * FROM books 
            INNER JOIN categories ON books.cat_id = categories.cat_id"); ?>

                <!-- fetching data -->
                <?php while ($row = mysqli_fetch_assoc($results)) { ?>


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
                        <div class="box box-solid " >
                            <div class="box-top col-md-4">
                                <img src="<?php echo $new_str ?>" class='thumbnail' />
                            </div>
                            <div class="box-body prod-body">
                    
                                <p class="font-weight-bold" id="text"><?php echo $title ?></p>
    
                                <p class="font-weight-bold capitalize" id="sub-text">By: <?php echo  $author ?></p>
                            </div>
                        </div>
                        <div class="box-footer h-25">
                            <!-- Button trigger view deets -->
                            
                            <a href="view_deets.php?view=<?php echo $row['b_id']; ?>" class="edit_btn">View Details</a>
                        </div>
                    </div>

                    <?php } ?>
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
</body>

</html>