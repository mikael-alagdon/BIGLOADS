<?php 

$server_name = "ALAGDON-PC";
$connection = array("Database"=>"MERALCODB");
$conn = sqlsrv_connect($server_name, $connection);

if($conn == true){
    // echo "Connection established";
}else{
    echo "Connection cannot be established";
    die(print_r(sqlsrv_errors(), true));
}
  
?>