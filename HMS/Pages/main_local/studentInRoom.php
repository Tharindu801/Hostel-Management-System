<?php
include("../../lib/session.php");
include('../../lib/STD_Con.php');
$hid=$_SESSION['hostel_id'];
$Room_ID = $_GET['key'];
//Query
	$sql = "SELECT reg_no FROM student_hostel WHERE room_no = '$Room_ID';";
	$result = $conn->query($sql);
    $count = 0;
	if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $reg_Nos[$count] = $row['reg_no'];
            $count++;
        }
        if (isset($reg_Nos)) {
        for ($i=0; $i<$count; $i++){
//            For student details
                $sql_Details = "SELECT full_name, faculty, course, year_of_study FROM student_detail WHERE reg_no = '".$reg_Nos[$i]."'";
              $res_details = $conn->query($sql_Details);
              if($res_details->num_rows >0){
                  $regNo = $reg_Nos[$i];
                  $details_row = $res_details->fetch_assoc();
                  $name = $details_row['full_name'];
                  $faculty = $details_row['faculty'];
                  $course = $details_row['course'];
                  $year = $details_row['year_of_study'];

                  echo "<div id=\"basic\" class=\"panel panel-primary col-md-4\"><div class=\"panel-heading\"><b>$regNo</b></div><div class=\"panel-body\"><img src=\"../../lib/STD_img.php?key=$regNo\" class=\"img-thumbnail\" height=\"300px\" width=\"300px\">";
                  echo "<h5>Name:$name</h5>";
                  echo "<h5>Faculty:$name</h5>";
                  echo "<h5>Course:$name</h5>";
                  echo "<h5>Acadamic Year: $name</h5>";
                  echo "</div><div></div>";
              }
            }

    }
    }
?>