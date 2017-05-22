<?php
ob_start();
session_start();
    
    if(isset($_SESSION['number']))
       {
         header('Location: admin.php');
       }

    if (isset($_POST['submit'])) {
        if ((isset($_POST['number']) && !empty($_POST['number'])) && (isset($_POST['pass']) && !empty($_POST['pass']))) {



        $base = mysqli_connect ('localhost', 'root', 'azerty', 'project');
       

      
        $sql = 'SELECT count(*) FROM login WHERE userID="'.$_POST['number'].'" AND Password="'.$_POST['pass'].'" AND Administrator="1"';
        $req = $base->query($sql);
        $data = mysqli_fetch_array($req);
        $date= date("Y-m-d");
        $sqlb = 'UPDATE login SET last_time ="'.$date.'"';
        $reqb = $base->query($sqlb);
        $sql2 = 'SELECT Administrator FROM login WHERE userID="'.$_POST['number'].'"';
        $req2 = $base->query($sql2);
        $data2 = mysqli_fetch_array($req2);

        
        $_SESSION['Administrator']=$data2[0];
        if ($data[0] == 1) {
            $_SESSION['number'] = $_POST['number'];
             
            header('Location:admin.php');
            exit();
        }
        elseif ($data[0] == 0) {
            $erreur = 'Unknow account.';
        }
        else {
            $erreur = 'More than 1 user.';
        }
        }
        else {
        $erreur = 'Empty area.';
        }
    }

?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login page</title>
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
                    
                    <center> <h2>Login Page for admin</h2>   
                        <h5>Welcome on the school panel for absence </h5>
                     
                
                </div>
                 <!-- /. ROW  -->
                 <hr />
                     
                     <div class="row" style="margin-left:35%;">
                               
  <form role="form" method="post" action="logadmin.php" >
              <div class="form-group">
              <div class="col-md-6">
                   <center> <label>Admin Number</label></center><br>
                    <input class="form-control" type="text" name="number" /><br>
                    
                    <center><label>Password</label></center>
                    <input class="form-control" type="password" name="pass"/>
                    </br>
                    <center><button type="submit" name="submit" class="btn btn-default">Login</button></center>
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

<?php
 ob_flush();
?>