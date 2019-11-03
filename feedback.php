<?php

	if(isset($_POST['submit']))
	{
		include 'databaseconn.php';
		$experience = $_POST['experience'];
        $comments = $_POST['comments'];
        $name = $_POST['name'];

		$sqlquery = "INSERT INTO feedback (experience, comments, name) values ('$experience', '$comments', '$name')";
		
		if($result = $conn -> query($sqlquery))
		// if($result = mysqli_query($conn, $sqlquery))
		{
			echo "<script>window.alert('posted sucessfully');</script>";
		}
		else
		{
			die("error occured\n".mysqli_error($conn));
		}
	}
?>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Feedback Form</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
        <link rel="stylesheet" href="form.css" >
        <script src="form.js"></script>
        <header>
				<ul>
				<!-- <img class = "center" src="assets/images/logo/logo.png" alt="logo"> -->
				<li><a href="index.html">Home</a></li>
				<li><a href="login.php">Log out</a></li>
				<li><a href="contactus.php">Contact</a></li>
				<li><a href="about.php">About</a></li>
				</ul>
        </header>
        <style>
            ul {
              list-style-type: none;
              margin: 0;
              padding: 0;
              overflow: hidden;
              background-color: #333;
            }

            .bgimg{
              background-image: url('bg-01.jpg');
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
    </head>
    <body class="bgimg">
            
        <div class="container" style = "margin-left:300px;">
            <!-- <div class="bgimg"></div> -->
            <div class="row " style="margin-top: 50px">
                <div class="col-md-6 col-md-offset-3 form-container" style = "margin-left:450px; border-style:solid; background-color: slateblue;">
                    <h2>Feedback</h2> 
                    <p> Please provide your feedback below: </p>
                    <form role="form" method="post" id="reused_form">
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label>How do you rate your overall experience?</label>
                                <p>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="bad" >
                                        Bad 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="average" >
                                        Average 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="experience" id="radio_experience" value="good" >
                                        Good 
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <label for="comments"> Comments:</label>
                                <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 form-group">
                                <label for="name"> Your Name:</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                            <!-- <div class="col-sm-6 form-group">
                                <label for="email"> Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div> -->
                        </div>
                        <div class="row">
                            <div class="col-sm-12 form-group">
                                <button type="submit" class="buttonsignup" style="width: 80%; margin-left:30px;" name = "submit">Post</button>
                            </div>
                        </div>
                        <button style = "width:38%; margin-left:30px; " class = "buttonsignup" type="submit" name="loginrights" id="loginrights" onclick='window.location.replace("loginrights.php");' >Back</button>
            			<button style = "width:37%; "class = "buttonsignup" type="submit" name="logout" id="logout" onclick='window.location.replace("login.php");' >Logout</button>
                    </form>
                    <!-- <div id="success_message" style="width:100%; height:100%; display:none; "> <h3>Posted your feedback successfully!</h3> </div>
                    <div id="error_message" style="width:100%; height:100%; display:none; "> <h3>Error</h3> Sorry there was an error sending your form. </div> -->
                </div>
            </div>
        </div>
    </body>
</html>