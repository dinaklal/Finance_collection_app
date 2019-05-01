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
    <![endif]--><?php
session_start();
if(isset($_SESSION['user']))
{
    ?>
<?php


    require_once 'db_connect.php';
    $names=array();
   //$s=$_POST['2'];
    //echo $s;
    $names=$_POST;
    $dat=date("Y-m-d"); 
   
    foreach ($names as $old=>$new)
    {
       if($new==0)
       {
        $sql="UPDATE interest SET status=0 , date='$dat' WHERE sino ='$old'";
       }
       else
       {
           $sql="UPDATE interest SET status=1 , date='$dat' WHERE sino ='$old'";
       }
       
      
        $res=mysqli_query($con, $sql);
     
    }
   echo ' <body onLoad="s()">';
    ?>
   <html>
<script src="m/dist/sweetalert.min.js"></script> <link rel="stylesheet" type="text/css" href="m/dist/sweetalert.css">
<script>
function s() {
     



	swal({ title:"   കൈരളി സ്വാശ്രയ സംഘം",text:"പ്രതിമാസ റിപ്പോര്‍ട്ട് പരിശോധിച്ച് ഉറപ്പ് വരുത്തുക ", type:"success"},function(){
    window.location.href = 'interest_report.php';});
}
</script>

<?php
}
else
 {
  $_SESSION['error'] = "Please Login to continue";
  header("Location: index.php");
}
?>
