<?php  
 if(isset($_POST["employee_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "library");  
      $query = "SELECT * FROM tb_sched WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Visitor Name:</label></td>  
                     <td width="70%">'.$row["v_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Student ID</label></td>  
                     <td width="70%">'.$row["schl_id"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>School Name</label></td>  
                     <td width="70%">'.$row["schl_name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Schedule Date</label></td>  
                     <td width="70%">'.$row["sch_date"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Date Requested</label></td>  
                     <td width="70%">'.$row["date_rqsted"].' </td>  
                </tr>  
                <tr>  
                <td width="30%"><label>Status</label></td>  
                <td width="70%">'.$row["status"].' </td>  
           </tr>  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
 