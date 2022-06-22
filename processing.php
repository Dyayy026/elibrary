<!DOCTYPE html>
<html lang="en">

<!-- PRE SORRY NAUBUSAN AKO NG IDEA HAHAHAH AAYUSIN KO TO PROMISE -->

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Borrowed</title>
    <!-- all in one links -->
    <?php include 'templates/links.php' ?>

    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="css/regform-style.css">
    <style>
        body {
            background: url('img/home.png');
        }
    </style>

    <script src="templates/js-links.php"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>



<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-md navbar-light login-nav">
        <div class="container ">
            <div class="w-nav"> </div>

            <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end px-4" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item p-2 my-auto">
                        <a class="nav-link" aria-current="page" href="index.php"> <span class="nav-link-fade-up">Home</span> </a>
                    </li>
                    <li class="nav-item p-2 my-auto">
                        <a class="nav-link" href="#announcements"> <span class="nav-link-fade-up"> Announcements</span></a>
                    </li>
                    <li class="nav-item p-2 my-auto">
                        <a class="nav-link" href="#books"> <span class="nav-link-fade-up">Books</span> </a>
                    </li>
                    <li class="nav-item p-2 my-auto">
                        <a class="nav-link " href="login.php"><button type="button" class="btn btn-outline-dark button two">Login </button></a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>


    <!-- Contents-->
    <section class="home-section">




        <!-- start -->
        <div class="col cont-pros">
            <div class="home-content">
                <div class="intro">
                    <i class='bx bx-bell'></i>
                    <span class="text">Dear User,</span>
                </div>
                <div class="message">
                    <p>Your request is currently being processed please wait for the confirmation on your registered e-mail.
                        <br><span align="center"><u>Thank you!</u> </span>
                    </p>
                </div>

                <div class="button-cont">
                <a class="nav-link " href="index.php">Back to Home </a>
                    <a class="nav-link " href="login.php"><button type="button" class="btn btn-dark button two">Login </button></a>

                </div>


            </div>

        </div>




    </section>


    <script src="templates/js-links.php"></script>
</body>

</html>