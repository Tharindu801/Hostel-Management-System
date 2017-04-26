<!-- session -->
<?php
  include("../../lib/session.php");
  if(!isset($ses_conform))
  {
    header('Location: ../../index.php');
  }
    include ('../../lib/STD_Con.php');
 ?>
 <!-- Page Start -->
<?php
include('../../lib/STAFF_add.php'); // Includes Login Script

?>
<!DOCTYPE html>
<html >

<head>
  <meta charset="UTF-8">
  <title>Add New User</title>
  <link rel="stylesheet" href="../../css/bootstrap.min.css">
  <script src="../../js/jquery-3.1.1.min.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="../../css/navbar.css">
  <style type="text/css">
    .msgStrip{
      padding: 4px;
      text-align: center;
    }
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
  td{
    padding:3px;
  }
  </style>

  <script type="text/javascript">
  
 function  getHosStaffData(key) {
  if(key != 'admin')
   {
     $.get("hostel_select.php?key="+key, function(data, status){
        document.getElementById("hos").innerHTML = data;
    });
   }
   else
   {
      document.getElementById("hos").innerHTML = '';
   }
    
  }

  </script>
</head>

<body>


</div><!-- Navbar Ends Here -->
  <div class="col-sm-2"></div>
  <div class="col-sm-8" style="padding-top: 5px">
  <!-- panal start -->
  <div class="panel panel-primary">
    <div class="panel-heading"><h4 align="center">Create new user</h4></div>
    <div class="panel-body">
      <form class="form-group" method="post" action="user.php">
      <!-- user name -->
        <table>
          <tr>
            <td>
              <label class="control-label">ID</label>
            </td>
             <td>
                <input type="text" name="idNo" class="form-control" required></p> 
            </td>
          </tr>
          <tr>
            <td>
              <label class="control-label">Name</label>
            </td>
            <td>
              <input type="text" name="userNm" class="form-control" required>
            </td>
          </tr>
          <tr>
            <td>
              <label class="control-label">Tempery Password</label>
            </td>
            <td>
              <input type="Password" name="newPassword" class="form-control" required>
            </td>
          </tr>
          <tr>
            <td>
              <label class="control-label">confirm temp Password</label>
            </td>
            <td>
               <input type="Password" name="confPassword" class="form-control" required>
            </td>
          </tr>
          <tr>
            <td>
              <label class="control-label"> Type : </label>
            </td>
            <td>
              <select name="type" class="form-control" onchange="getHosStaffData(this.value)" required="required">
                <option value="admin">Admin</option>
                <option value="warden"/>Warden</option>
                <option value="subwarden">SubWarden</option>
              </select>
            </td>
            <tr id="hos"></tr>
          </tr>
          </table>
         

        
        <div class="<?php echo $UaP; ?>"
        
        <!-- current pasword -->
        
        <div class="<?php echo $UaP; ?>"></div>
        <div class="<?php echo $NP; ?>"></div>
        <div class="<?php echo $NP; ?>"></div>
        <!-- Show error message -->
        <?php echo $error; ?>
        <!-- form buttons -->
        <p align="right"><a href="index.php" class="btn btn-danger">Cancel</a> <input type="submit"  name="submit" class="btn btn-primary" value="Create"></p>
      </form>
    </div>
  </div>
  </div>

  <div class="col-sm-2"></div>
</body>
</html>
