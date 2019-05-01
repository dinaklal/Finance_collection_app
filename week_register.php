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

function s() {
    



	swal({ title:"   കൈരളി സ്വാശ്രയ സംഘം",text:"മാസം വാരം എന്നിവ തിരഞ്ഞെടുക്കുക !", type:"warning"},function(){
    window.location.href = 'week_register.php';});
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
            <li class= "active"><a href="week_register.php">പ്രതിവാര നിക്ഷേപം</a></li>
            <li ><a href="month_report.php">പ്രതിമാസ റിപ്പോര്‍ട്ട്</a></li>
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
            <center>  <b> <h1  style="color:green;font-weight: 10000; text-shadow: 2px 2px green;">പ്രതിവാര നിക്ഷേപം</h1></b></center>
            
            <form class="active" action="week_register.php" method="POST">
            <div class="col-sm-2"><div class="form-group">
            <span class="label label-primary">മാസം</span>
        <select class="form-control" id="id_visi" class="form-control" name="month" required >
              <option value="0">മാസം
                          </option  >
          <?php
            require_once 'db_connect.php';
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
            <div class="col-sm-2"><div class="form-group">
            <span class="label label-primary">വാരം</span>
            <select  class="form-control"  class="form-control" name="week" required >
                <option value="0">വാരം
                          </option  >
                           <option value="1">ഒന്നാം വാരം
                          </option  >
                           <option value="2">രണ്ടാം വാരം
                          </option  >
                           <option value="3">മൂന്നാം വാരം
                          </option  >
                           <option value="4">നാലാം വാരം
                          </option  >
                          <option value="5">അഞ്ചാം വാരം
                          </option  >
                
                
            </select>
                </div>
            </div>
            <div class="col-sm-3 "><br>
                <button type="submit" name="submit" class="btn btn-lg btn-danger" value="submit">തിരയുക </button>
            </form>
            
            </div>
      </form>
        
<?php


        if(isset($_POST['submit']))
        {
          ?>
          
  <?php          $month=$_POST['month'];
                $week=$_POST['week'];
                if($month==0 or $week==0)
                {
                    unset($_POST['submit']);
                    echo ' <body onLoad="s()">';
                    
                }
                else
                {
                $sq="SELECT name from month WHERE id=$month";
                $red=  mysqli_query($con, $sq);
                $red1=  mysqli_fetch_array($red);
                
           
            $week1="w".$week;
            $sql="SELECT members.member_id as id,week_register.sino as sino,week_register.amount as amount ,members.name as name,month.name as mname FROM week_register join members on members.member_id=week_register.member_id join month on 
                    month.id=week_register.month_id WHERE month_id=$month AND week=$week";
            $res=  mysqli_query($con, $sql);
          
                 echo "<div class='row'>
         <br><h2><div class='col-sm-12' ><div id='ee' style='margin-top:8px;background:darkblue;text-align:center;color:white;font-weight: 1000; text-shadow: 2px 2px green'>".$red1['name']."-----വാരം".$week."-----</h2   ></div>
             <br> </div><div class='col-sm-3'></div><div class='col-sm-6 col-md-7'> <div class='table-responsive'><table class='table table-responsive' style='background-color:white;'>
              <thead>
                <tr>
                  <th>അംഗത്വ നമ്പര്‍</th>
                  <th>അംഗത്തിന്‍റെ പേര്</th>
                    <th>നിക്ഷേപം</th>
                 
              </thead>
              <tbody>";
                 echo "   <form action='week_update.php' id='carform' method='POST'>";     
          while ($row = mysqli_fetch_array($res))
            {
                echo "<tr> <td>KR".$row['id']."</td><td>".$row['name']."</td><td>";
                
                
                if($row['amount']==NULL  )
                {
                    echo " <select  name=". $row['sino']."   class='selectpicker' form='carform' >
     <option value='100'>100</option>
    <option value='0'>0</option></select></td></tr>";
                }
                  elseif ($row['amount']==100)
                 {
                           echo "<select  name=". $row['sino']."  class='selectpicker'  form='carform' >
     <option value='100' data-icon='glyphicon glyphicon-ok'>100</option>
    <option value='0'>0</option></select></td></tr>";
                }
                else
                {
                    echo "<select name=". $row['sino']."  class='selectpicker' form='carform'>
     <option value='0'>0</option>
    <option value='100'>100</option></select></td></tr>";
                }
                
            } 
                   
            ?>
      
      
  
        </div>
      </div>
    </table>
    <div class="col-lg-offset-11"  ><button type="submit" class="btn btn-lg btn-danger"value="sumbmit">ചേര്‍ക്കുക</button></div>
     </form>     </div>
        </div>
      </div>
         <?php
        }
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
