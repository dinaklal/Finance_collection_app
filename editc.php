
<?php

session_start();
if(isset($_SESSION['user']))
{
    
    $member_id=$_POST['member_id'];
	$name=$_POST['name'];
	$cont=$_POST['contact'];
        $age=$_POST['age'];
	$type=$_POST['ration'];
	$date=$_POST['jdate'];
	$ed=$_POST['edu'];
	$user=$_POST['nom'];
	$adr=$_POST['address'];
        $job=$_POST['job'];
        $id_c=$_POST['idd'];
        $id_c1=$_POST['idd1'];
        $pre=$_POST['pre'];

   
	   $dat=date("Y-m-d"); 
           	
               require_once('db_connect.php');
         
            
      


	//$qr="INSERT INTO customer ( `name`,`place`,`contact`,`type`, `model`, `de'scription`, `problem`,`date`,`status`,`amount`) VALUES ('$name','$plce','$con','$type','$model','$det'','$pblm','$date','pending',0);";
	$sql = "UPDATE  members  SET name='$name', age='$age', address='$adr',ration='$type',educational_qualification='$ed',membership_date='$date', addedby='$user',phone=$cont,occupation='$job',identity_proof='$id_c',details='$id_c1',addedby='$user' WHERE member_id =$member_id";

		    $res=  mysqli_query($con, $sql);
                    
           $sql="UPDATE account SET balance='$pre' ,updated_date='$dat' WHERE member_id='$member_id';";
           $res=  mysqli_query($con, $sql);
			if($res)
			{
				echo ' <body onLoad="s()">';
			}
                        else {
                                echo mysqli_error($con);
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
     var a= "<?php echo $member_id; ?>";



	swal({ title:"   കൈരളി സ്വാശ്രയ സംഘം",text:"അംഗത്വ നമ്പര്‍ ‍  KR"+a+" വിവരങ്ങള്‍  വിജയകരമായി എഡിറ്റ്‌ ചെയ്തിരിക്കുന്നു .", type:"success"},function(){
    window.location.href = 'mem_home.php?id='+a;});
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
