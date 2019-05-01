<html>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/kairaly.ico">
<script src="m/dist/sweetalert.min.js"></script> <link rel="stylesheet" type="text/css" href="m/dist/sweetalert.css">
<script>

function s()
{
  

	swal({ title:"കൈരളി സ്വാശ്രയസംഘം",text:"വീണ്ടും കാണാം!", type:"success"},function(){
    window.location.href = 'index.php';});
}
</script><?php

    session_start();
    session_destroy();
   echo ' <body onLoad="s()">';
    ?>
   