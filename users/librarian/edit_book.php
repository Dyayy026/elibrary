<?php include('crud.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Edit Book</title>
    <!-- all in one links -->
    <?php include '../../templates/links.php' ?>
    <!-- bootstrap kasi ayaw gumana sa modal na puta, nagana naman sa iba puta :) -->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> -->
    <link rel="stylesheet" href="../../css/editbook-style.css">
    <link rel="stylesheet" href="../../css/sidebar-style.css">
    
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
            <span class="text">Books </span>
        </div>
        <!--end of home content-->


        <!-- start -->
        <div class="container cont-editbook">

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
                if (isset($_GET['edit'])) {
                    $b_id = $_GET['edit'];
                    $record = mysqli_query($db, "SELECT * FROM books 
                        INNER JOIN categories ON books.cat_id = categories.cat_id
                         WHERE b_id=$b_id");

                    // if (count($record)) {
                    $n = mysqli_fetch_array($record);
                    $b_id = $n['b_id'];
                    $title = $n['title'];
                    $author = $n['author'];
                    $pub_year = $n['pub_year'];
                    $cat_id = $n['cat_id'];
                    $serial = $n['serial_number'];
                    $copies_owned = $n['copies_owned'];
                    $copies_avlbl = $n['copies_avlbl'];
                    $date_added = $n['date_added'];
                    // }
                }
                ?>

                <div class="container ">

                    <div class="input-group">
                        <input type="hidden" name="b_id" value="<?php echo $b_id; ?>">
                    </div>

                    <div class="input-group">
                        <label>Title</label>
                        <input class="form-control" type="text" name="title" value="<?php echo $title; ?>">
                    </div>

                    <div class="input-group">
                        <label>Author</label>
                        <input class="form-control" type="text" name="author" value="<?php echo $author; ?>">
                    </div>

                    <div class="input-group">
                        <label>Publication Year</label>
                        <input class="form-control" type="date" name="pub_year" value="<?php echo $pub_year; ?>">
                    </div>

                    <div class="input-group">
                        <label>Category ID</label>
                        <input class="form-control" type="number" name="cat_id" value="<?php echo $cat_id; ?>">
                    </div>

                    <div class="input-group">
                        <label>Serial Number</label>
                        <input class="form-control" type="text" name="serial_number" value="<?php echo $serial; ?>">
                    </div>

                    <div class="input-group">
                        <label>Copies Owned</label>
                        <input class="form-control" type="number" name="copies_owned" value="<?php echo $copies_owned; ?>">
                    </div>

                    <div class="input-group">
                        <label>Copies Available</label>
                        <input class="form-control" type="number" name="copies_avlbl" value="<?php echo $copies_avlbl; ?>">
                    </div>

                    <div class="input-group">
                        <label>Date Added</label>
                        <input class="form-control" type="date" name="date_added" value="<?php echo $date_added; ?>">
                    </div>


                    <div class="input-group">
                        <button class="btn btn-dark" type="submit" name="update" style="background-color: #238C8F;">Update</button>
                    </div>
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