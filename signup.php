<?php
	if(isset($_POST['submit']))
	{
		include 'databaseconn.php';
		$username = $_POST['username'];
		$password = $_POST['password'];
    // $time = date('Y-m-d H:m:s');
		$sqlquery = "INSERT into userlogin (username, password) values ('$username', '$password')";

		if($result = $conn -> query($sqlquery))
		// if($result = mysqli_query($conn, $sqlquery))
		{
			echo ('<script>alert("   signed up successfully");</script>');
		}
		else
		{
      echo '<script>alert("error signing up retry")</script>';
		}
	}
?>
<html>
<head>
        <header>
        <ul>
          <!-- <img class = "center" src="assets/images/logo/logo.png" alt="logo"> -->
          <li><a href="index.html">Home</a></li>
          <li><a href="login.php">Log in</a></li>
          <li><a href="contactus.php">Contact</a></li>
          <li><a href="about.php">About</a></li>
        </ul>

        </header>
	<script type="text/javascript">
        		// Function to check Whether both passwords 
            // is same or not. 
            function checkPassword(){ 
                password = signupform.password.value; 
                repass = signupform.repass.value; 
                   
                // If same return true.     
                if (password == repass){ 
                     //alert("Password Match: Account created sucessfully") 
                    return true;
                } 
  
                // If not same return false. 
                else{
                    alert ("\nPassword did not match: Please try again...") 
                    // header("Location: signup.php");
                    return false;

                } 
            } 
        	</script>
            <style>
                body {
                  font-family: Arial, Helvetica, sans-serif;
                  background-image: url("assets/images/bg-01.jpg");
                }

                * {
                  box-sizing: border-box;
                }

                /* Add padding to containers */
                .container {
                  padding: 16px;
                  background-color: #0000b3);
                }

                /* Full-width input fields */
                input[type=text], input[type=password] {
                  width: 80%;
                  padding: 15px;
                  margin: 5px 0 22px 0;
                  display: inline-block;
                  border: none;
                  background: #f1f1f1;
                }

                input[type=text]:focus, input[type=password]:focus {
                  background-color: #ddd;
                  outline: none;
                }

                /* Overwrite default styles of hr */
                hr {
                  border: 1px solid #f1f1f1;
                  margin-bottom: 25px;
                }

                /* Set a style for the submit button */
                .registerbtn {
                  background-color: #4CAF50;
                  color: white;
                  padding: 16px 20px;
                  margin: 8px 0;
                  border: none;
                  cursor: pointer;
                  width: 100%;
                  opacity: 0.9;
                }

                .registerbtn:hover {
                  opacity: 1;
                }

                /* Add a blue text color to links */
                a {
                  color: dodgerblue;
                }

                /* Set a grey background color and center the text of the "sign in" section */
                .signin {
                  background-color: #f1f1f1;
                  text-align: center;
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
                  margin-left: 300px;
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

	<title>signup page</title>

	<link rel="stylesheet" type="text/css" href="signup.css">

</head>
<body class = "bgimg" >
            <br>
            <h1 align = "right" style = "margin-right:150px;"><b><u><i>Sign Up Form</b></u></i></h1><br>
  <table style = "border-collapse:collase; background-color:slateblue; margin-right:150px;" align = "right" >
    <form action="signup.php" method="post" id="signupform" name = "signupform" class="container" onsubmit=" return checkPassword()">
            <tr>
            <th>
              <label for="username"><b>Username</b></label>
            </th>
            <th>
              <input placeholder="Enter Username" type="text" name="username" id="username" required="true" pattern="[A-Za-z]{4,12}" ><br>
            </th>
            </tr>
            <tr>
            <th>
              <label for="psw"><br><b>Password</b></label>
            </th>
            <th>
              <input placeholder="Enter Password" type="password" name="password" id="password" required="true" minlength="8" ><br>
            </th>
            <tr>
            <th>
            <label for="psw-repeat"><b>Repeat Password</b></label>
            </th>
            <th>
              <input type="password" placeholder="Re-enter Password" name="repass" id = "repass" required="true" minlength="8"><br>
            </th>
            </tr>
            <tr>
            <th colspan = "2">
            <button type="submit" value="SIGNUP" name="submit" id = "submit" class="buttonsignup">SIGNUP</button>
            </th>
            </tr>
            <tr>
            <th colspan = "2">
            <input type="reset" name="reset" class="buttonsignup">
            </th>
            </tr>
    </form>
  </table>
     <!-- <button type="submit" value="To login" class="buttonsignup"><a href="login.php">TO LOGIN PAGE</a></button> -->

</body>
</html>


