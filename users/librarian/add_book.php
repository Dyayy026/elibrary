<?php  include('crud.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Add book</title>
    <!-- all in one links -->
    <?php include '../../templates/links.php' ?>

    <link rel="stylesheet" href="../../css/sidebar-style.css">
    <link rel="stylesheet" href="../../css/addbook-style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
   <!-- sidebar -->
   <?php include('sidebar-librarian.php') ?>

   <!-- start -->
    <section class="home-section">
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text"> Add Books</span>
            </div>
            <!--end of home content-->



        <div class="container cont-addbook">
            
            <?php if(isset($_GET['error'])): //error ?>
                <p><?php echo $_GET['error']?></p>

            <?php endif ?>

            <form action="crud.php" method="POST" enctype="multipart/form-data">
                <!-- php -->
                <?php if (isset($_SESSION['message'])): ?>
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
                            $id = $_GET['edit'];
                            $update = true;
                            $record = mysqli_query($db, "SELECT * FROM books WHERE b_id=$b_id");

                        // if (count($record)) {
                            $n = mysqli_fetch_array($record);
                            $name = $n['name'];
                            $address = $n['address'];
                        // }
                    }
                ?>
               
            <div class="container justify-content">

                <div class="input-group">
                    <input type="hidden" name="b_id" value="" >
                </div>

                <div class="input-group">
                    <label>Title</label>
                    <input type="text" name="title" value="" class=" form-control" required>
                </div>

                <div class="input-group">
                    <label>Author</label>
                    <input type="text" name="author" value="" class=" form-control" required>
                </div>

                <div class="input-group">
                    <label>Publication Year</label>
                    <input type="date" name="pub_year" value="" class=" form-control" required>
                </div>

                <div class="input-group">
                    <label>Category ID</label>
                    <input type="number" name="cat_id" value="" class=" form-control" required>
                </div>

                <div class="input-group">
                    <label>Serial Number</label>
                    <input type="text" name="serial_number" value="" class=" form-control" required>
                </div>

                <div class="input-group">
                    <label>Copies Owned</label>
                    <input type="number" name="copies_owned" value="" class=" form-control" required>
                </div>

                <div class="input-group">
                    <label>Copies Available</label>
                    <input type="number" name="copies_avlbl" value="" class=" form-control" required>
                </div>

                <div class="input-group">
                    <label>Date Added</label>
                    <input type="date" name="date_added" value="" class=" form-control" required>
                </div>

                <div class="input-group">
                    <label>Cover</label>
                    <input type="file" name="photo" value="" class=" form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                </div>

                <div class="input-group">
                    <button class="btn btn-dark" type="submit" name="save" style="background-color: #238C8F; border:none;" >Save</button>
                </div>
            </div>

        
            </form>
          
        </div>



    </section>





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