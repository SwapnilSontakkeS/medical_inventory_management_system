
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: black;
}

* {
  box-sizing: border-box;
}

/* Add padding to containers */
.container {
  padding: 16px;
  background-color: powderblue;
}

/* Full-width input fields */
input[type=text], input[type=time] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: white;
}

input[type=text]:focus, input[type=time]:focus {
  background-color: white;
  outline: none;
}

/* Overwrite default styles of hr */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}

/* Set a style for the submit button */
.registerbtn {
  background-color:#17615D;
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
</style>
</head>
<body>

<form action="/action_page.php">
  <div class="container">
    <h1>Transaction Details</h1>
    
    <hr>

    <label for="trans_id"><b>Transaction ID</b></label>
    <input type="text" placeholder="Enter Transaction ID" name="trans_id" required>

    <label for="trans_time"><b>Transaction Time</b></label>
    <input type="time" placeholder="Enter Transaction Time" name="trans_time" required>


    <label for="quantity"><b>Quantity Purchased</b></label>
    <input type="text" placeholder="Quantity Purchased" name="quantity" required>
    <hr>
    

    <button type="submit" class="registerbtn">Submit</button>
<button type="reset" class="registerbtn">Reset</button>
  
  </div>
  
  
</form>

</body>
</html>
