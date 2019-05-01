
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
       <script>
   $(".myBox").click(function() {
  window.location = $(this).find("a").attr("href"); 
  return false;
});
</script>




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
              <li ><a href="other_income.php">മറ്റു വരവുകള്‍  </a></li>
              <li ><a href="other_expense.php"> മറ്റു ചിലവുകള്‍   </a> ‍</li>
              <li class="active"><a href="report.php">റിപ്പോര്‍ട്ട് ‍ </a></li>
          </ul>
       
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image:url('images/1.jpg') ;background-repeat: no-repeat; background-position: center;background-size: cover;">
            <center>  <b> <h1  style="color:green;font-weight: 10000; text-shadow: 2px 2px green;">റിപ്പോര്‍ട്ടുകള്‍ ‍‍</h1></b></center>
                     
            
            <h1>  <?php $month= (int)date('m');?></h1>
            <?php
                 require_once 'db_connect.php';
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
              
                
                
                ?>
            
            <div class="col-md-4">
            <div class='table-responsive' >
                <table class='table table-responsive' id='ttr' style='background-color:white; -webkit-column-width: 100px;-moz-column-width: 100px;column-width: 100px;'>
                    <tr > <th class="col-md-5"><h2><?php echo date(' Y'); ?></h2></th><th class="col-md-2"><h2><?php echo $row3['name'];?></h2></th></tr>
                <tr><th class="col-md-1">ആകെ ചെലവ് :</th><td ><?php echo $row2['su']+$row5['suma'];?> രൂപ <br></td></tr>
   <tr><th>ആകെ വരവ് :</td><td><?php echo $row1['su']+$row6['suma']+$row4['suma'];?> രൂപ </td></tr> 
                </table> 
            </div>
            </div><div class="col-md-5 col-sm-offset-2">
                <pre><b><center>വിവരങ്ങള്‍</center>
 ആകെ അടച്ച നിക്ഷേപം      :<?php echo $row6['suma'];?> രൂപ 
 ആകെ എടുത്ത വായ്പ തുക   :<?php echo $row5['suma'];?> രൂപ 
 ആകെ അടച്ച  പലിശ         :<?php echo $row4['suma'];?> രൂപ 
 മറ്റിനങ്ങള്‍ ആകെ ചെലവ്    : <?php echo $row2['su'];?> രൂപ 
 മറ്റിനങ്ങള്‍  ആകെ വരവ്     : <?php echo $row1['su'];?> രൂപ                 </pre></b>
        </div>
     
            <div class="row">
                
            </div>  <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image:url('images/1.jpg') ;background-repeat: no-repeat; background-position: center;background-size: cover;">
                <div class="row" style="background: darkblue;">   <center >  <b> <h3  style="color:white;font-weight: 5000;">റിപ്പോര്‍ട്ട്  നിര്‍മ്മിക്കുക </h3></b></center></div>
            <form class="active" action="report.php" method="POST">
                <br><div class="col-sm-4 col-sm-offset-2"><div class="form-group">
            <span class="label label-primary">മാസം</span>
        <select class="form-control" id="id_visi" class="form-control" name="month" required >
            <option value="0" >മാസം
                          </option  >    <?php
          $sql="SELECT * FROM month ORDER BY id";
            $res=mysqli_query($con,$sql);
            while ($row=  mysqli_fetch_array($res))
            {
                ?>
             
            <option value="<?php echo $row['id'];?>"><?php $moo= $row['name']; echo " ".$moo?>
                          </option  >
                          
                           
         <?php
            }
            
          ?>
         </select></div>
            </div>
            
            <div class="col-sm-3 "><br>
                <button type="submit" name="submit" class="btn btn-lg btn-danger" value="submit">റിപ്പോര്‍ട്ട്  കാണുക </button>
            </form>

            
            </div></div>
              
          
                <div class="row placeholders">
            <div class="col-xs-8 col-sm-3 placeholder">
                <button type="button" onclick="w1()" class="btn btn-lg btn-danger">&nbsp&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;റിപ്പോര്‍ട്ട് പൂര്‍ണ്ണം &nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp; </button></a>
            
            </div>
            <div class="col-xs-8 col-sm-3 placeholder">
               <button type="button" onclick="w2()"  class="btn btn-lg btn-danger">&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;റിപ്പോര്‍ട്ട്  PDF&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp;&nbsp&nbsp; </button></a>
             
            </div>
                      <div class="col-xs-8 col-sm-3 placeholder">
            <button type="button" onclick="w()"  class="btn btn-lg btn-danger">മറ്റ് ചെലവ് വരവ് കണക്ക് </button></a>
             
            </div>
                     <div class="col-xs-8 col-sm-3 placeholder">
                          <button onclick="w()" type="button" class="btn btn-lg btn-danger">അംഗങ്ങള്‍  PDF റിപ്പോര്‍ട്ട് </button></a>
             
            </div>
            </div></div></div>
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
    if(isset($_POST['submit']))
    {
    $month=$_POST['month'];
               if($month==0)
               {
                    unset($_POST['submit']);
                    echo ' <body onLoad="s()">';
               }
            else {
                 ?><script type="text/javascript" language="Javascript">window.location.href='report2.php?month=<?php echo $month;?>';</script><?php

            }
              }

}

else
 {
  $_SESSION['error'] = "Please Login to continue";
  header("Location: index.php");
}
?>
 <script>

function s() {
    



	swal({ title:"   കൈരളി സ്വാശ്രയ സംഘം",text:"മാസം  തിരഞ്ഞെടുക്കുക !", type:"warning"},function(){
    window.location.href = 'report.php';});
}





</script>

  <script>

function w1() {
    



	
    window.location.href = 'report3.php?type=1';
}





</script>
<script>
function w2() {
    



	
    window.open( 'print2.php');
}





</script>
  <script>

function w() {
    



	swal({ title:"   കൈരളി സ്വാശ്രയ സംഘം",text:"ഈ ഭാഗം അടുത്ത വേര്‍ഷനില്‍  ലഭിക്കുന്നതാണ്", type:"warning"},function(){
    window.location.href = 'report.php';});
}





</script>