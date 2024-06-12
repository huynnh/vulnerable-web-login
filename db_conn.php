<?php
// PHP Data Objects(PDO) Sample Code:
try {
    $conn = new PDO("sqlsrv:server = tcp:group8-server.database.windows.net,1433; Database = group8db", "group8", "20112003Huy");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e) {
    print("Error connecting to SQL Server.");
    die(print_r($e));
}

// SQL Server Extension Sample Code:
$connectionInfo = array("UID" => "group8", "pwd" => "20112003Huy", "Database" => "group8db", "LoginTimeout" => 30, "Encrypt" => 1, "TrustServerCertificate" => 0);
$serverName = "tcp:group8-server.database.windows.net,1433";
$conn = sqlsrv_connect($serverName, $connectionInfo);
?>