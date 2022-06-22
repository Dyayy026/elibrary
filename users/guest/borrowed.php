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
    <script src="../../templates/js-links.php"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<body>
     <!-- sidebar -->
     <?php include 'sidebar-guest.php' ?>

    <!-- Contents-->
    <section class="home-section">
        <div class="home-content">
            <i class='bx bx-menu'></i>
            <span class="text">Borrowed </span>
        </div>
        <!--end of home content-->


        <!-- start -->
        <div class="container" id="brw-table">
            <table id="example" class="table table-hover " >
                <thead>
                    <tr>
                        <th>Ref ID</th>
                        <th>Copies</th>
                        <th>Returnee</th>
                        <th>Issuer</th>
                        <th>Issue Date</th>
                        <th>Return Date</th>
                        <th>Fine</th>
                    </tr>
                </thead>
                <tbody>

                    <tr>
                        <td>001</td>
                        <td>1</td>
                        <td>Loren M. Briz</td>
                        <td>Ms. Cruz</td>
                        <td>2009/01/12</td>
                        <td>2009/01/21</td>
                        <td>$2.00</td>
                        
                    </tr>
                    <tr>
                        <td>002</td>
                        <td>1</td>
                        <td>Armayne Arquiza</td>
                        <td>Ms. Cruz</td>
                        <td>2009/01/12</td>
                        <td>2009/01/21</td>
                        <td>$2.00</td>
                    </tr>
                    <tr>
                        <td>003</td>
                        <td>1</td>
                        <td>Arjay Andal</td>
                        <td>Ms. Cruz</td>
                        <td>2009/01/12</td>
                        <td>2009/01/21</td>
                        <td>$2.00</td>
                    </tr>
                    <tr>
                        <td>004</td>
                        <td>1</td>
                        <td>Astrid Daya</td>
                        <td>Ms. Cruz</td>
                        <td>2009/01/12</td>
                        <td>2009/01/21</td>
                        <td>$2.00</td>
                    </tr>
                   
                </tbody>
                <!-- just in case gusto mo parin ng may footer pre -->
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
    <script src="../../templates/js-links.php"></script>
</body>

</html>