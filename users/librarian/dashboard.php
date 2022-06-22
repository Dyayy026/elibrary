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
        <title>Dashboard</title>
        <!-- all in one links -->
        <?php include '../../templates/links.php' ?>

        <link rel="stylesheet" href="../../css/sidebar-style.css">
        <link rel="stylesheet" href="../../css/editprofile.css">
        <link rel="stylesheet" href="../../css/dashboard.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"/>
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
                <span class="text">Dashboard</span>
            </div>
            <!--end of home content-->

            <!-- start -->
            <!-- offcanvas -->
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                    <div class="col-md-3 mb-3">
                        <div class="card bg-primary text-white h-100">
                        <div class="card-body py-5">Number of Users
                            <?php
                                $user_query="SELECT * FROM u_details WHERE date_added is NOT NULL";
                                $result= mysqli_query($conn,$user_query);

                                if($user_total = mysqli_num_rows($result)){
                                    echo '<h4 class="mb-0">'.$user_total.'</h4>';
                                }

                                else{
                                    echo '<h4 class="mb-0">0</h4>';
                                }
                            
                            ?>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card bg-primary text-white h-100">
                        <div class="card-body py-5">Number of Library Visitors
                            <?php
                                $visitor_query="SELECT * FROM appr_sched WHERE sc_date is NOT NULL";
                                $result= mysqli_query($conn,$visitor_query);

                                if($visitor_total = mysqli_num_rows($result)){
                                    echo '<h4 class="mb-0">'.$visitor_total.'</h4>';
                                }

                                else{
                                    echo '<h4 class="mb-0">0</h4>';
                                }
                            
                            ?>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card bg-primary text-white h-100">
                        <div class="card-body py-5">Number of Books Issued
                            <?php
                                $bookb_query="SELECT * FROM borrowed WHERE bw_date is NOT NULL";
                                $result= mysqli_query($conn,$bookb_query);

                                if($bookb_total = mysqli_num_rows($result)){
                                    echo '<h4 class="mb-0">'.$bookb_total.'</h4>';
                                }

                                else{
                                    echo '<h4 class="mb-0">0</h4>';
                                }
                            
                            ?>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <div class="card bg-primary text-white h-100">
                        <div class="card-body py-5">Number of Circulating Books
                            <?php
                                $book_query="SELECT * FROM books";
                                $result= mysqli_query($conn,$book_query);

                                if($book_total = mysqli_num_rows($result)){
                                    echo '<h4 class="mb-0">'.$book_total.'</h4>';
                                }

                                else{
                                    echo '<h4 class="mb-0">0</h4>';
                                }
                            
                            ?>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                        <div class="card-header">
                            <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                            Number of Books Issued 
                        </div>
                        <div class="card-body">
                            <canvas class="chart" width="400" height="200"></canvas>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card h-100">
                        <div class="card-header">
                            <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                            Number of Library Visitors
                        </div>
                        <div class="card-body">
                            <canvas id="visitor" width="400" height="200"></canvas>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <div class="card h-100">
                        <div class="card-header">
                            <span class="me-2"><i class="bi bi-bar-chart-fill"></i></span>
                            Number of Books
                        </div>
                        <div class="card-body">
                            <canvas id="myChart" width="400" height="400"></canvas>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>

            <?php
                $mbooks_query= $conn->query("
                select year(bw_date),month(bw_date) as month,
                COUNT(*) as total
                from borrowed 
                WHERE bw_due IS NOT NULL 
                group by month
                order by year(bw_date),month(bw_date);");



                while($data = mysqli_fetch_array($mbooks_query)){
                   $month[] = DateTime::createFromFormat('!m', $data['month'])->format('F');
                   $count[] = $data['total'];

                }

        
            
            ?>

            <?php
                $mvisitor_query= $conn->query("
                select year(sc_date),month(sc_date) as month,
                COUNT(*) as total
                from appr_sched 
                WHERE status IS NOT NULL 
                group by month
                order by year(sc_date),month(sc_date);");



                while($data = mysqli_fetch_array($mvisitor_query)){
                   $month1[] = DateTime::createFromFormat('!m', $data['month'])->format('F');
                   $count1[] = $data['total'];

                }

        
            
            ?>    
            
            
            <?php
                $cbooks_query= $conn->query("
                select title as t,
                COUNT(*) as total
                from books  
                group by title
                order by title;");



                while($data = mysqli_fetch_array($cbooks_query)){
                   $t[] = $data['t'];
                   $count2[] = $data['total'];

                }

        
            
            ?>  







            <!--/.container-->
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
            <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>

            <!-- chart script1 -->
            <script >
                const charts = document.querySelectorAll(".chart");
                const labels = <?php echo json_encode($month)?>;

                charts.forEach(function (chart) {
                    var ctx = chart.getContext("2d");
                    var myChart = new Chart(ctx, {
                    type: "bar",
                    data: {
                        labels: labels,
                        datasets: [
                        {
                            label: "# of Books",
                            data: <?php echo json_encode($count)?>,
                            backgroundColor: [
                            "rgba(255, 99, 132, 0.2)",
                            "rgba(54, 162, 235, 0.2)",
                            "rgba(255, 206, 86, 0.2)",
                            "rgba(75, 192, 192, 0.2)",
                            "rgba(153, 102, 255, 0.2)",
                            "rgba(255, 159, 64, 0.2)",
                            "rgba(255, 100, 132, 0.2)",
                            "rgba(59, 162, 235, 0.2)",
                            "rgba(255, 206, 100, 0.2)",
                            "rgba(89, 192, 192, 0.2)",
                            "rgba(153, 150, 255, 0.2)",
                            "rgba(255, 233, 64, 0.2)"
                            ],
                            borderColor: [
                            "rgba(255, 99, 132, 1)",
                            "rgba(54, 162, 235, 1)",
                            "rgba(255, 206, 86, 1)",
                            "rgba(75, 192, 192, 1)",
                            "rgba(153, 102, 255, 1)",
                            "rgba(255, 159, 64, 1)",
                            "rgba(255, 100, 132, 1)",
                            "rgba(59, 162, 235, 1)",
                            "rgba(255, 206, 100, 1)",
                            "rgba(89, 192, 192, 1)",
                            "rgba(153, 150, 255, 1)",
                            "rgba(255, 233, 64, 1)"
                            ],
                            borderWidth: 1,
                        },
                        ],
                    },
                    options: {
                        scales: {
                        y: {
                            beginAtZero: true,
                        },
                        },
                    },
                    });
                });
            </script>

            <!-- chart script2 -->
            <script>
                const ctx = document.getElementById('visitor').getContext('2d');
                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: <?php echo json_encode($month1)?>,
                        datasets: [{
                            label: '# of Visitors',
                            data: <?php echo json_encode($count1)?>,
                            backgroundColor: [
                                "rgba(255, 99, 132, 0.2)",
                                "rgba(54, 162, 235, 0.2)",
                                "rgba(255, 206, 86, 0.2)",
                                "rgba(75, 192, 192, 0.2)",
                                "rgba(153, 102, 255, 0.2)",
                                "rgba(255, 159, 64, 0.2)",
                                "rgba(255, 100, 132, 0.2)",
                                "rgba(59, 162, 235, 0.2)",
                                "rgba(255, 206, 100, 0.2)",
                                "rgba(89, 192, 192, 0.2)",
                                "rgba(153, 150, 255, 0.2)",
                                "rgba(255, 233, 64, 0.2)"
                            ],
                            borderColor: [
                                "rgba(255, 99, 132, 1)",
                                "rgba(54, 162, 235, 1)",
                                "rgba(255, 206, 86, 1)",
                                "rgba(75, 192, 192, 1)",
                                "rgba(153, 102, 255, 1)",
                                "rgba(255, 159, 64, 1)",
                                "rgba(255, 100, 132, 1)",
                                "rgba(59, 162, 235, 1)",
                                "rgba(255, 206, 100, 1)",
                                "rgba(89, 192, 192, 1)",
                                "rgba(153, 150, 255, 1)",
                                "rgba(255, 233, 64, 1)"
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
                </script>

                 <!-- chart script3 -->
                 <script>
                    var countries= document.getElementById("myChart").getContext("2d");
                    var chart = new Chart(countries,{
                    type: 'pie',
                    data: 
                    {
                        labels: <?php echo json_encode($t)?>,
                        datasets: 
                            [{
                            backgroundColor: ["#42f551","#a1f542","#42a4f5","#424ef5"],
                            data: <?php echo json_encode($count2)?>,
                            borderWidth:1,
                            }]
                    },
                    options:
                    {
                        responsive: true,
                        maintainAspectRatio:false,
                        legend: {
                            display: false,
                            position: 'top'
                        }
                    }
                    });
                </script>


























            <?php
            if (isset($_POST['submit'])) {
                $sch_id = $_POST['sch_id'];
                $message = $_POST['Message'];

                $sql1 = "INSERT INTO message (sch_id,msg,msg_date,time) VALUES ('$sch_id','$message',curdate(),curtime())";

                if ($conn->query($sql1) === TRUE) {
                    echo "<script type='text/javascript'>alert('Message Sent')</script>";
                } else { //echo $conn->error;
                    echo "<script type='text/javascript'>alert('Error')</script>";
                }
            }
            ?>
    </body>

    </html>


<?php } else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>