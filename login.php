<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {
	
	$uname = $_POST['uname'];
	$pass = $_POST['password'];

	if (empty($uname)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users WHERE user_name='$uname' AND pwd='$pass'";
		$params = array($uname, $pass);
        $stmt = sqlsrv_query($conn, $sql, $params);

        if ($stmt === false) {
            die(print_r(sqlsrv_errors(), true));
        }

        if (sqlsrv_has_rows($stmt)) {
            $row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC);
            $_SESSION['user_name'] = $row['user_name'];
	    	$_SESSION['id'] = $row['id'];
            
            header("Location: home.php");
            exit();
        } else {
            header("Location: index.php?error=Incorrect User name or password");
            exit();
        }
	}
	
}else{
	header("Location: index.php");
	exit();
}
