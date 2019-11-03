<!-- updatestock -->
<?php
    // session_start();
    error_reporting(0);
	if(isset($_POST['submit']))
	{
        include 'databaseconn.php';
        $drugname = $_POST['drugname'];
        // echo $drugname;
        $upquantity = $_POST['upquantity'];
        
        $sqlquery = "UPDATE stock SET quantity = '$upquantity' WHERE drugname = '$drugname' ";

        $result = $conn -> query($sqlquery);
        $sqlquery = "SELECT * from stock WHERE drugname = '$drugname' ";
        $result = $conn -> query($sqlquery);
        // if($result = mysqli_query($conn, $sqlquery))
        if($result -> num_rows > 0)
		{
            echo ('<script>alert("stock update successfully");</script>');		
		}
		else
		{
			echo ('<script>alert("drugname not registered");</script>');
        }		
	}
	

?>

<html>
	<head>
		<title>Update Stock</title>
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
            h1{
                font-family: Calibri; 
                font-size: 40px;         
                font-style: normal; 
                font-weight: bold; 
                color: slateblue;
                /* text-align: center;  */
                text-decoration: underline;
            }
		</style>
        <script>
		function confirmUpdate(){
			var bool = confirm("do you really want to update this stock: ");
			return bool;
		}
			
	</script>
		
	</head>
	<body class = "bgimg">
        <h1 style = "margin-left:850px;"><b><u><i>Update Stock</b></u></i></h1><br>
        <button style = "margin-left:750px; width:15%;" class = "buttonsignup" type="submit" name="loginrights" id="loginrights" onclick='window.location.replace("loginrights.php");' >Back</button>
        <button style = "width:15%;"class = "buttonsignup" type="submit" name="logout" id="logout" onclick='window.location.replace("login.php");' >Logout</button>
        <br><br>
		<form action="updatestock.php" method="post" id="updatestock" name = "updatestock" onsubmit=" return confirmUpdate()" style = "margin-left:850px;">
            <table style = "border-collapse:collapse; background-color:slateblue; margin-right:150px;" cellpadding="20">
            <tr>
            <th>
            <input placeholder="Enter Drug name" type="text" name="drugname" id="drugname" required="true" style = "width: 200px; height:50px;"><br>
            </th>
            </tr>
            <tr>
            <th>
            <input placeholder="Enter updated total" type="text" name="upquantity" id="upquantity" required="true" style = "width: 200px; height:50px;"><br>
            </th>
            </tr>
            <tr>
            <th colspan = "2">
            <button type="submit" value="SIGNUP" name="submit" id = "submit" class="buttonsignup">Update</button>
            </th>
            </tr>
            </table>
		</form>
	</body>
</html>