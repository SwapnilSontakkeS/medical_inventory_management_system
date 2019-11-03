<!-- about page -->

<html>
<head>
<title>About Page</title>
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
        h1{
  font-family: Calibri; 
  font-size: 40px;         
  font-style: normal; 
  font-weight: bold; 
  color: slateblue;
  text-align: center; 
  text-decoration: underline;
    }
    p{
  font-family: Calibri; 
  font-size: 30px;         
  font-style: normal; 
  font-weight: bold; 
  color: black;
  text-align: center; 
  text-decoration: none;
  padding: 14px 16px;
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
        <h1>MEDICAL INVENTORY SYSTEM</h1>
        <p>
            Our Project is based on Medical Store Inventory System. The software keeps track of all the medical information. All the names of the medicine and their rate will be stored in the database. Any updating required can be done. The creditors name will also be saved. A unique Id will be generated to each of the creditors. As soon as the customer arrives, all the details of the medicine they wanted to purchase will be noted down. According to it, the rates will be retrieved from the database and after considering the entire amount, a separate bill will be generated to each Patient and for that particular user. This project is designed to create a record that allows the user to keep track of Patient details, Drug details, Transaction details etc.  The database system is created using MYSQL which is an open source relational database management system. The front end is designed using HTML, JAVACSRIPT, CSS and PHP.
        </p>
</body>
</html>