<?php  
 $connect = mysqli_connect("localhost", "root", "", "library");  
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $vname = mysqli_real_escape_string($connect, $_POST["vname"]);  
      $studentid = mysqli_real_escape_string($connect, $_POST["studentid"]);  
      $school = mysqli_real_escape_string($connect, $_POST["school"]);  
      $date = mysqli_real_escape_string($connect, $_POST["date"]);  
      $date_rquested = date('Y-m-d');
      $status = "Pending";
      if($_POST["employee_id"] != '')  
      {  
           $query = "  
           UPDATE tb_sched  
           SET   
           status = 'Canceled'   
           WHERE id='".$_POST["employee_id"]."'";  
           $message = 'Schedule Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO tb_sched(v_name, schl_id, schl_name, sch_date, date_rqsted, status)  
           VALUES('$vname', '$studentid', '$school', '$date','$date_rquested', '$status');  
           ";  
           echo "<script type='text/javascript'>alert('Schedule Created! You can check it on Request Approval')</script>";
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM tb_sched WHERE status = 'Pending' ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-hover">  
                     <tr>  
                         <th>Request ID</th>
                         <th>Visitors Name</th>
                         <th>Students ID</th>
                         <th>School Name</th>
                         <th>Schedule Date</th>
                         <th>Date Requested</th>
                         <th>Status</th>
                         <th>Action</th>
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["id"] . '</td>  
                          <td>' . $row["v_name"] . '</td> 
                          <td>' . $row["schl_id"] . '</td>
                          <td>' . $row["schl_name"] . '</td>  
                          <td>' . $row["sch_date"] . '</td>  
                          <td>' . $row["date_rqsted"] . '</td>  
                          <td>' . $row["status"] . '</td>  
                       
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
                          <td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>
 