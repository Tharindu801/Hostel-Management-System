<!-- session -->
<?php
  include("lib/session.php");
  if(!isset($ses_conform))
  {
    header('Location: index.php');
  }
  $a=$_SESSION['userState'];
 if ($a=="yes") {
     header("location:Pages/User/FristTimeLog.php");
   }

   $utype=$_SESSION['usertype'];

   if($utype=="admin")
   {
     $path="Pages/main_admin/index.php";
   }
   else
   {
      $path="Pages/main_local/index.php";
   }

 ?>
 <!-- Page Start -->
<!DOCTYPE html>
<html lang="en">
<head>

  <title>Hostel Management System- jfn.ac.lk</title>
  <link rel="icon" href="Images/HMS-Logo.png" />
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/navbar.css">
  <script src="js/jquery-3.1.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <style>
    .row.content {

      position: fixed;
    top: 0;
     right: 0;
      bottom: 0;
       left: 0;
    }

    /* Set gray background color and 100% height */


    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }

    .upper{
      color:#E2F1FD;
      text-align: center;
		}
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      .row.content {height: auto;}
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
	<!--scroll bar-->
}

  </style>


  <script type="text/javascript">
    

    
  </script>
</head>
<body>
<?php echo "$utype";?>
<!-- Page Content Start -->
<div class="container-fluid">
  <div class="row content">
<!-- Navbar Code Start -->
<div id="custom-bootstrap-menu" class="navbar navbar-default navbar-static-top" role="navigation">
<!-- title of page -->
<h1 class="upper"><B><i>Hostel Management System</b></i></h1>
  <div class="container-fluid">
      <!-- NavBar Logo -->
      <div class="navbar-header"><a class="navbar-brand"><img src="Images/HMS-Logo.png"></a>
      <!-- Button for make nava bar responsive(Collaps navbar) -->
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-menubuilder"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>
          </button>

      </div>
      <!-- Nav bar components -->
      <!-- Left side comps -->
      <div class="collapse navbar-collapse navbar-menubuilder">
          <ul class="nav navbar-nav navbar-left">
          <li><a href="<?php echo "$path";?>?"  target="mainCntnt" ><span class="glyphicon glyphicon-home pull-left"></span>&nbsp;Home</a></li>
          <li><a href="Pages/Student/index.php?" target="mainCntnt"  ><span class="glyphicon glyphicon-user pull-left" style="text-align:left"></span>&nbsp;Student</a></li>
          <li><a href="Pages/Payment/index.php" target="mainCntnt" ><span class="glyphicon glyphicon-usd pull-left"></span>&nbsp;Payment</a></li>
          <li><a href="Pages/Hostel/index.php" target="mainCntnt" ><span class="glyphicon glyphicon-header pull-left"></span>&nbsp;Hostel</a></li>
          <!-- <li><a href="http://google.com" target="mainCntnt" ><span class="glyphicon glyphicon-bed pull-left"></span>&nbsp;Inventry</a></li> -->
          <li><a href="Pages/Document/index.php" target="mainCntnt" ><span class="glyphicon glyphicon-print"></span>&nbsp;Document</a></li>
          </ul>
          <!-- Right side comps -->
          <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
      <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><?php echo $ses_name; ?><span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="Pages/User/ChangeUserNm.php"><span class="glyphicon glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Change User name</a></li>
        <li><a href="Pages/User/ChangePW.php"><span class="glyphicon glyphicon glyphicon-cog"></span>&nbsp;&nbsp;Change Password</a></li>
      </ul>
    </li>
            <li><a href="lib/logout.php"><span class="glyphicon glyphicon-log-out pull-left"></span> Log Out &nbsp;&nbsp;</a></li>
          </ul>
      </div>
  </div>
</div><!-- Navbar Ends Here -->
<!-- iFrame Start -->
    <div class="container" style="height:100%" >
        
     <iframe name="mainCntnt" src="<?php echo "$path";?>?" class="frame" />
    </div>
  </div>
</div>

<footer class="container-fluid">
  <p>Footer Text</p>
</footer>
</body>
</html>
