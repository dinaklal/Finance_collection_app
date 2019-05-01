
<?php

$dbhost = 'localhost';
$dbuser = 'kudumbasree';
$dbpass = '949510';
$dbname = 'kudumbasree';
$tables = '*';

//Call the core function
backup_tables($dbhost, $dbuser, $dbpass, $dbname, $tables);

//Core function
function backup_tables($host, $user, $pass, $dbname, $tables = '*') {
    $link = mysqli_connect($host,$user,$pass, $dbname);

    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        exit;
    }

    mysqli_query($link, "SET NAMES 'utf8'");

    //get all of the tables
    if($tables == '*')
    {
        $tables = array();
        $result = mysqli_query($link, 'SHOW TABLES');
        while($row = mysqli_fetch_row($result))
        {
            $tables[] = $row[0];
        }
    }
    else
    {
        $tables = is_array($tables) ? $tables : explode(',',$tables);
    }

    $return = '';
    //cycle through
    foreach($tables as $table)
    {
        $result = mysqli_query($link, 'SELECT * FROM '.$table);
        $num_fields = mysqli_num_fields($result);
        $num_rows = mysqli_num_rows($result);

        $return.= 'DROP TABLE IF EXISTS '.$table.';';
        $row2 = mysqli_fetch_row(mysqli_query($link, 'SHOW CREATE TABLE '.$table));
        $return.= "\n\n".$row2[1].";\n\n";
        $counter = 1;

        //Over tables
        for ($i = 0; $i < $num_fields; $i++) 
        {   //Over rows
            while($row = mysqli_fetch_row($result))
            {   
                if($counter == 1){
                    $return.= 'INSERT INTO '.$table.' VALUES(';
                } else{
                    $return.= '(';
                }

                //Over fields
                for($j=0; $j<$num_fields; $j++) 
                {
                    $row[$j] = addslashes($row[$j]);
                    $row[$j] = str_replace("\n","\\n",$row[$j]);
                    if (isset($row[$j])) { $return.= '"'.$row[$j].'"' ; } else { $return.= '""'; }
                    if ($j<($num_fields-1)) { $return.= ','; }
                }

                if($num_rows == $counter){
                    $return.= ");\n";
                } else{
                    $return.= "),\n";
                }
                ++$counter;
            }
        }
        $return.="\n\n\n";
    }

    //save file
    $fileName = 'C:\backup-kairali\backup-'. date("Y-m-d").'-'.(md5(implode(',',$tables))).'.sql';
    $handle = fopen($fileName,'w+');
    fwrite($handle,$return);
    if(fclose($handle)){
        $out= "Done, the file name is: ".$fileName;
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

    <script src="js/jquery.min.js"></script>
<script>
$(document).ready(function($) {
    $(".clickable-row").click(function() {
        window.location = $(this).data("href");
    });
});
</script>
<script>
function w()
{
  swal({   title: "INFINITY ",   text: "Tell my Name to prove you are A worker",   type: "input",   showCancelButton: false,  
   closeOnConfirm: false,   animation: "slide-from-top",   inputPlaceholder: "Write my name!" },
   function(inputValue){   if (inputValue === false) return false;      if ((inputValue !="unni" ) && (inputValue !="UNNI" )) {  
          swal.showInputError("You need to Remember my name to continue!");     return false   }   
             swal("Nice!", "Do Your Works Buddie! ", "success"); });
};

});
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
              <li ><a href="loan_return.php">വായ്പ തിരിച്ചടവ്</a></li>
               <li><a href="other_income.php">മറ്റു വരവുകള്‍  </a></li>
              <li><a href="other_expense.php"> മറ്റു ചിലവുകള്‍   </a> ‍</li>
              <li><a href="report.php">റിപ്പോര്‍ട്ട് ‍ </a></li>
              <li><a>~~~~~~~~~~~~~~~~~~~~~~~~</a></li>
	       <li><a href="http://www.facebook.com/dinak.thillankeri"> © DLT</a></li>
              <li><a>~~~~~~~~~~~~~~~~~~~~~~~~</a></li>

          </ul>
       
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="background-image:url('images/1.jpg') ;background-repeat: no-repeat; background-position: center;background-size: cover;">
            <center>  <b> <h1  style="color:green;font-weight: 10000; text-shadow: 2px 2px green;"></h1></b></center>
          
            <div class="row" >
                <div class="col-md-3" >
             <a href="home.php" > <button type="button" class="btn btn-lg btn-success">തിരിച്ച് പോവുക</button></a>
            </div>
            </div>
                <br>
               <div class="container">
                   <pre> <h1>വിജയകരമായി ബാക്കപ്പ്  ചെയ്തിരിക്കുന്നു</h1>
  നിങ്ങുടെ മുഴുവന്‍  വിവരങ്ങള്‍  <?php echo $fileName;?> എന്ന ഫയലില്‍  സുരക്ഷിതം ആണ്.:
  <blockquote> ഈ ഫയല്‍  <u>( ഫോള്‍ഡര്‍  തനതു സ്ഥാനത്ത്  സൂക്ഷിക്കുക)</u> സുരക്ഷിതസ്ഥാനത്തേക്ക്  മാറ്റുക.
ഏറ്റവും  പുതിയ ബാക്കപ്പ്  ഫയലുകള്‍  ഇന്‍റെര്‍നെറ്റ്‌ ഉപയോഗിച്ചോ   മറ്റു മാര്‍ഗങ്ങള്‍ ഉപയോഗിച്ചോ 
സുരക്ഷിതമായ സ്ഥാനത്ത്  സൂക്ഷിക്കുക. സോഫ്റ്റ്‌വെയര്‍ ഉപയോഗിക്കുന്ന സിസ്റ്റം നഷ്ടപ്പെടുകയാണെങ്കില്‍ 
ഈ ഫയലുകള്‍  ഉപയോഗിച്ച് നിങ്ങളുടെ വിവരങ്ങള്‍ പുനസ്ഥാപിക്കാം .
  [ നിര്‍ദ്ദേശങ്ങള്‍ക്ക്  ബന്ധപ്പെടുക :anuprasad@gmail.com ]
  <footer><a href="http://www.facebook.com/dinak.thillankeri">DLT</a></footer></pre>
  </blockquote>
</div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/docs.min.js"></script>
  </body>
</html>


        
<?php
        exit; 
    }
}

