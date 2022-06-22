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
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <!-- links in one  -->
        <?php include '../../../../templates/links.php' ?>
        <link rel="stylesheet" href="css/footer.css">
        <link rel="stylesheet" href="css/login-style.css">
        <style>
            body {
                background: url('img/home.png');
            }
        </style>
    </head>

    <body>
        <div class="sidebar close">
            <div class="logo-details">
                <i class='bx bxs-book'></i>
                <span class="logo_name"><img src="../../../../img/logo1.png" alt=""></span>
            </div>

            <!-- search -->
            <div class="input-group mb-3 " id="book-search">
                <input type="text" class="form-control" placeholder="Search Books" aria-describedby="button-addon2">
                <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class='bx bx-search'></i></button>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="view_profile.php">
                        <i class='bx bxs-home'></i>
                        <span class="link_name">Home</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Home</a></li>
                    </ul>
                </li>


                <li>
                    <a href="#">
                        <i class='bx bxs-megaphone'></i>
                        <span class="link_name">Announcements</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Announcements</a></li>
                    </ul>
                </li>

                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-book-add'></i>
                            <span class="link_name">Returns</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Returns</a></li>
                        <li><a href="../../borrow/borrowed.php">Borrowed</a></li>
                        <li><a href="../../returned/returned.php">Returned</a></li>
                    </ul>
                </li>

                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-user-pin'></i>
                            <span class="link_name">Users</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Users</a></li>
                        <li><a href="#">View All</a></li>
                        <li><a href="#">Add user</a></li>
                        <li><a href="#">Approve user</a></li>
                    </ul>
                </li>

                <li>
                    <div class="iocn-link">
                        <a href="#">
                            <i class='bx bx-book-alt'></i>
                            <span class="link_name">Books</span>
                        </a>
                        <i class='bx bxs-chevron-down arrow'></i>
                    </div>
                    <ul class="sub-menu">
                        <li><a class="link_name" href="#">Books</a></li>
                        <li><a href="view_book.php">View All</a></li>
                        <li><a href="add_book.php">Add new</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <i class='bx bx-cog'></i>
                        <span class="link_name">Schedules</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Schedules</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#">
                        <i class='bx bxs-dashboard'></i>
                        <span class="link_name">Dashboard</span>
                    </a>
                    <ul class="sub-menu blank">
                        <li><a class="link_name" href="#">Dashboard</a></li>
                    </ul>
                </li>


                <!-- Profile -->
                <li>
                    <div class="profile-details">
                        <div class="profile-content">
                            <!-- <img src="../../img/user.png" alt="profileImg"> -->
                        </div>
                        <div class="user-type">
                            <div class="profile_name">Loren Briz</div>
                            <div class="job">Librarian</div>
                        </div>
                        <i class='bx bx-log-out'></i>
                    </div>
                </li>
            </ul>
        </div>
        <!-- navbar -->
        
        
        <!-- /navbar-inner -->


        <!-- section start -->
        <section>
            

    <!--log in code-->
    <?php
        if(isset($_POST['login']))
        {$u=$_POST['sch_id'];
            $p=$_POST['pword'];
        
            $sql="SELECT * FROM u_details WHERE sch_id='$u'";
        
            $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $x=$row['pword'];
        $y=$row['ut_id'];
        if(strcasecmp($x,$p)==0 && !empty($u) && !empty($p))
            {
                    //echo "Login Successful";
                $_SESSION['sch_id']=$u;
                
            
                if($y=='1')
                    echo '<script>window.location="users/librarian/php/view_book.php"</script>';

                elseif($y=='2')
                    echo '<script>window.location="users/student/php/view_book.php"</script>';

                else
                    echo '<script>window.location="users/guest/php/view_book.php"</script>'; 
                
            }
        else 
            { echo "<script type='text/javascript'>alert('Failed to Login! Incorrect School ID No. or Password')</script>";
        }
            
        
        }

    ?>
            

        </section>

        <!-- footer -->
        <?php include '../../../../templates/footer.php' ?>

        <!-- js links-->
        <?php include '../../../../templates/js-links.php' ?>

    </body>

    </html>






<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>