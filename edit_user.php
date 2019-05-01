
<?php
session_start();
if(isset($_SESSION['user']))
{
    $member_id=$_GET['id'];
    require_once 'db_connect.php';
    
    $sql="SELECT * FROM members WHERE member_id=$member_id ";
    $res=  mysqli_query($con, $sql);
    $row=  mysqli_fetch_array($res);
    $sql1="SELECT * FROM account WHERE member_id=$member_id ";
    $res1=  mysqli_query($con, $sql1);
    $row1=  mysqli_fetch_array($res1);
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
             <li class= "active"><a href="add_customer.php">പുതിയ അംഗത്തെ ചേര്‍ക്കുക</a></li>
            <li><a href="shops.php">അംഗങ്ങളെ കാണുക</a></li>
                <li ><a href="week_register.php">പ്രതിവാര നിക്ഷേപം</a></li>
            <li ><a href="month_report.php">പ്രതിമാസ റിപ്പോര്‍ട്ട്</a></li>
           <li><a href="loan.php">വായ്പ എടുക്കുക </a></li>
            
		
            <li><a href="interest_pay.php">വായ്പ പലിശ അടയ്ക്കുക </a></li>
             <li ><a href="interest_report.php">വാര്‍ഷിക പലിശ റിപ്പോര്‍ട്ട് </a></li>
              <li ><a href="loan_return.php">വായ്പ തിരിച്ചടവ്</a></li>
            
		
          </ul>
       
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image:url('images/1.jpg') ;background-repeat: no-repeat; background-position: center;background-size: cover;">
            <center>  <b> <h1  style="color:green;font-weight: 10000; text-shadow: 2px 2px green;">മെമ്പര്‍ ഷിപ്‌  ഫോം</h1></b></center>
          
          
          <form class="form-signin" role="form" action="editc.php" method="post">
   			  <div class="form-group">
            <span class="label label-primary">പേര്‍</span>
             
            <input type="text" class="form-control" placeholder="അംഗത്തിന്റെ പേര്"  value="<?php  echo $row['name'];?>" name="name" required><br>
                          </div>
                <div class="form-group">
            <span class="label label-primary">വയസ് ‍</span>
            <input type="number" class="form-control" placeholder="പ്രായം" value="<?php  echo $row['age'];?>" name="age" required><br>
       
                </div>
              
                <div class="form-group">
            <span class="label label-primary">ഫോണ്‍ നമ്പര്‍‍</span>
            
            <input type="number" class="form-control" placeholder="ഫോണ്‍ നമ്പര്‍" value="<?php  echo $row['phone'];?>" name="contact" required><br>
                </div>
       
        <div class="form-group">
            <span class="label label-primary">റേഷന്‍ കാര്‍ഡ്‌</span>
        <select class="form-control" class="form-control" value="<?php  echo $row['ration'];?>" name="ration" required >
             
                           <option>APL
                          </option value="APL" >
                           <option>BPL
                          </option value="BPL" >
                           
          </select></div>
        <div class="form-group">
            <span class="label label-primary">ചേരുന്ന തീയതി‌</span>
        <input type="date" class="form-control" placeholder="ചേരുന്ന തീയതി" value="<?php  echo $row['membership_date'];?>" name="jdate" required><br>
        </div>
          <div class="form-group">
            <span class="label label-primary">വിദ്യാഭ്യാസയോഗ്യത‍</span>
         <input type="text" class="form-control" placeholder="വിദ്യഭ്യാസയോഗ്യത" value="<?php  echo $row['educational_qualification'];?>"  name="edu" required><br>
        
          </div>
        
          <div class="form-group">
            <span class="label label-primary">വിലാസം</span>
            
            <input type="text" class="form-control" placeholder="വിലാസം‍" value="<?php  echo $row['address'];?>" name="address" required><br>
          </div>
         <div class="form-group">
            <span class="label label-primary">തൊഴില്‍</span>
            <input type="text" class="form-control" placeholder="അംഗത്തിന്‍റെ തൊഴില്‍"  value="<?php  echo $row['occupation'];?>" name="job" required><br>
        </div>
          <div class="form-group">
            <span class="label label-primary">തിരിച്ചറിയല്‍  രേഖ </span>
         <select class="form-control" class="form-control" name="idd"  value="<?php  echo $row['identity_proof'];?>" required >
             
                           <option>ആധാര്‍  കാര്‍ഡ്‌ 
                          </option  >
                           <option>ഇലക്ഷന്‍  ഐഡി
                          </option  >
                            <option>ഡ്രൈവിംഗ്  ലൈസന്‍സ്
                          </option  >
                           <option>മറ്റുള്ളവ 
                          </option  >
                           
          </select>
          </div>
        <div class="form-group">
        <div class="form-group">
            <span class="label label-primary">തിരിച്ചറിയല്‍  രേഖ നമ്പര്‍ :</span>
            <input type="text" class="form-control" placeholder="തിരിച്ചറിയല്‍  രേഖ നമ്പര്‍ " value="<?php  echo $row['details'];?>" name="idd1" required><br>
        </div>
            
               <div class="form-group">
            <span class="label label-primary">നിര്‍ദേശിച്ച വ്യക്തി :</span>
            <input type="text" class="form-control" placeholder="അംഗത്തെ നിര്‍ദേശിച്ച വ്യക്തി " value="<?php echo $row['addedby'];?>"name="nom" required><br>
        </div>
            
            <div class="form-group">
            <span class="label label-primary">മുന്‍ വര്‍ഷ ബാക്കി  :</span>
            <input type="number" class="form-control" placeholder="മുന്‍ വര്‍ഷ നിക്ഷേപം" value="<?php echo $row1['balance'];?>" name="pre" required><br>
        </div>
            <input type="hidden" name="member_id" value="<?php echo $member_id;?>">
       
        <button class="btn btn-lg btn-primary btn-block" type="submit">കൂട്ടി ചേര്‍ക്കുക</button>
      </form>
        



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
