<?php
ob_start();
session_start();
    

      if (isset($_POST['submit'])) {
          if (isset($_POST['Name']) and isset($_POST['Surname']) and isset($_POST['Email']) and isset($_POST['id']) and isset($_POST['password'])) {



        $base = mysqli_connect ('localhost', 'root', 'azerty', 'project');
       

        $name =  $_POST['Name'];
        $Surname =  $_POST['Surname'];
        $email = $_POST['Email'];
        $id =  $_POST['id'];
        $password =  $_POST['password'];
        $administrator=0;


   
    $statement = $base->query("INSERT INTO Login(userID,Password,Administrator) VALUES ('$id','$password','$administrator')");
    $statement2 = $base->query("INSERT INTO student(Name,Surname,userID,Email) VALUES ('$name','$Surname','$id','$email')");
             header('Location:logstudent.php');
          }
    
    }


 ob_flush();

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Register page</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="logadmin.php">Absence Panel</a> 
            </div>
 
        </nav>   
           <!-- /. NAV TOP  -->
           
        <!-- /. NAV SIDE  -->
    
            <div id="page-inner">
                <div class="row">
                    
                    <center> <h2>Register Page for student</h2>   
                        <h5>Welcome on the school panel for absence </h5>
                     
                
                </div>
                 <!-- /. ROW  -->
                 <hr />
                     
                     <div class="row" style="margin-left:35%;">
                               
  <form role="form" method="post" action="Registudent.php" >
              <div class="form-group">
            
					<div class="form-group">
					  <label for="surname">Name</label>
					  <input type="text" class="form-control" name="Name" placeholder="Your Name" required>

					  <label for="surname">Surname</label>
					  <input type="text" class="form-control" name="Surname" placeholder="Your Surname" required>
					  
					  <label for="surname">Email</label>
					  <input type="mail" class="form-control" name="Email" placeholder="Your Email" required>

					  <label for="id">User ID</label>
					  <input type="text" class="form-control" name="id" placeholder="Your ID" required>

					  <label for="pin">Password</label>
					  <input type="password" class="form-control" name="password" placeholder="Your Password" required>
					  
					  <center><button type="submit" name="submit" class="btn btn-default">Register</button></center>
					</div>
              </form>

           

    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
       
         
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>

