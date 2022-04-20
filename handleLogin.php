<?php

	// error_reporting(E_ALL & ~E_NOTICE);
    session_start();
    require_once("connection/conn.php");

	if(isset($_POST["login"])){
		$username = $_POST["username"];
		$password = $_POST["password"];

            $query = "SELECT * 
                      FROM dbo.users
                      WHERE username = '$username'
                      AND password = '$password'";

            $stmt = sqlsrv_query($conn, $query);

            if($stmt == false){
                // if there is something wrong with the sql query
                // possibly duplicate usernames
                die( print_r( sqlsrv_errors(), true));;
            }
            
            $userObject = sqlsrv_fetch_array($stmt);

            if(!$userObject == NULL){
                $id = $userObject["id"];
                $username = $userObject["username"];
                $_SESSION["currentUser"] = $username;

                header("Location: daily");

            }else{
                header("Location: index?error=1");
            }



	}

?>