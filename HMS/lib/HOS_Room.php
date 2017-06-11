<?php
$key = $_GET["key"];
include("session.php");
include('STD_Con.php');
$hid=$_SESSION['hostel_id'];
//Query
	$sql = "SELECT * FROM hostel_room WHERE Hos_ID = '$hid';";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		//create table
		echo "<table class=\"table table-hover\">
			<thead>
    		<tr>
    		 <th lass=\"col-xs-4\">Room. No.</th><th lass=\"col-xs-2\">Max Capacity</th><th lass=\"col-xs-2\">Current</th>
    		</tr>
    		</thead>
    		<tbody>";
		while($row = $result->fetch_assoc()) {
		echo"<tr id=\"".$row["Room_ID"]."\" onclick=\"Redirect(this.id)\">
				<td class=\"col-xs-4\">".$row["Room_ID"]."</td>
				<td class=\"col-xs-2\">".$row["max_Cap"]."</td>
				<td class=\"col-xs-2\">".$row["cur_Amount"]."</td>
			</tr>";
		}
		echo "
			</tbody>
			</table>";
		}
		else
		{
			echo "<table class=\"table table-hover\">
    			<tr>
    			<th>Room. No.</th><th>Max Capacity</th><th>Current</th>
    			</tr>
    			<span id></span>
    			</table>";
		}
?>