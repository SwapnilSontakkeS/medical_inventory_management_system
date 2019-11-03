<?php
	session_start();
	if(isset($_POST['submitted']))
	{
		include 'databaseconn.php';

		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		// $doctorsname = $_POST['doctorsname'];
		$mobilenumber = $_POST['mobilenumber'];
		$gender = $_POST['gender'];
		// $birthdayday = $_POST['birthdayday'];
		// $birthdaymonth = $_POST['birthdaymonth'];
		// $birthdayyear = $_POST['birthdayyear'];
		$dob = $_POST['dob'];
		

		// $sqlquery = " SELECT * FROM userlogin ";

		// // find which user is currently logged in

		// $result = $conn->query($sqlquery);
		// if ($result->num_rows > 0) {
		// 	    while($row = $result->fetch_assoc()) {

		// 	    	// $username = $row['username'];
		// 	    }
		// }
		// else{
		// 	echo "0 rows selected";
		// }


		$username = $_SESSION['username'];

		// $drugname = $_POST['drugname'];
		// $reqquantity = $_POST['quantity'];

		// $_SESSION['reqquantity'] = $reqquantity; 
		// echo "the required quantity is:". $_SESSION['reqquantity'];


		// $sqlquery = "SELECT mid, quantity, rate from stock where drugname = '$drugname'";
		// if($result = $conn -> query($sqlquery))
		// {
		// 	if ($result->num_rows > 0) 
		// 	{
		// 	    while($row = $result->fetch_assoc()) 
		// 	    {
		// 	    	$mid = $row['mid'];
		// 	    	$availquantity = $row['quantity'];
		// 	    	$rate = $row['rate'];
		// 	    	if ($availquantity > $reqquantity) 
		// 	    	{
		// 	    		$remquantity = $availquantity-$reqquantity;
		// 	    		$sqlquery = "UPDATE stock set quantity = '$availquantity'-'$reqquantity' where mid = '$mid'";
		// 	    		if($result1 = $conn -> query($sqlquery))
		// 	    		{
		// 	    			echo "<h4> stock updated succesfully <br> Remaining stock for </h4>    ". $drugname . "<h4>   is   </h4>   ". $remquantity;

		// 	    			echo "<h2 color = 'red';>    total bill amount is :   </h2> ". $rate*$reqquantity . "   <h4> Rupees. </h4> ";
		// 	    		}
		// 	    		else
		// 	    		{
		// 	    			echo "<h4>not enough stock available</h4>";
		// 	    		}
		// 	    	}
		// 	    }
		// 	}
		// 	else
		// 	{
		// 		echo "<h4>this medicine is not available edit stock now</h4>";
		// 	}
		// }
		// else
		// {
		// 	die("error occured while processing\n".mysqli_error($conn));
		// } 


		// $city = $_POST['city'];
		// $pincode = $_POST['pincode'];
		$pid = $_POST['pid'];

		$sqlquery = "INSERT into patient (pid, username, dob, firstname, lastname, address, gender) values ( '$pid', '$username', '$dob', '$firstname', '$lastname', '$address', '$gender')";
		if($result = $conn -> query($sqlquery))
		// if($result = mysqli_query($conn, $sqlquery))
		{
			echo '<script>alert("details stored successfully");</script>';
			echo '<h2 style = "color:red;">the patient id is:  </h2>'.$pid;
		}
		else
		{
			die("error occured  while processing\n".mysqli_error($conn));
		} 
		// $sqlquery = "SELECT pid from patient where username = '$username' and firstname = '$firstname' "; 
		// $result = $conn -> query($sqlquery)

		// $pid = $_SESSION['pid']; 

		// $sqlquery = "SELECT pid from patient where firstname = '$firstname' and lastname = '$lastname' and dob = '$dob' and address = '$address'";
		// if($result = $conn -> query($sqlquery))
		// {
		// 	if ($result->num_rows > 0) {
		// 	    while($row = $result->fetch_assoc()) {
		// 	    	$pid = $row['pid'];
		// 	    }
		// 	}
		// else{
		// 	echo "0 rows selected";
		// 	}
		// }
		// else
		// {
		// 	die("error occured\n".mysqli_error($conn));
		// } 
		
		
		$sqlquery = "INSERT into contactnumber (pid, contactno) values ('$pid', '$mobilenumber')";
		if($result = $conn -> query($sqlquery))
		{
			echo "";
		}
		else
		{
			die("error occured  while processing\n".mysqli_error($conn));
		}


		// $sqlquery = "INSERT into transaction (pid, mid, username) values ('$pid', '$mid', '$username')";
		// if($result = $conn -> query($sqlquery))
		// {
		// 	echo '<br><br><h4>patient id is:</h4>'. $pid .'  &  '. '<h4>chemist : </h4>'. $username;
		// }
		// else
		// {
		// 	die("error occured while processing\n".mysqli_error($conn));
		// } 
		
		

	}
?>

<html>
<head>
<title> Patient Details </title>
		<header>
				<ul>
				<!-- <img class = "center" src="assets/images/logo/logo.png" alt="logo"> -->
				<li><a href="index.html">Home</a></li>
				<li><a href="login.php">Log out</a></li>
				<li><a href="contactus.php">Contact</a></li>
				<li><a href="about.php">About</a></li>
				</ul>
        </header>
<style type="text/css">
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
</style>
<link rel="stylesheet" type="text/css" href="patient_details.css">
<!-- <script type="text/javascript">
	function logout(){
		window.location.href = "login.php";
	}
</script> -->
</head>
<body bgcolor="lightblue" class = "bgimg">
<h3 style = "color:#333;"> Patient Registration </h3>
<button style = "width:22%; margin-left:360px; " class = "buttonsignup" type="submit" name="loginrights" id="loginrights" onclick='window.location.replace("loginrights.php");' >Back</button>
<button style = "width:22%; "class = "buttonsignup" type="submit" name="logout" id="logout" onclick='window.location.replace("login.php");' >Logout</button>
<br><br>
<form name="patientdetails" method="POST" id="patientdetails">

<table align="center" cellpadding = "10">
	<input type="hidden" name="submitted" value="true" id="submitted">
	<!----- Patient id ---------------------------------------------------------->
	<tr>
	<td>PATIENT ID</td>
	<td><input type="text" name="pid" id="pid" maxlength="30" required="true" pattern="[A-Za-z0-9]{4,12}">
	(min 4 and max 12 characters no special symbols)
	</td>
	</tr>

	<!----- First Name ---------------------------------------------------------->
	<tr>
	<td>FIRST NAME</td>
	<td><input type="text" name="firstname" id="firstname" required="true" pattern="[A-Za-z]{4,12}">
	(min 4 and max 12 characters no special symbols)
	</td>
	</tr>
	
	<!----- Last Name ---------------------------------------------------------->
	<tr>
	<td>LAST NAME</td>
	<td><input type="text" name="lastname" id="lastname" required="true" pattern="[A-Za-z]{4, 12}" >
	(min 4 and max 12 characters no special symbols)
	</td>
	</tr>
	
	<!----- Date Of Birth -------------------------------------------------------->
	<tr>
	<td>DATE OF BIRTH</td>
	
	<td>
		<input type="date" name="dob" required="true" />
	</td>
	</tr>

	<!----- Mobile Number ---------------------------------------------------------->
	<tr>
	<td>MOBILE NUMBER</td>
	<td>
	<input type="number" name="mobilenumber" id="mobilenumber" required="true" pattern="[0-9]{10}" >
	(10 digit number)
	</td>
	</tr>

	<!----- Doctor's Name ---------------------------------------------------------->
	<!-- <tr>
	<td>DOCTOR'S NAME</td>
	<td><input type="text" name="doctorsname" id = "doctorsname" required="true" pattern="[A-Za-z]{10, 30}">
	(max 30 characters a-z and A-Z)
	</td>
	</tr> -->

	<!-- medicine name -->
	<!-- <tr>
	<td>DRUG NAME</td>
	<td><input type="text" name="drugname" id = "drugname" required="true" >
	</td>
	</tr> -->

	<!-- quantity of the medicine -->
	<!-- <tr>
	<td>QUANTITY</td>
	<td><input type="text" name="quantity" id = "quantity" required="true">
	</td>
	</tr> -->
	
	<!----- Gender ----------------------------------------------------------->
	<tr>
	<td>GENDER</td>
	<td>
		<select id="gender" name="gender">
			<option value="Male">Male</option>
			<option value="Female">Female</option>
		</select>
	<!-- Male <input type="radio" name="Gender" value="Male" />
	Female <input type="radio" name="Gender" value="Female" /> -->
	</td>
	</tr>
	
	<!----- Address ---------------------------------------------------------->
	<tr>
	<td>ADDRESS <br /><br /><br /></td>
	<td><textarea name="address" rows="4" cols="30" id="address" required="true"></textarea></td>
	</tr>
	
	<!----- City ---------------------------------------------------------->
	<!-- <tr>
	<td>CITY</td>
	<td><input type="text" name="city" maxlength="30" id="city" required="true">
	(min 4 and max 12 characters no special symbols)
	</td>
	</tr> -->
	
	<!----- Pin Code ---------------------------------------------------------->
	<!-- <tr>
	<td>PIN CODE</td>
	<td><input type="text" name="pincode" pattern = [0-9]{6} id="pincode" required="true">
	(6 digit number)
	</td>
	</tr> -->
	

	
	<!----- Submit and Reset ------------------------------------------------->
	<tr>
	<td colspan="2" align="center">
	<input type="submit" value="Submit" name="submit" class="buttonsignup">
	<input type="reset" value="Reset" name="reset" class="buttonsignup">

	</td>
	</tr>
</table>
</form>
</body>
</html>
