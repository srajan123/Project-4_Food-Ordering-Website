<?php 
session_start();
$timezone=date_default_timezone_set("Asia/Kolkata");
$dbhost="localhost";
$dbuser="root";
$dbpassword="";
$dbname="foodshala";
$con=mysqli_connect($dbhost,$dbuser,$dbpassword,$dbname);
if (mysqli_connect_errno())
 {
       echo "failed to connect:".mysqli_connect_errno();
}
