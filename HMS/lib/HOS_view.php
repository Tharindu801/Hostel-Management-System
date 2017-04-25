
<?php 
  include("../../lib/session.php");
  if(!isset($ses_conform))
  {
    header('Location: ../../index.php');
  }

   
 ?>



<?php
include('STD_Con.php');
$key = $_GET['key'];

$sql_hostel ="SELECT * FROM hostel_detail WHERE id='".$key."';";
$sql_warden = "SELECT s.warden_id, u.Name FROM user_details as u, hostel_staff as s WHERE s.warden_id = u.user_id AND s.hostel_id = '$key';";
$sql_subW = "SELECT s.subwarden_id, u.Name FROM user_details as u, hostel_staff as s WHERE s.subwarden_id = u.user_id AND s.hostel_id = '$key';";
	//student_hostel
	//$result_pay = $conn->query($sql_payment);
	        $result_hos = $conn->query($sql_hostel);
	$res_war = $conn->query($sql_warden);
	$res_sub = $conn->query($sql_subW);


if ($result_hos->num_rows > 0)
	{
		while($row = $result_hos->fetch_assoc())
		{
			$hosid     = $row['id'];
			$name      = $row['name'];
			$address   = $row['address'];
			$capacity  = $row['capacity'];
			$available = $row['available'];
			$ContactNo = $row['contact_no'];
			$anualPay  = $row['anual_payment'];
			$cat       = $row['category'];
		}
	}

	if ($res_war->num_rows > 0)
	{
		while($row = $res_war->fetch_assoc())
		{
			$warId  = $row['warden_id'];
			$wrName = $row['Name'];
		}
	}

	if ($res_sub->num_rows > 0)
	{
		while($row = $res_sub->fetch_assoc())
		{
			$subId   = $row['subwarden_id'];
			$subName = $row['Name'];
		}
	}
	if(!isset($warId, $wrName))
	{
			$warId = '';
			$wrName = '';
	}

	if(!isset($subId, $subName))
	{
			$subId = '';
			$subName = '';
	}
?>