<?php
    session_start();
    error_reporting(0);
    echo '<html>
    <head>
        <title> shop </title>
        <header>
                        <ul>
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
                    background-image: url(\'assets/images/bg-01.jpg\');
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
        <button style = "width:22%; margin-left:360px;" class = "buttonsignup" type="submit" name="loginrights" id="loginrights" onclick=\'window.location.replace("loginrights.php");\' >Back</button>
        <button style = "width:22%;" class = "buttonsignup" type="submit" name="logout" id="logout" onclick=\'window.location.replace("login.php");\' >Logout</button>
        
    </head>
    <body bgcolor="lightblue" class = "bgimg" >
        <!--<h3 style = "color:#333;"> Medicine </h3>-->
    
        <form method = post name = "pidfetch" id = "pidfetch" align = "center">
        <br>
        <input style = "width:10%; height:5%;" type = "text" name = "pid" id = "pid"  pattern = "[A-Za-z0-9]{4,12}" placeholder = "enter a valid pid">
        <!-- <input style = "width:12%; height:5%;" type = "number" name = "n" id = "n" placeholder = "enter no of medicines"> -->
        <input style = "width:10%; height:7%;" type = "submit" name = "pidsubmit" id = "pidsubmit" value = "submit" class="buttonsignup" >
        ';
        
    if(isset($_POST['pidsubmit']) )
    {
        include 'databaseconn.php';
            $pid = $_POST['pid'];
            // $n = $_POST['n'];                         
            // $reqquantity = $_POST['reqquantity'];
            
            $sqlquery = "SELECT firstname, dob, gender, address from patient where pid = '$pid'";
            $result = $conn -> query($sqlquery);
            if($result -> num_rows > 0)
            {
                echo '<table cellpadding = "10" align = "center">
                <tr>
                    <th>pid</th>
                    <th>patient name</th>
                    <th>dob</th>
                    <th>gender</th>
                    <th>address</th>
                </tr>';
                while($row = $result -> fetch_assoc())
                {
                        $firstname = $row['firstname'];
                        $dob = $row['dob'];
                        $gender = $row['gender'];
                        $address = $row['address'];
                        echo'<tr>
                            <th>'.$pid.'</th>
                            <th>'.$firstname.'</th>
                            <th>'.$dob.'</th>
                            <th>'.$gender.'</th>
                            <th>'.$address.'</th>
                        </tr>
                        </table>
                        <br>
                    ';
                }

                if(isset($_POST['pidsubmit']))
                {
                    $billamt = 0;
                    echo '
                    <table cellpadding = "10"  align = "center">        
                    <tr>
                        <th>drugname</th>
                        <th>required quantity</th>
                        <th>company</th>
                        <th>expirydate</th>
                        <th>available quantity</th>
                        <th>rate</th>
                        <th>total cost</th>
                    </tr>';
                }
                if(isset($_POST['pidsubmit']))
                {
                    echo '<!-- 1st -->
                        <tr>
                        <th><input type = "text" name = "drugname1" id = "drugname1" pattern = "[A-Za-z]{1, 15}" placeholder = "enter a valid drugname" value = ""></th>
                        <th><input type = "number" name = "reqquantity1" id = "reqquantity1" pattern = "[0-9]" placeholder = "enter quantity"></th>';
                        $drugname1 = $_POST['drugname1'];
                        $reqquantity1 = $_POST['reqquantity1'];
                        $sqlquery = "SELECT * from stock where drugname = '$drugname1'";
                        $result = $conn -> query($sqlquery);
                        if($result -> num_rows > 0)
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                $companyname = $row['companyname'];
                                $expirydate = $row['expirydate'];
                                $availquantity = $row['quantity'];
                                $rate = $row['rate'];
                                // $reqquantity = $_POST['reqquantity'];
                                if($availquantity < $reqquantity1)
                                {
                                    echo '<script>alert("insufficient drug quantity available")</script>';
                                    
                                }
                                else
                                {
                                    $totalcost = $rate*$reqquantity1;
                                    $billamt += $totalcost;
                                    echo'
                                    <tr>
                                    <th>'.$drugname1.'</th>
                                    <th>'.$reqquantity1.'</th>
                                    <th>'.$companyname.'</th>
                                    <th>'.$expirydate.'</th>
                                    <th>'.$availquantity.'</th>
                                    <th>'.$rate.'</th>
                                    <th>'.$totalcost.'</th>
                                    </tr>
                                    ';
                                }
                            }
                            $sqlquery = "UPDATE stock set quantity = '$availquantity'-'$reqquantity1' where drugname = '$drugname1'";
                            if($result = $conn -> query($sqlquery))
                            // if($result = mysqli_query($conn, $sqlquery))
                            {
                                echo '';
                            }
                            else
                            {
                                die("error occured\n".mysqli_error($conn));
                            }  
                        }
                        else
                        {
                            // die('<h6>no record found</h6>'.mysqli_error($conn));
                        }
                

                        echo '<!-- 2nd -->
                        <tr>
                        <th><input type = "text" name = "drugname2" id = "drugname2"  pattern = "[A-Za-z]{1, 15}" placeholder = "enter a valid drugname" value = ""></th>
                        <th><input type = "number" name = "reqquantity2" id = "reqquantity2" pattern = "[0-9]" placeholder = "enter quantity"></th>';
                        $drugname2 = $_POST['drugname2'];
                        $reqquantity2 = $_POST['reqquantity2'];
                        $sqlquery = "SELECT * from stock where drugname = '$drugname2'";
                        $result = $conn -> query($sqlquery);
                        if($result -> num_rows > 0)
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                $companyname = $row['companyname'];
                                $expirydate = $row['expirydate'];
                                $availquantity = $row['quantity'];
                                $rate = $row['rate'];
                                // $reqquantity = $_POST['reqquantity'];
                                if($availquantity < $reqquantity)
                                {
                                    echo '<script>alert("insufficient drug quantity available")</script>';
                                    
                                }
                                else
                                {
                                    $totalcost = $rate*$reqquantity2;
                                    $billamt += $totalcost;
                                    echo'
                                    <tr>
                                    <th>'.$drugname2.'</th>
                                    <th>'.$reqquantity2.'</th>
                                    <th>'.$companyname.'</th>
                                    <th>'.$expirydate.'</th>
                                    <th>'.$availquantity.'</th>
                                    <th>'.$rate.'</th>
                                    <th>'.$totalcost.'</th>
                                    </tr>
                                    ';
                                }
                            }
                            $sqlquery = "UPDATE stock set quantity = '$availquantity'-'$reqquantity2' where drugname = '$drugname2'";
                            if($result = $conn -> query($sqlquery))
                            // if($result = mysqli_query($conn, $sqlquery))
                            {
                                echo '';
                            }
                            else
                            {
                                die("error occured\n".mysqli_error($conn));
                            }   
                        }
                        else
                        {
                            // die('<h6>no record found</h6>'.mysqli_error($conn));
                        }

                        echo '<!-- 3rd -->
                        <tr>
                        <th><input type = "text" name = "drugname3" id = "drugname3" pattern = "[A-Za-z]{1, 15}" placeholder = "enter a valid drugname" value = ""></th>
                        <th><input type = "number" name = "reqquantity3" id = "reqquantity3" pattern = "[0-9]" placeholder = "enter quantity"></th>';
                        $drugname3 = $_POST['drugname3'];
                        $reqquantity3 = $_POST['reqquantity3'];
                        $sqlquery = "SELECT * from stock where drugname = '$drugname3'";
                        $result = $conn -> query($sqlquery);
                        if($result -> num_rows > 0)
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                $companyname = $row['companyname'];
                                $expirydate = $row['expirydate'];
                                $availquantity = $row['quantity'];
                                $rate = $row['rate'];
                                // $reqquantity = $_POST['reqquantity'];
                                if($availquantity < $reqquantity3)
                                {
                                    echo '<script>alert("insufficient drug quantity available")</script>';
                                    
                                }
                                else
                                {
                                    $totalcost = $rate*$reqquantity3;
                                    $billamt += $totalcost;
                                    echo'
                                    <tr>
                                    <th>'.$drugname3.'</th>
                                    <th>'.$reqquantity3.'</th>
                                    <th>'.$companyname.'</th>
                                    <th>'.$expirydate.'</th>
                                    <th>'.$availquantity.'</th>
                                    <th>'.$rate.'</th>
                                    <th>'.$totalcost.'</th>
                                    </tr>
                                    ';
                                }
                            } 
                            $sqlquery = "UPDATE stock set quantity = '$availquantity'-'$reqquantity3' where drugname = '$drugname3'";
                            if($result = $conn -> query($sqlquery))
                            // if($result = mysqli_query($conn, $sqlquery))
                            {
                                echo '';
                            }
                            else
                            {
                                die("error occured\n".mysqli_error($conn));
                            }  
                        }
                        else
                        {
                            // die('<h6>no record found</h6>'.mysqli_error($conn));
                        }
                        echo '<!-- 4th -->
                        <tr>
                        <th><input type = "text" name = "drugname4" id = "drugname4" pattern = "[A-Za-z]{1, 15}" placeholder = "enter a valid drugname" value = ""></th>
                        <th><input type = "number" name = "reqquantity4" id = "reqquantity4" pattern = "[0-9]" placeholder = "enter quantity"></th>';
                        $drugname4 = $_POST['drugname4'];
                        $reqquantity4 = $_POST['reqquantity4'];
                        $sqlquery = "SELECT * from stock where drugname = '$drugname4'";
                        $result = $conn -> query($sqlquery);
                        if($result -> num_rows > 0)
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                $companyname = $row['companyname'];
                                $expirydate = $row['expirydate'];
                                $availquantity = $row['quantity'];
                                $rate = $row['rate'];
                                // $reqquantity = $_POST['reqquantity'];
                                if($availquantity < $reqquantity4)
                                {
                                    echo '<script>alert("insufficient drug quantity available")</script>';
                                    
                                }
                                else
                                {
                                    $totalcost = $rate*$reqquantity4;
                                    $billamt += $totalcost;
                                    echo'
                                    <tr>
                                    <th>'.$drugname4.'</th>
                                    <th>'.$reqquantity4.'</th>
                                    <th>'.$companyname.'</th>
                                    <th>'.$expirydate.'</th>
                                    <th>'.$availquantity.'</th>
                                    <th>'.$rate.'</th>
                                    <th>'.$totalcost.'</th>
                                    </tr>
                                    ';
                                }
                            }
                            $sqlquery = "UPDATE stock set quantity = '$availquantity'-'$reqquantity4' where drugname = '$drugname4'";
                            if($result = $conn -> query($sqlquery))
                            // if($result = mysqli_query($conn, $sqlquery))
                            {
                                echo '';
                            }
                            else
                            {
                                die("error occured\n".mysqli_error($conn));
                            }   
                        }
                        else
                        {
                            // die('<h6>no record found</h6>'.mysqli_error($conn));
                        }

                        echo '<!-- 5th -->
                        <tr>
                        <th><input type = "text" name = "drugname5" id = "drugname5" pattern = "[A-Za-z]{1, 15}" placeholder = "enter a valid drugname" value = ""></th>
                        <th><input type = "number" name = "reqquantity5" id = "reqquantity5" pattern = "[0-9]" placeholder = "enter quantity"></th>';
                        $drugname5 = $_POST['drugname5'];
                        $reqquantity5 = $_POST['reqquantity5'];
                        $sqlquery = "SELECT * from stock where drugname = '$drugname5'";
                        $result = $conn -> query($sqlquery);
                        if($result -> num_rows > 0)
                        {
                            while($row = $result -> fetch_assoc())
                            {
                                $companyname = $row['companyname'];
                                $expirydate = $row['expirydate'];
                                $availquantity = $row['quantity'];
                                $rate = $row['rate'];
                                // $reqquantity = $_POST['reqquantity'];
                                if($availquantity < $reqquantity5)
                                {
                                    echo '<script>alert("insufficient drug quantity available")</script>';
                                    
                                }
                                else
                                {
                                    $totalcost = $rate*$reqquantity5;
                                    $billamt += $totalcost;
                                    echo'
                                    <tr>
                                    <th>'.$drugname5.'</th>
                                    <th>'.$reqquantity5.'</th>
                                    <th>'.$companyname.'</th>
                                    <th>'.$expirydate.'</th>
                                    <th>'.$availquantity.'</th>
                                    <th>'.$rate.'</th>
                                    <th>'.$totalcost.'</th>
                                    </tr>
                                    ';
                                }
                            }
                            $sqlquery = "UPDATE stock set quantity = '$availquantity'-'$reqquantity5' where drugname = '$drugname5'";
                            if($result = $conn -> query($sqlquery))
                            // if($result = mysqli_query($conn, $sqlquery))
                            {
                                echo '';
                            }
                            else
                            {
                                die("error occured\n".mysqli_error($conn));
                            }   
                        }
                        else
                        {
                            // die('<h6>no record found</h6>'.mysqli_error($conn));
                        }
                        echo '</table>
                        </form>
                        <h2 style = "color:red;">the total bill amount is : '.$billamt.' </h2>
                        </body>
                        </html>';

                    if( $billamt != 0)
                    {
                        $username = $_SESSION['username'];
                        $sqlquery = "INSERT into transaction (pid, mid1, q1, mid2, q2, mid3, q3, mid4, q4, mid5, q5, username, billamt) values ('$pid', '$drugname1', '$reqquantity1', '$drugname2', '$reqquantity2', '$drugname3', '$reqquantity3', '$drugname4', '$reqquantity4', '$drugname5', '$reqquantity5', '$username', '$billamt')";
                        if($result = $conn -> query($sqlquery))
                            // if($result = mysqli_query($conn, $sqlquery))
                            {
                                echo '';
                            }
                            else
                            {
                                die("error occured\n".mysqli_error($conn));
                            }
                    }
                }
            }
            else
            {
                echo('<script>alert("no record found")</script>');
            }
            

    }
    
    
    
    
    
        
?>

<!-- <table align="center" cellpadding = "10">
<button style = "width:22%; margin-left:360px;" class = "buttonsignup" type="submit" name="loginrights" id="loginrights" onclick=\'window.location.replace("loginrights.php");\' >Back</button>
        <button style = "width:22%;" class = "buttonsignup" type="submit" name="logout" id="logout" onclick=\'window.location.replace("login.php");\' >Logout</button>
                
            <tr>
                <th>drugname</th>
                <th>company</th>
                <th>expirydate</th>
                <th>available quantity</th>
                <th>rate</th>
                <th>required quantity</th>
                <th>total cost</th>
                <input type="hidden" name="midsubmit" value="true" id="midsubmit">
            </tr>
            <tr>
                <th><input type = "text" name = "drugname" id = "drugname" required = "true" pattern = "[A-Za-z]{1, 15}" placeholder = "enter a valid drugname"></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th><input type = "number" name = "reqquantity" id = "reqquantity" required = "true" pattern = "[0-9]" placeholder = "1"></th>
                <th></th> 
            </tr>  -->


    <!-- <table align="center" cellpadding = "10">
            
            <tr>
                <th>mid</th>
                <th>drugname</th>
                <th>rate</th>
                <th>quantity</th> 
                <th>required</th> 
            </tr>
            <tr>
            <td colspan="2" align="center">
            <input type="submit" value="Submit" name="submit" class="buttonsignup">
            <input type="reset" value="Reset" name="reset" class="buttonsignup">

            </td>
            </tr>
        </table> -->
        <!-- <th>'?><input type = "text" name = "drugname" id = "drugname" required = "true" pattern = "[A-Za-z]{1, 15}" placeholder = "enter a valid drugname">
        <php include 'databaseconn.php'; echo '</th> -->