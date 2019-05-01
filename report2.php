<?php
session_start();
if(isset($_SESSION['user']))
{
    require_once 'db_connect.php';

            $month=$_GET['month'];
            
              $sql="SELECT name FROM month WHERE id='$month'";
                $res=mysqli_query($con,$sql);
                $row0=  mysqli_fetch_array($res);
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
<script src="/js/bootstrap-select.js"></script>
  <script>

function s() {
    



	swal({ title:"   കൈരളി സ്വാശ്രയ സംഘം",text:"മാസം  തിരഞ്ഞെടുക്കുക !", type:"warning"},function(){
    window.location.href = 'month_report.php';});
}





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
            <li><a href="shops.php">അംഗങ്ങളെ കാണുക</a></li>
            <li ><a href="week_register.php">പ്രതിവാര നിക്ഷേപം</a></li>
            <li ><a href="month_report.php">പ്രതിമാസ റിപ്പോര്‍ട്ട്</a></li>
           <li><a href="loan.php">വായ്പ എടുക്കുക </a></li>
            
		
            <li><a href="interest_pay.php">വായ്പ പലിശ അടയ്ക്കുക </a></li>
             <li ><a href="interest_report.php">വാര്‍ഷിക പലിശ റിപ്പോര്‍ട്ട് </a></li>
              <li ><a href="loan_return.php">വായ്പ തിരിച്ചടവ്</a></li>
               <li><a href="other_income.php">മറ്റു വരവുകള്‍  </a></li>
              <li><a href="other_expense.php"> മറ്റു ചിലവുകള്‍   </a> ‍</li>
              <li class= "active"><a href="report.php">റിപ്പോര്‍ട്ട് ‍ </a></li>
          </ul>
       
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image:url('images/1.jpg') ;background-repeat: no-repeat; background-position: center;background-size: cover;">
            <center>  <b> <h1  style="color:green;font-weight: 10000; text-shadow: 2px 2px green;">പ്രതിമാസ റിപ്പോര്‍ട്ട്  - <?php echo $row0['name'];?></h1></b></center>
        
            
            </div>
      </form>
        
<?php

            $sql="SELECT sum(amount) as su FROM others WHERE status=1 AND month(date)='$month'";
                $res=mysqli_query($con,$sql);
                $row1=  mysqli_fetch_array($res);
               
                 $sql="SELECT sum(amount) as su FROM others WHERE status=0 AND month(date)='$month'";
                $res=mysqli_query($con,$sql);
                $row2=  mysqli_fetch_array($res);
                 $sql="SELECT name FROM month WHERE id='$month'";
                $res=mysqli_query($con,$sql);
                $row3=  mysqli_fetch_array($res);
                   $sql="SELECT sum(amount)as suma FROM interest WHERE month(date)='$month'  AND status=1";
                $res=mysqli_query($con,$sql);
                $row4=  mysqli_fetch_array($res);
                  $sql="SELECT sum(p_amount)as suma FROM loan WHERE month(loan_date)='$month'  ";
                $res=mysqli_query($con,$sql);
                $row5=  mysqli_fetch_array($res);
                    $sql="SELECT sum(amount)as suma FROM week_register WHERE month(date)='$month'  ";
                $res=mysqli_query($con,$sql);
                $row6=  mysqli_fetch_array($res);
              $sql="SELECT distinct member_id FROM week_register WHERE amount<1 AND month_id='$month'";
                $res=mysqli_query($con,$sql);
                 $sql="SELECT  member_id FROM interest WHERE (status is NULL OR status=0) AND month_id='$month'";
                $res8=mysqli_query($con,$sql);
                ?>
      <DIV class="row">
          <div class="col-md-offset-3 col-md-8">
        <div class='table-responsive' >
            <table class='table table-bordered' id='ttr' style='background-color:white; -webkit-column-width: 100px;-moz-column-width: 100px;column-width: 100px;'>
                <tr><th class="col-md-4">ആകെ വരവ് :</td><td ><?php echo $row6['suma']+$row1['su']+$row4['suma'];?>&nbspരൂപ</td></tr>
             
                 <tr><th>ആകെ ചെലവ് :</td><td><?php echo $row2['su']+$row5['suma'];?>&nbspരൂപ </td></tr>
                 <tr><th>ആകെ  നിക്ഷേപം:</td><td><?php echo $row6['suma'];?>&nbspരൂപ </td></tr>
                 <tr><th>ആകെ കൊടുത്ത വായ്പ   :</th><td><?php echo $row5['suma'];?>&nbspരൂപ </td></tr>
                  <tr><th>പലിശ ഇനവരുമാനം:</th><td><?php echo $row4['suma'];?>&nbspരൂപ </td></tr>
                   <tr><th>മറ്റിന വരുമാനം ‍:</th><td><?php  echo $row1['su'];?>&nbspരൂപ </td></tr>
                    <tr><th>മറ്റിന ചെലവ് :‌</th><td><?php echo $row2['su'];?>&nbspരൂപ </td></tr>
                     <tr><th>നിക്ഷേപം മുടക്കിയ അംഗങ്ങള്‍ :</th><td><?php while($row7=  mysqli_fetch_array($res))
                     {
                         echo "KR".$row7['member_id']." ,  ";
                     }?></td></tr>
                     <tr><th>പലിശ തരാത്ത അംഗങ്ങള്‍  :</th><td><?php while($row8=  mysqli_fetch_array($res8))
                     {
                         echo "KR".$row8['member_id']." ,  ";
                     }?></td></tr>
       
          </div>
                             <div class="row placeholders">
            <div class="col-xs-8 col-sm-3 placeholder">
                <button type="button" onclick="w()" class="btn btn-lg btn-danger"> PDF രൂപത്തില്‍  ലഭിക്കുക  </button></a>
            
            </div>            <div class="col-md-3 col-md-offset-2" >
                <a href="report.php" > <button type="button" class="btn btn-lg btn-success">തിരിച്ച് പോവുക</button></a>
            </div>
        



               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="/bootstrap-select-1.12.1/dist/css/bootstrap-select.css">
    <link rel="stylesheet" href="/bootstrap-select-1.12.1/dist/css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="/bootstrap-select-1.12.1/dist/js/bootstrap-select.js"></script>
<script src="/bootstrap-select-1.12.1/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="/bootstrap-select-1.12.1/dist/js/i18n/defaults-*.min.js"></script>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="css/bootstrap-select.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="js/i18n/defaults-*.min.js"></script>


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
<script>
    function w()
    {
        window.open('print.php?id=<?php echo $month;?>');
    }
    </SCRIPT>
