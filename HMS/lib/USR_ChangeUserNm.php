<?php
include('STD_Con.php');
$error='';
$UaP = '';
$NU = '';
if(isset($_POST['submit']))
{
	if (empty($_POST['userNm']) || empty($_POST['Password']) || empty($_POST['newUserNm']) || empty('CnewUserNm'))
	{
		$error = "<div class=\"msgStrip alert alert-danger\">You may not keep any field blank</div>";
		$UaP = 'has-error';
		$NU = 'has-error';
	}
	else
	{
		$userNm = $_POST['userNm'];
		$pw 	= $_POST['Password'];
		$nuser 	= $_POST['newUserNm'];
		$Cnuser	= $_POST['CnewUserNm'];
		// strip slash paswords
		$pw  = stripslashes($pw);
		// MD5 for password
		$pw = md5($pw);
		// Check the given user name is right
		$checkQuery = $conn->query("SELECT * FROM user_details WHERE pasword='$pw' AND UserName='$userNm'");
		$rows = $checkQuery->num_rows;
		if ($rows != 1)
		{
			$error = "<div class=\"msgStrip alert alert-danger\">User name and password is wrong, try again</div>";
			$UaP = 'has-error';
		}
		else
		{
			// if username is ok. check new user name is already in database or not
			$checkQuery = $conn->query("SELECT * FROM user_details WHERE UserName='$nuser'");
			$rows1 = $checkQuery->num_rows;
			if ($rows1 > 0)
			{
				$error = "<div class=\"msgStrip alert alert-danger\">New Username is already excists</div>";
				$NU = 'has-error';
			}
			// check wether new user name & confirm is match 
			elseif ($nuser == $Cnuser) 
			{
				$sql = "UPDATE user_details SET UserName = '$nuser' WHERE UserName='$userNm';";
				if ($conn->query($sql) === TRUE)
				{
					if(session_destroy()) // Destroying All Sessions
					{
						header("Location: ../../index.php"); // Redirecting To Home Page
					}
				}
			}
			else
			{
				$error = "<div class=\"msgStrip alert alert-danger\">Username and confirm username is not match</div>";
				$NU = 'has-error';
			}
		}
	}
}
?>
