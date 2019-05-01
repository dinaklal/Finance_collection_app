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
<script src="/js/bootstrap-select.js"></script>

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
            <li><a href="month_report.php">പ്രതിമാസ റിപ്പോര്‍ട്ട്</a></li>
               <li  class= "active"><a href="loan.php">വായ്പ എടുക്കുക </a></li>
               
		
            <li><a href="interest_pay.php">വായ്പ പലിശ അടയ്ക്കുക </a></li>
             <li ><a href="interest_report.php">വാര്‍ഷിക പലിശ റിപ്പോര്‍ട്ട് </a></li>
              <li ><a href="loan_return.php">വായ്പ തിരിച്ചടവ്</a></li>
               <li><a href="other_income.php">മറ്റു വരവുകള്‍  </a></li>
              <li><a href="other_expense.php"> മറ്റു ചിലവുകള്‍   </a> ‍</li>
              <li><a href="report.php">റിപ്പോര്‍ട്ട് ‍ </a></li>
              

          </ul>
       
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image:url('images/1.jpg') ;background-repeat: no-repeat; background-position: center;background-size: cover;">
           <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image:url('images/1.jpg') ;background-repeat: no-repeat; background-position: center;background-size: cover;">
            <center>  <b> <h1  style="color:green;font-weight: 10000; text-shadow: 2px 2px green;">വായ്പ ഫോം</h1></b></center>
          
          
            <form class="form-signin" role="form" id="id_visi" action="loan.php" method="POST">
   		<div class="form-group">
           <span class="label label-primary">അംഗത്തിന്‍റെ പേര്</span>
        <select class="form-control" form="id_visi" class="form-control" name="name" required >
              
          <?php
            require_once 'db_connect.php';
            $sql="SELECT * FROM members ORDER BY member_id";
            $res=mysqli_query($con,$sql);
            while ($row=  mysqli_fetch_array($res))
            {
                ?>
             
            
        
       
             
                      <option value="<?php echo $row['member_id'];?>"><?php $moo= $row['name']; echo " ".$moo?>
                          </option  > 
                             <?php
            }
            
            ?></select>	</div >
      
        <input type="number" class="form-control" placeholder="വായ്പാ തുക " name="amount" required><br>
        <div class="form-group">
           <span class="label label-primary">വായ്പ എടുക്കുന്ന മാസം </span>
        <select class="form-control" form="id_visi" class="form-control" name="month" required >
              
          <?php
          
            $sql="SELECT * FROM month ORDER BY id";
            $res=mysqli_query($con,$sql);
            while ($row=  mysqli_fetch_array($res))
            {
                ?>
             
            
        
       
             
                      <option value="<?php echo $row['id'];?>"><?php $moo= $row['name']; echo " ".$moo?>
                          </option  > 
                             <?php
            }
            
            ?></select>	</div >
        

          
           
                           
                          
                           
      
        
           
            
            <div class="col-sm-7"><br>
                <button type="submit" name="submit" from="id_visi" class="btn btn-lg btn-danger" value="submit">വായ്പ എടുക്കുക  </button>
            </form>
            
            </div>
      </form>
        
<?php


        if(isset($_POST['submit']))
        {
            $name=$_POST['name'];
            $month=$_POST['month'];
            $amount=$_POST['amount'];
             $dat=date("Y-m-d"); 
             $sql="SELECT * FROM members WHERE member_id=$name";
            $res=mysqli_query($con,$sql);
            $r44=  mysqli_fetch_array($res);
            $name_mem=$r44['name'];
          
            $sql="SELECT * FROM loan WHERE member_id=$name";
            $res=mysqli_query($con,$sql);
            $r44=  mysqli_fetch_array($res);
            if(!$r44)
            {
                 for($k=$month;$k<=12;$k++)
                {
                     $in=  (float)$amount;
                     $in=($in*1)/100;
                      $sql="INSERT INTO interest (member_id,month_id,amount,date) values ($name,$k,$in,'$dat')";
                      $re4=  mysqli_query($con, $sql);
                     
                }
                $sql="INSERT INTO loan (member_id,p_amount,loan_month,loan_date) values ($name,$amount,$month,'$dat')";
                $res=  mysqli_query($con, $sql);
               if($res)
                {
                    echo ' <body onLoad="s()">';
                }
                else 
                {
                    echo mysqli_error($con);
                }
               
                 
                
            }
            else 
            {
                $old=$r44['p_amount'];
                $total=$old+$amount;
                  for($k=$month;$k<=12;$k++)
                {
                     $in=  (float)$total;
                     $in=($in*1)/100;
                      $sql="UPDATE interest SET amount=$in , date='$dat' WHERE member_id=$name AND month_id=$k ";
                      $re4=  mysqli_query($con, $sql);
                     
                }
                   $sql="UPDATE loan SET p_amount=p_amount+$amount,loan_date=$dat WHERE member_id=$name";
                $res=  mysqli_query($con, $sql);
                
                if($res)
                {
                    echo ' <body onLoad="w()">';
                }
                else 
                {
                    echo mysqli_error($con);
                }
            }
        }

?>

               
              
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
  <script>

function s() {
    

   var amount="<?php echo $amount;?>";
   var mem="<?php echo $name_mem;?>";
   

	swal({ title:"   കൈരളി സ്വാശ്രയ സംഘം",text:" "+mem+" "+amount+"രൂപ വായ്പ  എടുത്തിരിക്കുന്നു ", type:"success"},function(){
        window.location.href = 'loan.php';});
}
</script>
<script>
function w() {
    

   var amount="<?php echo $amount;?>";
   var mem="<?php echo $name_mem;?>";
    var tota="<?php echo $total;?>";
   

	swal({ title:"   കൈരളി സ്വാശ്രയ സംഘം",text:" "+mem+" "+amount+"രൂപ കൂടി വായ്പ  എടുത്തിരിക്കുന്നു (ആകെ തുക :"+tota+"രൂപ ) ", type:"success"},function(){
        window.location.href = 'loan.php';});
}





</script>


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
