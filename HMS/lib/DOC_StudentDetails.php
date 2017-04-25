<?php
$key = $_GET["key"];
include('STD_Con.php');
//Query
	$sql = "SELECT s.reg_no, s.name_initial, s.nic, c.resedential_adress, c.contact_no FROM student_detail as s, student_contact as c, student_hostel as h WHERE s.reg_no = c.reg_no and s.reg_no = h.reg_no and h.hostel_id = '$key';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		// title
		echo "<h4 align=\"center\">Medical Student's Boys Hostel -39 batch</h4>
				<h5 class=\"pull-left\">39-batch</h5>
				";
		// output data of each row
		//create table
		echo "<table class=\"table table-bordered table-fixed\">
		<thead>
    		<tr>
    		<th class=\"col-xs-1\">No</th>
    		<th class=\"col-xs-2\">Name of Student</th>
    		<th class=\"col-xs-1\">Nic No</th>
    		<th class=\"col-xs-1\">Reg. No.</th>
    		<th class=\"col-xs-1\">adm. date</th>
    		<th class=\"col-xs-1\">room No</th>
    		<th class=\"col-xs-3\">Address</th>
    		<th class=\"col-xs-2\">Contact No.</th>
    		</tr>
    		</thead>
    		<tbody>";
    		$count = 1;
		while($row = $result->fetch_assoc()) {
		echo"
		<tr id=\"".$row["reg_no"]."\" onclick=\"Redirect(this.id)\">
		<td class=\"col-xs-1\">".$count."</td>
		<td class=\"col-xs-2\">".$row["name_initial"]."</td>
		<td class=\"col-xs-1\">".$row["nic"]."</td>
		<td class=\"col-xs-1\">".$row["reg_no"]."</td>
		<td class=\"col-xs-1\"></td>
		<td class=\"col-xs-1\"></td>
		<td class=\"col-xs-3\">".$row["resedential_adress"]."</td>
		<td class=\"col-xs-2\">".$row["contact_no"]."</td></tr>
		";
		$count++;
		}
		echo "
			</tbody></table>";
		}
		else
		{
			echo "<table class=\"table table-bordered\">
    			<tr>
    			<th>Reg. No.</th><th>Full Name</th><th>Year</th><th>faculty</th><th>Course</th>
    			</tr>
    			<span id></span>
    			</table>";
		}
?>	