<?php
include('STD_Con.php');
// basic info
$hid=$_POST["hid"];
$hname = $_POST["hname"];
$Ocontact = $_POST["Ocontact"];
$oaddress = $_POST["oaddress"];
$Gender = $_POST["Gender"];
$capasity = $_POST["capasity"];
$contact_no=$_POST["Ocontact"];
$pay = $_POST["pay"];

$sql = "INSERT INTO hostel_detail (id,name,address,contact_no,capacity,available,category, anual_payment) VALUES ('".$hid."','".$hname."', '".$oaddress."','".$contact_no."','".$capasity."',  '".$capasity."', '".$Gender."', '$pay');";

$sql_staff = "INSERT INTO hostel_staff(hostel_id,warden_id,subwarden_id) VALUES ('$hid', 'no' ,'no')";

// 	$handle = fopen($_FILES['filename']['tmp_name'], "r");
//  	$c = 0;
	
// 	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
// 	{
// 		// to avoid title row
// 		if ($c != 0) 
// 		{
// 		//sql for basic student details
// 			$sql_room = "INSERT INTO Hostel_Room (Room_ID, Hos_ID, max_Cap, cur_Amount) VALUES ('".$data[0]."', '".$hid."', '".$data[0]."',0);";
// 		}	
// 	$c++;
// 	}
 
// fclose($handle);
// // //print "Import done"
// echo "<script type='text/javascript'>alert('Successfully Imported a CSV File for User!');</script>";
// echo "<script>document.location='../Pages/Student/index.php'</script>";
//view upload form


// run sql
if ($conn->query($sql) === TRUE && $conn->query($sql_staff)==TRUE) {
// run sql
if ($conn->query($sql) === TRUE && $conn->query($sql_staff)==TRUE) {
	
	header("Location: ..\Pages\main_admin\index.html");
} 
else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
}
?>