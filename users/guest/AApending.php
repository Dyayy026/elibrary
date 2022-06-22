<?php
ob_start();
require('conn.php');
?>

<?php 
if ($_SESSION['sch_id']) { 
    ?>

<!-- flag -->
<?php  
$sch_id = $_SESSION['sch_id'];
$connect = mysqli_connect("localhost", "root", "", "library"); 
  $query = "SELECT * FROM tb_sched WHERE status= 'Pending' AND schl_id = '$sch_id' ORDER BY id DESC";  
  $result = mysqli_query($connect, $query); 
 ?>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="style.css">
        <title>Approved Requests</title>
        <!-- all in one links -->
        <?php include '../../templates/links.php' ?>

        <link rel="stylesheet" href="../../css/sidebar-style.css">
        <link rel="stylesheet" href="../../css/table-style.css">
        <script src="../../templates/js-links.php"></script>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

          <!-- para to sa modal -->
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" ></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    </head>


    <body>
       <!-- sidebar -->
       <?php include('sidebar-guest.php') ?>

        <!-- Contents-->
        <section class="home-section">
            <div class="home-content">
                <i class='bx bx-menu'></i>
                <span class="text">Pending Requests</span>
            </div>
            <!--end of home content-->


            <!-- start -->
            <div class="container" id="brw-table">
            <table id="example" class="table table-hover " >
                    <thead>
                        <tr>
                        <th scope="col">Request ID</th>
                        <th scope="col">Visitor's Name</th>
                        <th scope="col">Student's ID</th>
                        <th scope="col">School Name</th>
                        <th scope="col">Schedule Date</th>
                        <th scope="col">Date Requested</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["v_name"]; ?></td>
                                    <td><?php echo $row["schl_id"]; ?></td>
                                    <td><?php echo $row["schl_name"]; ?></td>
                                    <td><?php echo $row["sch_date"]; ?></td>
                                    <td><?php echo $row["date_rqsted"]; ?></td>
                                    <td><?php echo $row["status"]; ?></td>
                                   
                                   
                                    <td><input type="button" name="edit" value="Cancel Schedule" id="<?php echo $row["id"]; ?>" class="btn btn-danger btn-xs edit_data text-light" />
                                </td>  
                               </tr>  
                               <?php  
                               }  
                               ?>  
                    </tbody>
                </table>
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

<?php }
else {
    echo "<script type='text/javascript'>alert('Access Denied!!!')</script>";
} ?>

<!-- Modal for cancel sched-->
<div class="modal fade" id="add_data_Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="add_data_Modal">Cancel Schedule </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form method="post" id="insert_form">  
      <table>
          <p>You are going to cancel schedule of this guest.</p>
            <tr>
              <td> <label>Visitor's Name:</label></td>
              <td> <input class="form-control" type="text" name="vname" id="vname" value="" placeholder="Enter visitor's name" required></td>
            </tr>
            <tr>
              <td> <label>Visitor's Student's ID:</label></td>
              <td> <input class="form-control" type="text" name="studentid" id="studentid" value="" placeholder="Enter student's ID" required></td>
            </tr>
            <tr>
              <td> <label>School:</label></td>
              <td> <input class="form-control" type="text" name="school"  id="school" value=""  placeholder="Enter School" required></td>
            </tr>
            <tr>
              <td> <label>Time-in:</label></td>
              <td><input class="form-control" type="time" name="timein" id="timein" value=""></td>
            </tr>
            <tr>
              <td><label>Time-out:</label></td>
              <td> <input class="form-control" type="time" name="timeout" id="timeout" value=""></td>
            </tr>
            <tr>
              <td><label>Date of Visit</label></td>
              <td><input class="form-control" type="date" name="date" id="date" value="" required></td>
            </tr>
            <tr>
              <td><input type="hidden" name="employee_id" id="employee_id" />  </td>
              <td><input type="submit" name="insert" id="insert" value="Cancel" class="btn btn-danger btn-xs text-light" />  </td>
            </tr>
          </table>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </form>
      </div>
     
    </div>
  </div>
</div>
<script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Submit");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"AAfetch.php", 
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#vname').val(data.v_name);  
                     $('#studentid').val(data.schl_id);  
                     $('#school').val(data.schl_name);  
                     $('#date').val(data.sch_date);  
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Cancel Schedule");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#vname').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#studentid').val() == '')  
           {  
                alert("Student ID is required");  
           }  
           else if($('#school').val() == '')  
           {  
                alert("School is required");  
           }  
           else if($('#date').val() == '')  
           {  
                alert("Date is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"AAinsert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
 });  
 </script>