<?php
    session_start();
	if(isset($_POST['submit']))
	{
		include 'databaseconn.php';
		$username = $_POST['username'];
		$password = $_POST['password'];

		$sqlquery = "SELECT username from userlogin where username ='$username' and password = '$password'";
		$result = $conn -> query($sqlquery);
		if($result -> num_rows > 0)
		{
			while($row = $result -> fetch_assoc())
			{
				echo '<h4 style = "color:white;">username:</h4>'.$row['username'] .'<h4 style = "color:white;">logged in</h4>';
                $_SESSION['username'] = $row['username'];
				// print('<ol  type = "I">
				// 	<li><a href="patientdetails.php">click here to enter patient details</a></li>
				// 	<li><a href="deluser.php">click here to delete user </a></li>
				// 	</ol>');
                header("Location: loginrights.php");
			}
			
		}
		else
		{
			 echo '<script>alert("invalid username or password")</script>';
		}
	}
?>
<html>
    <head>
        <title>
            login page
        </title>
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
            .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            }
        </style>

        <link rel="icon" type="image/png" href="assets/images/icons/favicon.ico"/>
        <!--===============================================================================================-->
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
          <link rel="stylesheet" type="text/css" href="assets/css/loginmain.css">
        <!--===============================================================================================-->

        <!-- <link rel="stylesheet" type="text/css" href="login.css"> -->
        <script type="text/javascript">
        	function checkDetails(loginform){
        		username = loginform.username.value;
        		password = loginform.password.value;
        		if (username == '' || password == '') {
        			alert('enter details first');
        			return (false);
        		}
        		else
        			return (true);
        	}
        </script>
        <header>
        <ul>
          <!-- <img class = "center" src="assets/images/logo/logo.png" alt="logo"> -->
          <li><a href="index.html">Home</a></li>
          <li><a href="signup.php">Sign in</a></li>
          <li><a href="contactus.php">Contact</a></li>
          <li><a href="about.php">About</a></li>
        </ul>

        </header>
        

    </head>
    <body class="bgimg">
      <div class="limiter" style="margin-left: 800px; margin-top:100px; bgcolor: slateblue;">
        <div class="container-login100">
          <div class="wrap-login100" >
            <form class="login100-form validate-form" method="post" >
              <span class="login100-form-title p-b-43">
                <h1><b><u><i>Login to continue</b></u></i></h1><br>
              </span>
              <div class="wrap-input100 validate-input" style = "background:slateblue; margin-right:300px;">
                <span class="focus-input100" ></span>
                <span class="label-input100" style = "color:greenyellow;"><b>USERNAME</span>
                <input class="input100" type="text" name="username" required = "true">
              </div>
              <br>
              <div class="wrap-input100 validate-input" data-validate="Password is required" style = "background:slateblue; margin-right:300px;">
                <span class="focus-input100"></span>
                <span class="label-input100" style = "color:greenyellow;">PASSWORD</b></span>
                <input class="input100" type="password" name="password" required = "true">
              </div>

              <!-- <div class="flex-sb-m w-full p-t-3 p-b-32">
                <div class="contact100-form-checkbox">
                  <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                  <label class="label-checkbox100" for="ckb1">
                    Remember me
                  </label>
                </div>
              </div>
              <div> -->
                <button class="buttonsignup" type="submit" name="submit" id="submit" style = "margin-bottom:155px; ">
                  LOGIN
                </button>
              </div>
              </form>
          </div>
        </div>
      </div> 
    <!--===============================================================================================-->
      <script src="assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
      <script src="assets/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
      <script src="assets/vendor/bootstrap/js/popper.js"></script>
      <script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
      <script src="assets/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
      <script src="assets/vendor/daterangepicker/moment.min.js"></script>
      <script src="assets/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
      <script src="assets/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
      <script src="assets/js/loginmain.js"></script>
      <!-- <div class="login">
      	<div class="login-triangle"></div>
    		<h2 class="login-header">Log in</h2>
          <form action="login.php" method="post" class="login-container" id="loginform">
          	<p>username :<input type="text" name="username" id="username"></p>
          	<p>password :<input type="password" name="password" id="password"></p>
          	<p><input type="submit" value="Log in" name="submit" onclick="checkDetails(loginform) "></p>
          	<p><input type="submit" value= "To SignUP" formaction="signup.php"></p>
          	</form>
      </div> -->
    </body>
</html>
