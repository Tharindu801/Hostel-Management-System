<!-- session -->
<?php 
  include("../../lib/session.php");
  if(!isset($ses_conform))
  {
    header('Location: ../../index.php');
  }
 ?>
 <!-- Page Start -->
<!-- Student View -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Student Details</title>
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script type="text/javascript">
    function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#pro_pic')
                        .attr('src', e.target.result)
                        // .width(150)
                        // .height(200);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }


    function 	getStData(key) {
        $.get("../../lib/HOS_selectSTD.php?key="+key, function(data, status){
            document.getElementById("roomSTD").innerHTML = data;
        });
    }
  </script>
  <style>
    .upper{
      color:#E2F1FD;
      text-align: center;
    }
  .frame{
    width: 100%;
      height:100%;
    border:none;
    border-radius:10px;
  }
  .iFlip{
    transform:scaleX(-1);
    -moz-transform:scaleX(-1);
    -webkit-transform:scaleX(-1);
    -ms-transform:scaleX(-1);
  }
  .left
  {
    width: 40%;
  }
  .right
  {
    width: 60%;
  }
  td
  {
    padding: 3px;
  }
  </style>
<!-- Php for connecting and get methord -->
<?php 
  include('../../lib/STD_Con.php');
  $key = $_GET['key'];
  $hid=$_SESSION['hostel_id'];

  $sql="SELECT * FROM student_detail WHERE reg_no='".$key."';";
  $result = $conn->query($sql);
  // Select available room
  $sql_room = "SELECT * FROM hostel_room WHERE Hos_ID='$hid' AND `max_Cap` >`cur_Amount`;";
  $result_room = $conn->query($sql_room);

  if ($result->num_rows > 0)
  {
    while($row = $result->fetch_assoc())
    {
      $regNo = $row['reg_no'];
      $fName = $row['full_name'];
      $faculty=$row['faculty'];
      $course=$row['course'];
    }
  }
$sql_previousRoom = "SELECT room_no FROM student_hostel WHERE reg_no = '$regNo'";
$res_prev = $conn->query($sql_previousRoom);
if($res_prev->num_rows>0)
{
    while($row_prev = $res_prev->fetch_assoc())
    {
        $prev_room = $row_prev['room_no'];
    }
}
?>
<!-- Methords for btns -->
<script>
    
</script>
</head>

<body>
  <div class="col-sm-4"></div>
  <div class="col-sm-4" style="padding-top: 5px">
  <!-- panal start -->
  <div class="panel panel-primary">
    <div class="panel-heading"><h4 align="center">Add Student to Room</h4></div>
    <div class="panel-body">
    <!-- Show Student Data -->
      <form class="form-inline" action="../../lib/Hos_swap.php" method="POST">
        <table>
          <tr>
            <td class="left">Reg No.</td>
            <td class="right"><input type="text" class="form-control" name="regNo" value="<?php echo "$regNo"; ?>"></td>
            <!-- <input type="text" class="form-control" name="regNo1" value="<?php echo "$regNo"; ?>"> -->
          </tr>
          <tr>
            <td class="left">Full Name</td>
            <td class="right"><input type="text" class="form-control" name="fName" disabled="disabled" value="<?php echo "$fName"; ?>" ></td>
          </tr>
           <tr>
            <td class="left">Select Room:</td>
            <td class="right">
               <select name="new_room_no" class="form-control" style="width:100%" onchange="getStData(this.value)">
                  <option selected disabled hidden>Select Room</option>
                  <?php
                

        foreach ($result_room as $rNo )
        {
        ?>

           <option value="<?php echo $rNo["Room_ID"] ; ?>"> <?php echo $rNo["Room_ID"] ?></option>
          <?php $_SESSION['$room_no']=$rNo["Room_ID"]; ?>
      <?php
        }
        ?>

    </select>
            </td>
          </tr>
          <tr>
              <td>
                  Select Student
              </td>
              <td>
                  <div id="roomSTD"></div>
              </td>
          </tr>
        </table>
          <input type="text" id="prev_Room" name="prev_Room" hidden value="<?php echo $prev_room?>">
      <!-- Buttons -->
        <p align="right"><a href="withoutRoom.php?" class="btn btn-danger">Cancel</a>
        <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-save"></i>&nbsp;Save</button>
        </p>
      </form>
   
    </div>
  </div>
  </div>
  <div class="col-sm-4"></div>
</body>
</html>
