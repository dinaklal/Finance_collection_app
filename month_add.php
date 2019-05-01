<html>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/kairaly.ico">
    <form action="month_add.php" method="Post">
        <input type="text" name="month_name">
        <input type="submit" value="add" name="submit">
    </form>
</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'db_connect.php';
if(isset($_POST['submit']))
{
    $name=$_POST['month_name'];
    $q="INSERT INTO month (`name`) values ('$name');";
    $res=mysqli_query($con,$q);
    if($res)
    {
        echo "<h1> success</h1>";
        header("Location:month_add.php");
    }
    else
     {
         echo mysqli_error($con);
    }
}
?>








