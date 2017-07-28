<?php
include('STD_Con.php');
$roomNO = $_GET['key'];
$sql_STDRoom = "SELECT reg_no FROM student_hostel WHERE room_no = '$roomNO'";
$result = $conn->query($sql_STDRoom);
if($result->num_rows>0)
{
    ?>
    <select name="reg2" class="form-control" style="width:100%"">
    <option selected disabled hidden>Select Room</option>
    <?php
    while ($row = $result->fetch_assoc())
    {
        $reg2 = $row['reg_no'];
?>
        <option value="<?php echo $reg2 ; ?>"> <?php echo $reg2?></option>
<?php
    }
}
?>