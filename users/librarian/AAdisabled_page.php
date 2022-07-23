<?php require('conn.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- links in one  -->
    <?php include '../../templates/links.php' ?>
    <link rel="stylesheet" href="../../css/footer.css">
    <link rel="stylesheet" href="../../css/login-style.css">
    <style>
        body {
            background: url('../../img/home.png');
        }
    </style>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light login-nav">
        <div class="container-fluid ">
            <div class="w-nav"> </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"   data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span data-toggle="collapse" class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end px-4 " id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item p-2 my-auto">
                        <a class="nav-link nav-link-fade-up" aria-current="page" href="../../login.php"> <span class="nav-link-fade-up">Home</span> </a>
                    </li>
                    <!-- <li class="nav-item p-2 my-auto">
                        <a class="nav-link nav-link-fade-up" href="#announcements"> <span class="nav-link-fade-up"> Announcements</span></a>
                    </li>
                    <li class="nav-item p-2 my-auto">
                        <a class="nav-link " href="#books"> <span class="nav-link-fade-up">Books</span> </a>
                    </li> -->

                </ul>
            </div>
        </div>
    </nav>


    <!-- section start -->
    <section>
        <!-- left side start -->
        <div class="col-6 img-box">
            <img src="../../img/login.png" alt="" class="img-fluid">
        </div>
        <!--left side end-->

        <!-- right side start content box -->
        <div class="col cont-box">
            <?php
                 $sql = "SELECT * FROM u_details INNER JOIN u_type
                 ON u_details.ut_id = u_type.ut_id WHERE date_added is NOT NULL AND acc_disable is NOT NULL ORDER BY l_name  ";
                 $result = $conn->query($sql);
                 $rowcount = mysqli_num_rows($result);

                 if (!($rowcount))
                 echo "<br><center><h2><b><i>No Results</i></b></h2></center>";
             else {


             ?>

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
                       
                         
                     <?php }
                     } 
                     ?>
                     <h1 style="margin-top: 250px;">Your Account has been disabled</h1>
                     <tr>
                        <td>
                           <h4>Account Name: <i><?php echo $name;?></i></h4>  <h4></h4>
                        </td>
                        <td>
                        <h4>Email: <i><?php echo $email;?></i></h4>  <h4></h4>
                        </td>
                        <td>
                            <h4>School ID: <i><?php echo $sch_id;?></i></h4></h4>
                        </td>
                        <td>
                        <h4>Date Disabled: <i><?php echo $date_disabled;?></i></h4></h4>
                        </td>
                        <td>
                            <br><br>
                        <button type="submit" class="form-control btn btn-dark submit button two" name="login"><span><a href="../../login.php" style="text-decoration: none;">Back to Login</a></span> </button>
                        </td>

                       
                     </tr>
            


            <div class="col">
                
            </div>
        </div>
        <!--right side end xontext box-->





    </section>

    <!-- footer -->
    <?php include '../../templates/footer.php' ?>

    <!-- js links-->
    <?php include '../../templates/js-links.php' ?>

</body>

</html>