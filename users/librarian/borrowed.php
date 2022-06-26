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
        <link rel="stylesheet" href="style.css">
        <title>Borrowed</title>
        <!-- all in one links -->
        <?php include '../../templates/links.php' ?>

        <link rel="stylesheet" href="../../css/sidebar-style.css">
        <link rel="stylesheet" href="../../css/table-style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
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
                <span class="text">Borrow Requests </span>
                <div style="margin-top: 250px;">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary experiment" data-bs-toggle="modal" data-bs-target="#myModal" style="background-color: #238C8F;">
                        Scan QR
                    </button>                                      
                </div> 
            </div>
            <!--end of home content-->
            
            <!-- start -->
            <div class="container" id="brw-table"> 
                <table id="example" class="table table-hover " >
                    <thead>
                        <tr>
                            <th>School ID No.</th>
                            <th>Book ID</th>
                            <th>Title</th>
                            <th>Copies Available</th>
                            <th colspan="2" >Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sql="SELECT * FROM borrowed, books WHERE bw_date IS NULL AND borrowed.b_id=books.b_id ORDER BY time";
                            $result=$conn->query($sql);
                            while($row=$result->fetch_assoc())
                            {
                                $b_id=$row['b_id'];
                                $sch_id=$row['sch_id'];
                                $title=$row['title'];
                                $avail=$row['copies_avlbl'];
                                
                                    
                        ?>
                    

                        <tr>
                            <td><?php echo $sch_id ?></td>
                            <td><?php echo $b_id ?></td>
                            <td class="capitalize"><?php echo $title ?></td>
                            <td><?php echo $avail ?></td>
                            <td align="center">
                                <?php
                                    if($avail > 0)
                                    {echo "<a href=\"accept.php?id1=".$b_id."&id2=".$sch_id."&id3=".$title."\" class=\"btn btn-dark\">Accept</a>";}
                                    else{ echo "<script type='text/javascript'>alert('No Copies Available!!!')</script>";}
                                ?></td>
                            <td align="center"><a href="reject.php?id1=<?php echo $b_id ?>&id2=<?php echo $sch_id ?>&id3=<?php echo $title ?>" class="btn btn-danger">Reject</a></td>
                            
                        </tr>
                        <?php } ?>
                        
                    </tbody>
                  
                    <!-- just in case gusto mo parin ng may footer pre -->
                    <!-- Ayoko pre -->
                    <!-- <tfoot>
                        <tr>
                            <th>Ref ID</th>
                            <td>Copies</td>
                            <th>Returnee</th>
                            <th>Issuer</th>
                            <th>Issue Date</th>
                            <th>Return Date</th>
                            <th>Fine</th>
                        </tr>
                    </tfoot> -->
                </table>
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
        <script src="ht.js"></script>
            <style>
            .result{
                background-color: green;
                color:#fff;
                padding:20px;
            }
            .row{
                display:flex;
            }
            </style>
            <div class="row">
            <div class="col">
                <div style="width:500px;" id="reader"></div>
            </div><audio id="myAudio1">
            <source src="success.mp3" type="audio/ogg">
            </audio>
            <audio id="myAudio2">
            <source src="failes.mp3" type="audio/ogg">
            </audio>
            <script>
            var x = document.getElementById("myAudio1");
            var x2 = document.getElementById("myAudio2");      
            function showHint(str) {
            if (str.length == 0) {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("txtHint").innerHTML = this.responseText;
                }
                };
                xmlhttp.open("GET", "gethint.php?q=" + str, true);
                xmlhttp.send();
            }
            }

            function playAudio() { 
            x.play(); 
            } 


            </script>
            <div class="col" style="padding:30px;">
                <h4>SCAN RESULT</h4>
                <div>Book Title</div><form action="">
                <input type="text" name="start" class="input" id="result" onkeyup="showHint(this.value)" placeholder="result here" readonly="" /></form>
                <p>Status: <span id="txtHint"></span></p>
            </div>
            </div>
            <script type="text/javascript">
            function onScanSuccess(qrCodeMessage) {
                document.getElementById("result").value = qrCodeMessage;
                showHint(qrCodeMessage);
            playAudio();

            }
            function onScanError(errorMessage) {
            //handle scan error
            }
            var html5QrcodeScanner = new Html5QrcodeScanner(
                "reader", { fps: 10, qrbox: 250 });
            html5QrcodeScanner.render(onScanSuccess, onScanError);

        </script>
    </div>
  </div>
</div>
<!-- End of Modal -->

