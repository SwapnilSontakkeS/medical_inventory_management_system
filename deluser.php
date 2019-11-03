<!-- this page will delete users -->

<?php
	error_reporting(0);
	if(isset($_POST['submit']))
	{
		include 'databaseconn.php';
		$username = $_POST['username'];
		
		$sqlquery = "DELETE from userlogin where username = '$username'";
		$result = $conn -> query($sqlquery);
		if($result -> num_rows > 0)
		{
            echo '<script>alert("deleted succesfully")</script>';			
		}
		else
		{
			echo '<script>alert("username not found")</script>';
        }
	}
?>

<html>
<head>
	<title>delete users</title>
	<header>
				<ul>
				<!-- <img class = "center" src="assets/images/logo/logo.png" alt="logo"> -->
				<li><a href="index.html">Home</a></li>
				<li><a href="login.php">Log out</a></li>
				<li><a href="contactus.php">Contact</a></li>
				<li><a href="about.php">About</a></li>
				</ul>
    </header>
	<link rel="stylesheet" type="text/css" href="assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="assets/css/util.css">
	<link rel="stylesheet" type="text/css" href="assets/css/main.css">
	<style type="text/css">
		ul {
              list-style-type: none;
              margin: 0;
              padding: 0;
              overflow: hidden;
              background-color: #333;
            }

            .bgimg{
              background-image: url('assets/images/bg-01.jpg');
            }

            li {
              float: RIGHT;
            }

            li a {
              display: inline-block;
              color: white;
              text-align: center;
              padding: 14px 16px;
              text-decoration: none;
            }

            li a:hover {
              background-color: #111;
            }
			body{
				background-image: url('loginbg.jpg');
				background-repeat:no-repeat;
				background-size:cover;
				z-index: -1;	
			}
		.buttonsignup{
            background-color: green;
            color: white;
            padding: 10px 10px;
            text-align: center;
            display: inline-block;
            border-radius: 12px;
            margin: 8px 10px;
            transition: all 0.5s;
            cursor: pointer;
            border: solid;
            border-color: black;
            box-shadow: 10px 10px 5px black;
            font-size: 16px;
            }
            .buttonlogin, .buttonsignup{
                float: inline-start;
                width: 60%;
            }

            .buttonlogin:hover, .buttonsignup:hover{
                background-color: greenyellow ;
                color: black;
            }
            .buttonlogin:active, .buttonsignup:active{
                transform: translateY(6px);
                
            }
	</style>
	<script>
		function confirmDelete(){
			var bool = confirm("do you really want to delete the user: ");
			return bool;
		}
			
	</script>
</head>
<body style = "background-color:powderblue;" class = "bgimg">
		<div style = "margin-left: 720px;" >
		<br>
				<span class="login100-form-title p-b-41" style = "margin-left: -100px; font-size:50px;">
					<i><b><u>Delete User</u></b></i>
				</span>
				<form action="deluser.php" method="post" id="deluser" name = "deluser" onsubmit=" return confirmDelete()">
					<div class="wrap-input100 validate-input" data-validate = "Delete User" style="background-color: lightblue; width:500px;" >
						<input class="input100" required = "true" type="text" name="username" placeholder="enter Username to delete">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="container-login100-form-btn m-t-32" >
						<button class="buttonsignup" type="submit" name="submit" style = "margin-left:-150px;">
							Delete
						</button>
						<br>
						
					</div>
					<button style = "width:28%; margin-left:50px; " class = "buttonsignup" type="submit" name="loginrights" id="loginrights" onclick='window.location.replace("loginrights.php");' >Back</button>
					<button style = "width:28%; "class = "buttonsignup" type="submit" name="logout" id="logout" onclick='window.location.replace("login.php");' >Logout</button>

				</form>
		</div>

		<!-- <div id="dropDownSelect1"></div> -->
		
	<!--===============================================================================================-->
		<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/bootstrap/js/popper.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/daterangepicker/moment.min.js"></script>
		<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
		<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
		<script src="js/main.js"></script>


		<!-- <form action="deluser.php" method="post" id="deluser">
			<input placeholder="Enter username to be deleted" type="text" name="username" id="username" required="true"><br>
			<button type="submit" name="submit" >delete user</button>
		</form> -->
</body>
</html>