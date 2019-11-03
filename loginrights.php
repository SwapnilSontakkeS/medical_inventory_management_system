<?php
	// session_start();
	if(isset($_POST['submit']))
	{
		include 'databaseconn.php';
		if($logout = $_POST['logout'])
		{
			header('location : login.php');
			echo "<script>alert('logging out sucess');</script>";
			session_destroy();
			
		}
		else
		{
			echo "<script>alert('error logging out');</script>";
		}
		
	}
	

?>

<html>
	<head>
		<title>login rights</title>
		<header>
			<ul>
			<!-- <img class = "center" src="assets/images/logo/logo.png" alt="logo"> -->
			<li style = "float: right;"><a href="index.html">Home</a></li>
			<li style = "float: right;"><a href="login.php">Log out</a></li>
			<li style = "float: right;"><a href="contactus.php">Contact</a></li>
			<li style = "float: right;"><a href="about.php">About</a></li>
			</ul>
        </header>
		<style type="text/css">
			ul {
              list-style-type: none;
              margin: 0;
              padding: 0;
			  width: 100%;
              overflow: hidden;
              background-color: #333;
            }

            .bgimg{
              background-image: url('assets/images/bg-01.jpg');
            }

            li {
              float: LEFT;
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
				background-image:url(patientdetails.jpg);
				background-repeat:no-repeat;
				background-size:cover;
				
			}
			li{
				color:indigo;
				list-style-position:inside;

			}
			a:link
			{
				color:indigo;
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
		
	</head>
	<body>
		<form method = 'post' style = "padding-left:800px;">
			<!-- <a href="patientdetails.php">click here to enter patient details</a><br>
			<a href="deluser.php">click here to delete user </a><br>
			<a href="stockdetails.php">click here to enter stock </a> -->
			<br>
			<ol  align="center" >
				<li style = "font-size:50px;"><a href="patientdetails.php">Enter Patient details</a></li>
				<li style = "font-size:50px;"><a href="shop.php">Sell medicine</a></li>
				<li style = "font-size:50px;"><a style = "color:white;" href="updatestock.php">Update Stock</a></li>
				<li style = "font-size:50px;"><a href="stockdetails.php">Enter Stock details</a></li>
				<li style = "font-size:50px;"><a href="deluser.php">Delete user details </a></li>
				<li style = "font-size:50px;"><a style = " color:white;" href="feedback.php">Feedback</a></li>
			</ol>
			<br><br>
			<div>
			<button type="submit" name="logout" id="logout" formaction="login.php" class="buttonsignup">LOGOUT</button>
			</div>
		</form>
	</body>
</html>