<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
        <link rel="icon" href="images/kairaly.ico"></link>
<head>
    <meta charset="utf-8">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>കൈരളി - സ്വാശ്രയസംഘം</title>
</head>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
        <body style="background: url('images/bg.jpg')">

    <div class="container">

      <form class="form-signin" role="form" action="login.php" method="post">
          <b>  <h2 class="form-signin-heading"><center>കൈരളി - സ്വാശ്രയസംഘം</h2><hr class="alert-danger" /></b>
        <br />
        <div class="form-group">
            <span class="label label-primary">User Name:</span>
        <select class="form-control" class="form-control" id="sel1" name="name" required>
        <?php
         
            header( 'Content-Type: text/html; charset=utf-8' ); 
        require_once 'db_connect.php';
        $q="SELECT * FROM admin; ";
        $res=  mysqli_query($con, $q);
        echo mysqli_error($con);
        while ($row = mysqli_fetch_array($res)) {
            
        
        ?>
                
        <option value="<?php echo $row['username'];?>"><?php echo $row['username'];?>
           </option  >
        
     <?php
       echo mysqli_error($con); }
        ?>
           
          </select>
            <div> <br>
        <input type="password" class="form-control" placeholder="Password" name="passwd" required>
       
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>

    </div> <!-- /container --></body>
</html>