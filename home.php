<?php
session_start();
if(isset($_SESSION['user']))
{
    ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/kairaly.ico">
  <script src="m/dist/sweetalert.min.js"></script> <link rel="stylesheet" type="text/css" href="m/dist/sweetalert.css">
<script>
function w()
{
  swal({   title: "INFINITY ",   text: "Tell my Name to prove you are A worker",   type: "input",   showCancelButton: false,  
   closeOnConfirm: false,   animation: "slide-from-top",   inputPlaceholder: "Write my name!" },
   function(inputValue){   if (inputValue === false) return false;      if ((inputValue !="unni" ) && (inputValue !="UNNI" )) {  
          swal.showInputError("You need to Remember my name to continue!");     return false   }   
             swal("Nice!", "Do Your Works Buddie! ", "success"); });
};
</script>
   <title>കൈരളി - സ്വാശ്രയസംഘം</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/dashboard.css" rel="stylesheet">

    

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

   <body style="background: url('images/bg.jpg')">

       <div class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: darkblue">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
            <a class="navbar-brand" href="#" style="color: white;">കൈരളി സ്വാശ്രയ സംഘം</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a  href="home.php" style="color:white;">Dashboard</a></li>
           
            <li><a href="logout.php" style="color:white;">Logout</a></li>
            
           
          </ul>
          
        </div>
      </div>
    </div>

   





    <div class="container-fluid">
      <div class="row">
        <div  class="col-sm-3 col-md-2 sidebar" >
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">ഹോം</a></li>
             <li><a href="add_customer.php">പുതിയ അംഗത്തെ ചേര്‍ക്കുക</a></li>
            <li ><a href="shops.php">അംഗങ്ങളെ കാണുക</a></li>
                 <li ><a href="week_register.php">പ്രതിവാര നിക്ഷേപം</a></li>
            <li><a href="month_report.php">പ്രതിമാസ റിപ്പോര്‍ട്ട്</a></li>
            <li><a href="loan.php">വായ്പ എടുക്കുക </a></li>
            
		
            <li><a href="interest_pay.php">വായ്പ പലിശ അടയ്ക്കുക </a></li>
             <li ><a href="interest_report.php">വാര്‍ഷിക പലിശ റിപ്പോര്‍ട്ട് </a></li>
              <li ><a href="loan_return.php">വായ്പ തിരിച്ചടവ്</a></li>  
              <li><a href="other_income.php">മറ്റു വരവുകള്‍</a></li>
              <li><a href="other_expense.php"> മറ്റു ചിലവുകള്‍</a>‍</li>
              <li><a href="report.php">റിപ്പോര്‍ട്ട്</a></li>
              <li><a>~~~~~~~~~~~~~~~~~~~~~~~~</a></li>
	       <li><a href="http://www.facebook.com/dinak.thillankeri"> © DLT</a></li>
              <li><a>~~~~~~~~~~~~~~~~~~~~~~~~</a></li>

          </ul>
       
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image:url('images/1.jpg') ;background-repeat: no-repeat; background-position: center;background-size: cover;">
            <h1 class="page-header">Powered by <span class="glyphicon glyphicon-copyright-mark" ></span> <a href="http://www.facebook.com/dinak.thillankeri">DLT Creations</a></h1>

          <div class="row placeholders">
            <div class="col-xs-6 col-sm-4 placeholder">
                <a href="add_customer.php" > <button type="button" class="btn btn-lg btn-success">അംഗത്തെ ചേര്‍ക്കുക </button></a>
            
            </div>
            <div class="col-xs-6 col-sm-4 placeholder">
             <a href="shops.php" > <button type="button" class="btn btn-lg btn-success">അംഗങ്ങളെ കാണുക </button></a>
             
            </div>
            
            <div class="col-xs-6 col-sm-4 placeholder">
              
                <a href="week_register.php" > <button type="button" class="btn btn-lg btn-success">പ്രതിവാര നിക്ഷേപം</button></a>
              
            </div>
           
            <div class="col-xs-6 col-sm-4 placeholder">
                <a href="month_report.php"> <button type="button" class="btn btn-lg btn-success">പ്രതിമാസ റിപ്പോര്‍ട്ട്</button></a>
              
              
            </div>
            
            <div class="col-xs-6 col-sm-4 placeholder">
                <a href="loan.php"> <button type="button" class="btn btn-lg btn-success">&nbsp;&nbsp;&nbsp;വായ്പ എടുക്കുക &nbsp;&nbsp;&nbsp;</button></a>
              
              
            </div>
            <div class="col-xs-6 col-sm-4 placeholder">
                <a href="interest_pay.php"> <button type="button" class="btn btn-lg btn-success">&nbsp;&nbsp;പലിശ ചേര്‍ക്കുക &nbsp;&nbsp;</button></a>
              
              
            </div>
            <div class="col-xs-6 col-sm-4 placeholder">
                <a href="interest_report.php"> <button type="button" class="btn btn-lg btn-success">&nbsp;&nbsp; പലിശ റിപ്പോര്‍ട്ട്   &nbsp;&nbsp;&nbsp;</button></a>
              
              
            </div>
            <div class="col-xs-6 col-sm-4 placeholder">
                <a href="loan_return.php"> <button type="button" class="btn btn-lg btn-success">&nbsp;&nbsp;&nbsp;വായ്പ തിരിച്ചടവ് &nbsp;&nbsp;&nbsp;</button></a>
              
              
            </div>
                <div class="col-xs-6 col-sm-4 placeholder">
                    <a href="other_expense.php"> <button type="button" class="btn btn-lg btn-success">&nbsp;&nbsp;&nbsp; മറ്റ് ചെലവുകള്‍  &nbsp;&nbsp;&nbsp; </button></a>
              
              
            </div>
                <div class="col-xs-6 col-sm-4 placeholder">
                    <a href="other_income.php"> <button type="button" class="btn btn-lg btn-success">&nbsp;&nbsp;&nbsp;&nbsp;മറ്റ് വരവുകള്‍ &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; </button></a>
              
              
            </div>
                <div class="col-xs-6 col-sm-4 placeholder">
                  <a href="report.php"> <button type="button" class="btn btn-lg btn-success">&nbsp;&nbsp;&nbsp; റിപ്പോര്‍ട്ടുകള്‍ &nbsp;&nbsp;&nbsp; &nbsp;</button></a>
              
              
            </div>
              <div class="col-xs-6 col-sm-4 placeholder">
                  <a href="bck.php"> <button type="button" class="btn btn-lg btn-warning">&nbsp;&nbsp; ബാക്കപ്പ്  ചെയ്യുക &nbsp;&nbsp; </button></a>
              
              
            </div>
          </div>
<br>

        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
  </body>
</html>
<?php
}
else
 {
  $_SESSION['error'] = "Please Login to continue";
  header("Location: index.php");
}
?>
