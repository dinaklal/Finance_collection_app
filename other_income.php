
<?php
session_start();
if(isset($_SESSION['user']))
{
     require_once 'db_connect.php';
    $sql="SELECT * FROM others WHERE status=1";
    $res=mysqli_query($con,$sql);
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
              <li class="active"><a href="other_income.php">മറ്റു വരവുകള്‍  </a></li>
              <li><a href="other_expense.php"> മറ്റു ചിലവുകള്‍   </a> ‍</li>
              <li><a href="report.php">റിപ്പോര്‍ട്ട് ‍ </a></li>
          </ul>
       
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image:url('images/1.jpg') ;background-repeat: no-repeat; background-position: center;background-size: cover;">
            <center>  <b> <h1  style="color:green;font-weight: 10000; text-shadow: 2px 2px green;">മറ്റു വരവുകള്‍</h1></b></center>
                     
          
            <form class="form-signin" role="form" action="other_income.php" method="post">  
                <div class="form-group">
                <span class="label label-primary">വരവിനം :</span>
                <input type="text" class="form-control" placeholder="വരവിന്‍റെ തുകയുടെ സ്രോതസ്സ്" name="src" required><br>
            </div>
                <div class="form-group">
                <span class="label label-primary">വരവ് തുക :</span>
                <input type="number" class="form-control" placeholder="വരവ്  തുക  " name="amount" required><br>
            
   			<button class="btn btn-lg btn-primary btn-block"  name="submit"  type="submit">കൂട്ടി ചേര്‍ക്കുക</button>
          </form>
        </div>
      </div>
          
          <DIV class="row">
          <div class="col-md-offset-3 col-md-8">
        <div class='table-responsive' >
            <table class='table table-bordered' id='ttr' style='background-color:white; -webkit-column-width: 100px;-moz-column-width: 100px;column-width: 100px;'>
               
                
                <tr><th class="col-md-4">കാരണം </td><td class="col-md-4">വരവ് തുക </td><td class="col-md-2"> തീയതി</td></tr>
                
                <?php
                while($row=  mysqli_fetch_array($res))
                {
                    ?><tr><th><?php echo $row['reason'];?></td><td><?php echo $row['amount'];?>&nbspരൂപ </td><td><?php echo $row['date'];?></td></tr>
                    <?php
                }?>
                
       
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
    require_once 'db_connect.php';
if(isset($_POST['submit']))
{
    $resr=$_POST['src'];
    $amount=$_POST['amount'];
    $dat=date('Y-m-d');
    $sql="INSERT INTO others (reason,amount,status,date) VALUES ('$resr','$amount',1,'$dat')";
   
    $res=mysqli_query($con, $sql);
    if($res)
    {
        echo '<body onLoad="s()">';
    }
    else
    {
          echo mysqli_error($con);
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
     var a= "<?php echo $amount; ?>";



	swal({ title:"   കൈരളി സ്വാശ്രയ സംഘം",text:" "+a+"രൂപ വരവ് ചെയ്തിരിക്കുന്നു. ", type:"success"},function(){
    window.location.href = 'other_income.php';});
}
</script>