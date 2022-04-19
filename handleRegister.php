<?php

	// error_reporting(E_ALL & ~E_NOTICE);

    require_once("connection/conn.php");

	if(isset($_POST["register"])){

		$username = $_POST["username"];
		$password = $_POST["password"];
		$confirmPassword = $_POST["confirmPassword"];

        if($password != $confirmPassword){
            
            echo "mnali kapatid";
            header("Location: register?error=1");

        }else{
            $query = "INSERT INTO dbo.users(username, password)
            VALUES (?, ?)";

            $params = array($username, $password);
            $stmt = sqlsrv_query($conn, $query, $params);

            if($stmt == false){

                // if there is something wrong with the sql query
                // possibly duplicate usernames

                // die( print_r( sqlsrv_errors(), true));;
                die(header("Location: register?error=2"));
            }
            header("Location: index?success=1");
        }

	}

?>