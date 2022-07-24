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
        <title>Announcements</title>
        <!-- all in one links -->
        <?php include '../../templates/links.php' ?> 

        <link rel="stylesheet" href="../../css/sidebar-style.css">
        <link rel="stylesheet" href="../../css/borrowed.css">
        <link rel="stylesheet" href="../../css/editprofile.css">
        <link rel="stylesheet" href="../../css/ann_style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        
    </head>


    <body>
        <!-- sidebar -->
        <?php include('sidebar-faculty.php') ?>

        <!-- Contents-->
        <section class="home-section">
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text">Announcement </span>
                
                
            </div> 
                    <BR><BR> <BR></BR>
            <!--end of home content-->
          
            <!-- start -->
            <?php
                $sql =mysqli_query($conn,"SELECT * FROM announcement");
            ?>
               
               <?php while ($row = mysqli_fetch_assoc($sql)) { ?>
                <?php

                //removing space
                $str = "../librarian/annoucementimg/" . $row['photo'];
                $new_str = str_replace(' ', '', $str);
                $heading = $row['heading'];
                $description = $row['description'];
                $date = $row['date_posted'];
                $caption = $row['caption'];
                ?>

                <div class="container mb-4" style="margin-top: -100px;">
                    <div class="row d-flex align-items-center justify-content-center">
                        <div class="col-md-6">
                            <div class="card card-color-gradient">
                                <div class="d-flex justify-content-between p-2 px-3">
                                    <div class="d-flex flex-row align-items-center"> 
                                        <div class="d-flex flex-column ml-2"> <span class="font-weight-bold fw-bolder h1 text-white"><?php echo $heading ?></span>  </div>
                                    </div>
                                    <div class="d-flex flex-row mt-1 ellipsis"> <small class="mr-2 text-white"><?php echo $date ?></small> </div>
                                </div> 
                                
                                <img src="<?php echo $new_str ?>" class="img-fluid img-thumbnail rounded mx-auto d-block" width="400" height="200">

                                <div class="p-2">
                                    <p class="text-justify fw-bold"><?php echo $description ?></p>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center">
                                    <p class="text-justify"><?php echo $caption ?></p>
                                       
                                    </div>
                                    <hr>
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

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
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
        <script src="../../templates/js-links.php"></script>

        
    </body>

    </html>



<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>


<!-- The Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Announcement</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
    <!-- start -->
    <div class="container cont-editprofile">

<form action="AAannouncement.php" method="POST" enctype="multipart/form-data">

    <div class="container ">

        <div class="input-group">
            <!--  -->
        </div>

        <div class="input-group">
            <label>Heading</label>
            <input class="form-control" type="text" name="heading" value="">
        </div>

        <div class="input-group">
            <label>Description</label>
            <input class="form-control" type="text" name="description" value="">
        </div>

        <div class="input-group">
            <label>Image</label>
            <input type="file" name="photo" value="" class=" form-control"  aria-label="Upload">
        </div>

        <div class="input-group">
            <label>Caption</label>
            <input class="form-control" type="text" name="caption" value="">
        </div>


        <!-- Pre Just in case magbago isip mo na gusto mo na napapaltan un profile pre -->
        <!-- Ayoko nga-->
        <!-- Photo Update -->
        <!-- <div class="input-group">
                <label for="text">Upload Photo</label>
                <br>
                <input id="input-style" class="form-control" type="file" id="formFile" name="photo">
            </div> -->

        <div class="input-group">
            <button class="btn btn-dark" type="submit" name="submit">Announce</button>
        </div>
    </div>

            <!--add user code here-->
                <?php
                    if(isset($_POST['submit']))
                    {
                        $heading=$_POST['heading'];
                        $description=$_POST['description'];
                        $caption=$_POST['caption'];
                        $date_created= date('Y-m-d');
                        

                        //insert photo
                        $fileName = $_FILES['photo']['name'];
                        $fileTmpName = $_FILES['photo']['tmp_name'];
                        $fileSize = $_FILES['photo']['size'];
                        $fileError = $_FILES['photo']['error'];
                        $fileType = $_FILES['photo']['type'];

                        $fileExt = explode('.', $fileName);
                        $fileActualExt = strtolower(end($fileExt));

                        $allowed = array('jpg', 'jpeg', 'png');

                        if (in_array($fileActualExt, $allowed)){
                            if( $fileError === 0){
                                if( $fileSize < 100000000000){
                                    $fileNameNew = uniqid('',true).".".$fileActualExt;
                                    $fileDestination = 'annoucementimg/'.$fileNameNew;
                                    move_uploaded_file($fileTmpName, $fileDestination);
                                }
                                else{
                                    echo "File is too big";
                                }
                            }
                            else{
                                echo "Error uploading the file";
                            }
                        }
                        else{
                            echo "File type not accepted";
                        }
                    
                        $sql="INSERT INTO announcement(heading,description,date_posted,photo,caption) VALUES ('$heading','$description','$date_created','$fileNameNew','$caption')";
                    
                        if ($conn->query($sql) === TRUE) {
                        echo "<script type='text/javascript'>alert('Posted Successfully!')</script>";
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        echo "<script type='text/javascript'>alert('Post Failed')</script>";
                        }
                        }
                ?>
        </form>
        </div>
      </div>

     

    </div>
  </div>
</div>





































