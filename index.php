<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>eLibrary</title>
  <!-- links in one  -->
  <?php include 'templates/links.php' ?>
  <link rel="stylesheet" href="css/index-style.css" type="text/css">
  <link rel="stylesheet" href="css/footer.css">
  <style>
    body {
      background: url('img/home.png');
    }
  </style>
</head>

<body>
  <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-light ">
    <div class="container-fluid">
      <a class="navbar-brand mx-5" href="#"><img src="img/Eliblogo.png" width="150px" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end px-4" id="navbarNav">
        <ul class="navbar-nav ">
          <!-- <li class="nav-item p-2 my-auto">
            <a class="nav-link active" aria-current="page" href="index.php"> <span class="nav-link-fade-up">Home</span> </a>
          </li>
          <li class="nav-item p-2 my-auto">
            <a class="nav-link" href="#announcements"> <span class="nav-link-fade-up"> Announcements</span></a>
          </li>
          <li class="nav-item p-2 my-auto">
            <a class="nav-link" href="#books"> <span class="nav-link-fade-up">Books</span> </a>
          </li> -->
          <li class="nav-item p-2 my-auto">
            <a class="nav-link " href="login.php"><button type="button" class="btn btn-outline-dark ">Login </button></a>
          </li>
          <li class="nav-item p-2 my-auto">
            <a class="nav-link " href="regform.php"><button type="button" class="btn btn-outline-dark ">Register</button></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- content container -->
  <div class="container f-container">
    <!--1st row-->
    <div class="row ">

      <div class="col-7 position-relative home-left">
        <!-- left side -->
        <div class="welcome d-flex justify-content-around align-items-center text-center ">
          <!-- Welcome  -->
          <div class="text-center user-img rounded-circle d-flex align-items-center m-3 ">
            <img src="https://img.icons8.com/bubbles/100/000000/user.png" class="img-radius" alt="User-Profile-Image"> 
          </div>
          <p class="p-2 m-2 flex-grow-1 welc-text">Welcome</p>
        </div>

        <div class="texts ">
          <!-- texts -->
          <p align="center">Welcome to our E-library! <br>
          Please register an account to book a schedule. Have fun reading.
        </p>
        </div>
        <!-- search 
        <div class="input-group mb-3 ">
          <input type="text" class="form-control" placeholder="Search Books" aria-describedby="button-addon2">
          <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="fas fa-search"></i> </button>
        </div>-->

      </div> <!-- end of left side -->

      <!-- right side -->
      <div class="col-5 d-flex align-items-center home-img">
        <img src="img/books.png" alt="" class="postition-absolute img-fluid">
      </div> <!-- end of right side -->

    </div>
    <!--end of row-->

  </div>
  <!--end of content container-->



  <!-- footer -->
  <?php include 'templates/footer.php' ?>

  <!-- js links-->
  <?php include 'templates/js-links.php' ?>

</body>

</html>