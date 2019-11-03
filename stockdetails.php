<?php 
    
  if(isset($_POST['submit']))
  {
      include 'databaseconn.php';

      $drugname = $_POST['drugname'];
      $companyname = $_POST['companyname'];
      $expirydate = $_POST['expirydate'];
      $rate = $_POST['rate'];
      $quantity = $_POST['quantity'];

      
      $sqlquery = "INSERT into stock (drugname, companyname, expirydate, quantity, rate) values ('$drugname', '$companyname', '$expirydate', '$quantity', '$rate')";

      if($result = $conn -> query($sqlquery))
      {
          echo '<script>alert("drug saved sucessfully");</script>';       
      }
      else
      {
          die("error occured\n".mysqli_error($conn));
      } 
  }

 ?>


<html>
<head>

<title>Stock Details</title>
<header>
				<ul>
				<!-- <img class = "center" src="assets/images/logo/logo.png" alt="logo"> -->
				<li><a href="index.html">Home</a></li>
				<li><a href="signup.php">Sign in</a></li>
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
h3{
  font-family: Calibri; 
  font-size: 40px;         
  font-style: normal; 
  font-weight: bold; 
  color: slateblue;
  text-align: center; 
  text-decoration: underline;
}

table{
  font-family: Calibri; 
  color:white; 
  font-size: 20px; 
  font-style: normal;
  font-weight: bold;
  text-align: center; 
  background-color: slateblue; 
  border-collapse: collapse; 
  border: 2px solid navy;
}
table.inner{
  border: 2px;
}
.registerbtn {
      background-color: #4CAF50;
      color: white;
      padding: 16px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 80%;
      opacity: 0.8;
    }

.registerbtn:hover {
                  opacity: 1;
                  color: black;
                  background-color: blue;
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

            body{
              background-image: url('loginbg.jpg');
              background-repeat:no-repeat;
              background-size:cover;
              z-index: -1;	
            }

 </style>
 </head>
<body>
  <div style = "color:#333; margin-left:800px;">
<h3 > Stock Details</h3>
<button style = "width:30%; margin-left:100px; " class = "buttonsignup" type="submit" name="loginrights" id="loginrights" onclick='window.location.replace("loginrights.php");' >Back</button>
<button style = "width:30%; "class = "buttonsignup" type="submit" name="logout" id="logout" onclick='window.location.replace("login.php");' >Logout</button>
<br><br>
<form method="post" name="stockdetails">
<table align="center" cellpadding = "10">
 
<!----- MID---------------------------------------------------------->
<!-- <tr>
<td>MID</td>
<td><input type="text" name="MID"/>
</td>
</tr> -->
 
 <!----- Doctor's Name ---------------------------------------------------------->
<!-- <tr>
<td>DOCTOR'S NAME</td>
<td><input type="text" name="DOCTOR'S NAME" maxlength="30"/>
</td>
</tr> -->

<!----- DRUGNAME---------------------------------------------------------->
<tr>
<td>DRUGNAME</td>
<td><input type="text" name="drugname" maxlength="100" required="true"/></td>
</tr>

<!----- COMPANY NAME ----------------------------------------------------------->
<tr>
<td>COMPANY NAME</td>
<td><input type="text" name="companyname" maxlength="100" required="true"/>
</td>
</tr>
 
<!----- Expiry date---------------------------------------------------------->
<tr>
<td>EXPIRY DATE</td>
<td><input type="date" name="expirydate" maxlength="100" required="true"/>
</td>
</tr>
 
  <!----- QUANTITY ---------------------------------------------------------->
<tr>
<td>QUANTITY</td>
<td><input type="text" name="quantity" required="true" />
</td>
</tr>

 <!----- RATE---------------------------------------------------------->
<tr>
<td>RATE</td>
<td><input type="text" name="rate" required="true"/>
</td>
</tr>
 

 
<!----- Submit and Reset ------------------------------------------------->
<tr>
<td colspan="2" align="center">
<input type="submit" value="Submit"  name= "submit" class="buttonsignup" >
<input type="reset" value="Reset" name="reset" class="buttonsignup" >
<!-- <button class = "buttonsignup" type="submit" name="logout" id="logout" onclick='window.location.replace("login.php");' >LOGOUT</button> -->
</td>
</tr>
</table>
 
</form>
</div>
</body>
</html>