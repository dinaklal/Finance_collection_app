<html>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/kairaly.ico">
    <script src="m/dist/sweetalert.min.js"></script> <link rel="stylesheet" type="text/css" href="m/dist/sweetalert.css">
<script src="js/bootstrap-select.js"></script>
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

<script src="m/dist/sweetalert.min.js"></script> <link rel="stylesheet" type="text/css" href="m/dist/sweetalert.css">
<script>
function w() {
swal({   title: "കൈരളി - സ്വാശ്രയസംഘം",   text: "PASSWORD തെറ്റാണ്.!",   type: "warning",  
 showCancelButton: false,   confirmButtonColor: "#DD6B55",   confirmButtonText: "വീണ്ടും ശ്രമിക്കുക!",   closeOnConfirm: false },
 function(){
    window.location.href = 'index.php';});

 
};
</script>
<?php
session_start();
$pass=$_POST['passwd'];
$name=$_POST['name'];
require_once 'db_connect.php';
$q="SELECT * FROM admin WHERE username='$name' and password='$pass'";
$res=mysqli_query($con,$q);
$row=  mysqli_fetch_array($res);
if($row)
{
        $_SESSION['user']=$name;
	header("Location:home.php");
}
else
{

	echo ' <body onLoad="w()">';
}
?>