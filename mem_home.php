<?php
session_start();
if(isset($_SESSION['user']))
{
    ?>
<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$id=$_GET['id'];
require_once('db_connect.php');
        
$q="SELECT * FROM `members` WHERE member_id=$id;";
$res=mysqli_query($con,$q);
$row=  mysqli_fetch_array($res);
$q="SELECT * FROM `loan` WHERE member_id=$id;";
$res1=mysqli_query($con,$q);
$row1=  mysqli_fetch_array($res1);

$q="SELECT sum(amount) as intr FROM `interest`  WHERE member_id=$id AND status=1 group by (member_id) ;";
$res2=mysqli_query($con,$q);
$row2=  mysqli_fetch_array($res2);
echo mysqli_error($con);

$q="SELECT balance FROM `account`  WHERE member_id=$id ;";
$res5=mysqli_query($con,$q);
$row5=  mysqli_fetch_array($res5);
echo mysqli_error($con);

$q="SELECT sum(amount) as intr1 FROM `interest`  WHERE member_id=$id AND (status=0 OR status is NULL) group by (member_id) ;";
$res3=mysqli_query($con,$q);
$row3=  mysqli_fetch_array($res3);
echo mysqli_error($con);
//echo $row['member_id'].'<br>';
//echo $row['name']."<br>".$row['educational_qualification'].'<br>'.$row['age'].'<br>'.$row['member_id'].'<br>';

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

    <script src="js/jquery.min.js"></script>
<script>
$(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
<script>
function w()
{
  swal({   title: "INFINITY ",   text: "Tell my Name to prove you are A worker",   type: "input",   showCancelButton: false,  
   closeOnConfirm: false,   animation: "slide-from-top",   inputPlaceholder: "Write my name!" },
   function(inputValue){   if (inputValue === false) return false;      if ((inputValue !="unni" ) && (inputValue !="UNNI" )) {  
          swal.showInputError("You need to Remember my name to continue!");     return false   }   
             swal("Nice!", "Do Your Works Buddie! ", "success"); });
};

});
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
            <a class="navbar-brand" href="#" style="color:white;">കൈരളി സ്വാശ്രയ സംഘം</a>
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
              <li ><a href="home.php">ഹോം</a></li>
             <li ><a href="add_customer.php">പുതിയ അംഗത്തെ ചേര്‍ക്കുക</a></li>
            <li class= "active"><a href="shops.php">അംഗങ്ങളെ കാണുക</a></li>
             
                 <li ><a href="week_register.php">പ്രതിവാര നിക്ഷേപം</a></li>
            <li><a href="month_report.php">പ്രതിമാസ റിപ്പോര്‍ട്ട്</a></li>
            <li><a href="loan.php">വായ്പ എടുക്കുക </a></li>
            
		
            <li><a href="interest_pay.php">വായ്പ പലിശ അടയ്ക്കുക </a></li>
             <li ><a href="interest_report.php">വാര്‍ഷിക പലിശ റിപ്പോര്‍ട്ട് </a></li>
              <li ><a href="loan_return.php">വായ്പ തിരിച്ചടവ്</a></li>
               <li><a href="other_income.php">മറ്റു വരവുകള്‍  </a></li>
              <li><a href="other_expense.php"> മറ്റു ചിലവുകള്‍   </a> ‍</li>
              <li><a href="report.php">റിപ്പോര്‍ട്ട് ‍ </a></li>

          </ul>
       
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image:url('images/1.jpg') ;background-repeat: no-repeat; background-position: center;background-size: cover;">
            <center>  <b> <h1  style="color:green;font-weight: 10000; text-shadow: 2px 2px green;"></h1></b></center>
          
            <div class="row" >
                <div class="col-md-3" >
             <a href="shops.php" > <button type="button" class="btn btn-lg btn-success">തിരിച്ച് പോവുക</button></a>
            </div>
                
                 <div class="col-md-3" >
                     <a href="edit_user.php?id=<?php echo $id;?>" > <button type="button" class="btn btn-lg btn-success">വിവരങ്ങള്‍ എഡിറ്റ്‌ ചെയ്യുക </button></a>
            </div>
            </div>
                <br>
            
            <div class='table-responsive' >
            <table class='table table-bordered' id='ttr' style='background-color:white; -webkit-column-width: 100px;-moz-column-width: 100px;column-width: 100px;'>
                <tr><th class="col-md-3">പേര്:</td><td ><?php echo $row['name'];?></td></tr>
                <tr><th>വയസ്:</td><td><?php echo $row['age'];?></td></tr>
                 <tr><th>വിലാസം:</td><td><?php echo $row['address'];?></td></tr>
                 <tr><th>വിദ്യാഭ്യാസയോഗ്യത:</td><td><?php echo $row['educational_qualification'];?></td></tr>
                 <tr><th>തൊഴില്‍  :</th><td><?php echo $row['occupation'];?></td></tr>
                  <tr><th>തിരിച്ചറിയല്‍  രേഖ :</th><td><?php echo $row['identity_proof']." ".$row['details'];?></td></tr>
                   <tr><th>ഫോണ്‍ നമ്പര്‍:</th><td><?php echo $row['phone'];?></td></tr>
                    <tr><th>റേഷന്‍ കാര്‍ഡ്‌</th><td><?php echo $row['ration'];?></td></tr>
                     <tr><th>പ്രായം:</th><td><?php echo $row['age'];?></td></tr>
                     <tr><th>ആകെ എടുത്ത വായ്പ തുക :</th><td><?php echo $row1['returned_amount']+$row1['p_amount'];?></td></tr>
        <tr><th>ബാക്കി വായ്പ തുക:</th><td><?php echo $row1['p_amount'];?></td></tr>
         <tr><th>ആകെ അടച്ച വായ്പ തുക :</th><td><?php echo $row1['returned_amount'];?></td></tr>
         <tr><th>ആകെ അടച്ച പലിശ  :</th><td><?php echo $row2['intr'];?></td></tr>
          <tr><th>ബാക്കി അടയ്ക്കാന്‍ ഉള്ള പലിശ:</th><td><?php echo $row3['intr1'];?></td></tr>
          <tr><th>അംഗത്തെ നിര്‍ദേശിച്ച വ്യക്തി :</th><td><?php echo $row['addedby'];?></td></tr>
          <tr><th>മുന്‍  വര്‍ഷത്തെ നിക്ഷേപം :</th><td><?php echo $row5['balance'];?></td></tr>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
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
