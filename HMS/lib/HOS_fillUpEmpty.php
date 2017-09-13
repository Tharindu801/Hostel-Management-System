<?php
$regNo=$_GET["key"];
$sql_std="SELECT * FROM student_detail WHERE reg_no='$regNo';";
  $result_std = $conn->query($sql_std);

if ($result_std->num_rows > 0)
{
    while($row = $result_std->fetch_assoc())
    {
        $fName = $row['full_name'];
        $faculty=$row['faculty'];
        $course=$row['course'];
    }
}
?>
<table>
    <tr>
        <td class="left">Full Name</td>
        <td class="right"><input type="text" class="form-control" name="fName" disabled="disabled" value="<?php echo "$fName"; ?>" ></td>
    </tr>
    <tr>
        <td class="left">Faculty</td>
        <td class="right"><input type="text" class="form-control" name="faculty" disabled="disabled" value="<?php echo "$faculty"; ?>" ></td>
    </tr>
    <tr>
        <td class="left">Course</td>
        <td class="right"><input type="text" class="form-control" name="course" disabled="disabled" value="<?php echo "$course"; ?>" ></td>
    </tr>
    <tr>
        <td class="left">Select Room:</td>
        <td class="right"><input type="text" class="form-control" name="hostel" disabled="disabled" value="<?php echo "$key"; ?>" ></td>
    </tr>

</table>
