
<?php

session_start();
if(isset($_SESSION['user']))
{
    
    
	$name=$_POST['name'];
	$cont=$_POST['contact'];
        $age=$_POST['age'];
	$type=$_POST['ration'];
	$date=$_POST['jdate'];
	$ed=$_POST['edu'];
	$user=$_SESSION['user'];
	$adr=$_POST['address'];
        $job=$_POST['job'];
        $id_c=$_POST['idd'];
        $id_c1=$_POST['idd1'];
        $nom=$_POST['nom'];
        $pre=$_POST['pre'];

   
	
           	
               require_once('db_connect.php');
         
                 $i=0;
          
            
      


	//$qr="INSERT INTO customer ( `name`,`place`,`contact`,`type`, `model`, `description`, `problem`,`date`,`status`,`amount`) VALUES ('$name','$plce','$con','$type','$model','$det','$pblm','$date','pending',0);";
	$sql = "INSERT INTO members (`name`, `age`, `address`, `ration`, `educational_qualification`, `membership_date`, `addedby`,`phone`,`occupation`,`identity_proof`,`details`) VALUES ('$name','$age','$adr','$type','$ed','$date','$nom','$cont','$job','$id_c','$id_c1');";

		    $res=mysqli_query($con,$sql);
                        $dat=date("Y-m-d"); 
                         $id="SELECT max(member_id) as m FROM `members`";
            $r=mysqli_query($con,$id);
            $row=mysqli_fetch_array($r);
            $i=$i+$row['m'];
           
           $sql="INSERT INTO account (member_id,balance,updated_date) values ('$i','$pre','$dat');";
           $res=  mysqli_query($con, $sql);
           for($k=1;$k<=12;$k++)
           {
               for($l=1;$l<=5;$l++)
               {
                $sql="INSERT INTO week_register (member_id,month_id,week) VALUES ($i,$k,$l);";
                $res=  mysqli_query($con, $sql);
               }
           }
			if($res)
			{
				echo ' <body onLoad="s()">';
			}

		
?>
<html>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/kairaly.ico">
<script src="m/dist/sweetalert.min.js"></script> <link rel="stylesheet" type="text/css" href="m/dist/sweetalert.css">
<script>
function s() {
     var a= "<?php echo $i; ?>";



	swal({ title:"   കൈരളി സ്വാശ്രയ സംഘം",text:"പൂര്‍ത്തിയായി,,മെമ്പര്‍  ID KR"+a+"   ആണ്.", type:"success"},function(){
    window.location.href = 'add_customer.php';});
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
