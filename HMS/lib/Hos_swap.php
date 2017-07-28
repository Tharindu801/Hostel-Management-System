<?php
$reg1 = $_POST['regNo'];
$reg2 = $_POST['reg2'];
$room1 = $_POST['prev_Room'];
$room2 = $_POST['new_room_no'];

if(isset($reg1,$reg2,$room1,$room2))
{
    $sql1 = "UPDATE student_hostel SET room_no = '$room2' WHERE reg_no = '$reg1'";
    $sql1 = "UPDATE student_hostel SET room_no = '$room1' WHERE reg_no = '$reg2'";
}
?>