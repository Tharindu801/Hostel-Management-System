<?php
include('STD_Con.php');
$id = $_GET['id'];
$msg="";
if(isset($id))
{
	// Query for delete user
	$getDT = "SELECT `type` FROM `user_details` WHERE user_id = '$id';";
	$sql="DELETE FROM `user_details` WHERE `user_id`='$id';";
	$Update_W = "UPDATE hostel_staff SET warden_id = 'no' WHERE warden_id = '$id';";
	$Update_S = "UPDATE hostel_staff SET subwarden_id = 'no' WHERE subwarden_id = '$id';";
}
// run the query
$res_getDT = $conn->query($getDT);
if ($res_getDT->num_rows>0){
	while($row = $res_getDT->fetch_assoc()) 
    		{
    			$type = $row["type"];
    		}
if($type == 'warden')
{
if($conn->query($sql) === TRUE && $conn->query($Update_W))
{
	$msg = "<div class=\"msgStrip alert alert-danger\" id=\"alert\">User Have been deleted success fully !</div>";

}
else
{
	$msg = "<div class=\"msgStrip alert alert-danger\" id=\"alert\">Sorry! your command did not complete.</div>";
}
}
elseif($type == 'subwarden')
{

if($conn->query($sql) === TRUE && $conn->query($Update_S))
{
	$msg = "<div class=\"msgStrip alert alert-danger\" id=\"alert\">User Have been deleted success fully !</div>";

}
else
{
	$msg = "<div class=\"msgStrip alert alert-danger\" id=\"alert\">Sorry! your command did not complete.</div>";
}
}
else
{
	if($conn->query($sql) === TRUE)
{
	$msg = "<div class=\"msgStrip alert alert-danger\" id=\"alert\">User Have been deleted success fully !</div>";

}
else
{
	$msg = "<div class=\"msgStrip alert alert-danger\" id=\"alert\">Sorry! your command did not complete.</div>";
}
}
}
header("Location: ../Pages/main_admin/staff_view.php?alrt=$msg");

?>