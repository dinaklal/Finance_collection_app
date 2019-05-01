
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
  <script>
  $(document).ready(function () {
    $('.selectpicker').selectpicker();
  });
</script>
<script>
function s() {
    



	swal({ title:"   കൈരളി സ്വാശ്രയ സംഘം",text:"വായ്പയുള്ള അംഗത്തെ തിരഞ്ഞെടുക്കുക  !", type:"warning"},function(){
    window.location.href = 'loan_return.php';});
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
         
           <li ><a href="shops.php">അംഗങ്ങളെ കാണുക</a></li>
                 <li ><a href="week_register.php">പ്രതിവാര നിക്ഷേപം</a></li>
            <li><a href="month_report.php">പ്രതിമാസ റിപ്പോര്‍ട്ട്</a></li>
            <li><a href="loan.php">വായ്പ എടുക്കുക </a></li>
            
		
            <li><a href="interest_pay.php">വായ്പ പലിശ അടയ്ക്കുക </a></li>
             <li ><a href="interest_report.php">വാര്‍ഷിക പലിശ റിപ്പോര്‍ട്ട് </a></li>
              
            <li class= "active"><a href="loan_return.php">വായ്പ തിരിച്ചടവ്</a></li>
             <li><a href="other_income.php">മറ്റു വരവുകള്‍  </a></li>
              <li><a href="other_expense.php"> മറ്റു ചിലവുകള്‍   </a> ‍</li>
              <li><a href="report.php">റിപ്പോര്‍ട്ട് ‍ </a></li>
          </ul>
       
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image:url('images/1.jpg') ;background-repeat: no-repeat; background-position: center;background-size: cover;">
            <center>  <b> <h1  style="color:green;font-weight: 10000; text-shadow: 2px 2px green;">വായ്പ തിരിച്ചടവ് </h1></b></center>
            
            <form class="active" action="loan_return.php" method="POST">
            <div class="col-sm-4"><div class="form-group">
            <span class="label label-primary">അംഗത്തിന്‍റെ പേര് :</span>
        <select class="form-control" id="id_visi" class="form-control" name="member_id" required >
            <option value="0">അംഗത്തിന്‍റെ പേര് തിരഞ്ഞെടുക്കുക
                          </option  >
            
          <?php
            require_once 'db_connect.php';
            $sql="SELECT loan.member_id as member_id, members.name as name FROM loan join members on loan.member_id =members.member_id
             WHERE loan.p_amount!=0   ORDER BY loan.member_id ";
            $res=mysqli_query($con,$sql);
            while ($row=  mysqli_fetch_array($res))
            {
                ?>
             
            <option value="<?php echo $row['member_id'];?>"><?php $moo= $row['name']; echo " ".$moo?>
                          </option  >
                          
                           
         <?php
            }
            
          ?>
         </select></div>
            </div>
            
            <div class="col-sm-3 "><br>
                <button type="submit" name="submit" class="btn btn-lg btn-danger" value="submit">തിരയുക </button>
            </form>
            
            </div>
      </form>
        
<?php


        if(isset($_POST['submit']))
        {
            $member_id=$_POST['member_id'];
            if($member_id==0)
            {
                 unset($_POST['submit']);
                    echo ' <body onLoad="s()">';
            }
                
              
            $sql="SELECT loan.p_amount as p_amount,loan.member_id as member_id, members.name as name FROM loan join members on 
                loan.member_id =members.member_id WHERE loan.member_id=$member_id ";
            $res=  mysqli_query($con, $sql);
            $row = mysqli_fetch_array($res);
            echo "<div class='row'>
         <br><h2><div class='col-sm-12' ><div id='ee' style='margin-top:8px;background:darkblue;text-align:center;color:white;font-weight: 1000; text-shadow: 2px 2px green'>".$row['name']."</h2   ></div>
             <br> </div><div class='col-sm-3'></div><div class='col-sm-6 col-md-7'> <div class='table-responsive'><table class='table table-responsive' style='background-color:white;'>
              <thead>
                <tr>
                  <th class='col-md-5'>അംഗത്വ നമ്പര്‍</th><td>".$row['member_id']."</td>
                  </tr><tr>
                  
                  <th>അംഗത്തിന്‍റെ പേര്</th><td>".$row['name']."</td></tr>
                  <tr>  <th>ആകെ വായ്പ തുക </th><td>".$row['p_amount']."</td></tr>
               ";
                 echo "  <tr> <th>വായ്പ തിരിച്ചടക്കുന്ന മാസം </th> <td><form action='loan_return_2.php' id='caform' method='POST'>";     
            $sq="SELECT * FROM month ORDER BY id";
            $res1=mysqli_query($con,$sq);
            ?>
    
      <div class="form-group">
            <span class="label label-primary">മാസം തിരഞ്ഞെടുക്കുക</span>
            <select class="form-control" id="id_visi" class="form-control" name="month" form="caform" required >
             
                          <?php
                          
            while ($row1=  mysqli_fetch_array($res1))
            {
                ?>
             
            <option value="<?php echo $row1['id'];?>"><?php $moo= $row1['name']; echo " ".$moo?>
                          </option  >
                          
                           
         <?php
            }
           
                echo "</select></td></tr><tr><th>അടയ്ക്കുന്ന തുക </th><td>";
                   
            ?>
      
                          <input type="hidden" value="<?php echo $member_id;?>" name="member_id">
                          <input type="hidden" value="<?php echo $row['p_amount'];?>" name="old">
                          <input type="number" class="form-control" value="<?php echo $row['p_amount'] ;?>" placeholder="<?php echo $row['p_amount'] ;?>"name="amount" required><br>
        </div>
      </div>
    </table>
    <div class="col-lg-offset-11"  ><button type="submit" class="btn btn-lg btn-danger"value="sumbmit">തുക തിരിച്ചടയ്ക്കുക </button></div>
     </form>     </div>
        </div>
      </div>
         <?php
        }
        
?>
    

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
