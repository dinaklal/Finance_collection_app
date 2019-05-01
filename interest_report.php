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
                 <li class= "active"><a href="interest_report.php">വാര്‍ഷിക പലിശ റിപ്പോര്‍ട്ട് </a></li>
              <li ><a href="loan_return.php">വായ്പ തിരിച്ചടവ്</a></li>
               <li><a href="other_income.php">മറ്റു വരവുകള്‍  </a></li>
              <li><a href="other_expense.php"> മറ്റു ചിലവുകള്‍   </a> ‍</li>
              <li><a href="report.php">റിപ്പോര്‍ട്ട് ‍ </a></li>

          </ul>
       
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image:url('images/1.jpg') ;background-repeat: no-repeat; background-position: center;background-size: cover;">
           
              <?php
            require_once 'db_connect.php';
          
         
            
           echo " <div class='row'>
         <br><h2><div class='col-sm-12' ><div id='ee' style='margin-top:8px;background:darkblue;text-align:center;color:white;font-weight: 1000; text-shadow: 2px 2px green'></h2></div><br>";
               
                
    
       echo "
          <div class='table-responsive'>
            <table class='table table-responsive' style='background-color:white;'>
              <thead>
                <tr>
                 <th> അംഗത്വ നമ്പര്‍ </th>
                  <th>അംഗത്തിന്‍റെ പേര്</th>
                 
                  <th>വായ്പാ ബാക്കി</th>
                  <th>1</th>
                  <th>2</th>
                  <th>3</th>
                  <th>4</th>
                  <th>5</th>
                  <th>6</th>
                  <th>7</th>
                  <th>8</th>
                  <th>9</th>
                  <th>10</th>
                  <th>11</th>
                  <th>12</th>
		<th>ആകെ അടവ്</th>
                </tr>
              </thead>
              <tbody>";
      $q="SELECT loan.member_id as id,members.name as name ,loan.p_amount as amount, loan.loan_month as month FROM loan join members 
          on loan.member_id=members.member_id order by members.member_id";
          $res=mysqli_query($con,$q);
                 
          while ($row = mysqli_fetch_array($res))
       {

          $member_id=$row['id'];
          $name=$row['name'];
          $month=$row['month'];
          $amount=$row['amount'];
          echo "
          
                <tr  >
                  
                  <td >KR$member_id</td>
                <td> $name</td>
                     <td> $amount</td>
                  ";
          for($i=1;$i<$month;$i++)
          {
                echo "<td >--NA--</td>";
          }
           $q="SELECT  * FROM interest  WHERE member_id=$member_id ";
          $res1=mysqli_query($con,$q);
          while ($row2 = mysqli_fetch_array($res1))
          {
                    if($row2['status']==0)
                    {
                        echo "<td class='danger'>".$row2['amount']."</td>";
                    }
                    else if($row2['status']==1)
                    {

                      echo "<td class='success'>".$row2['amount']."</td>";
                    }
                    else
                    {

                        echo "<td >".$row2['amount']."</td>";
                    }

           }
          $q="SELECT  sum(amount) as tota FROM interest  WHERE member_id=$member_id AND status=1 ";
          $res1=mysqli_query($con,$q);
          $row2 = mysqli_fetch_array($res1);
          $tota=$row2['tota'];
           echo "       
                     
               
                      
                            <td>$tota</td>
				  
                      </tr>";
	}
                                      
        

?>

               
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
