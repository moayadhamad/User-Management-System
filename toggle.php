<?php
$servername = "sql211.infinityfree.com";
$username = "if0_42372963";
$password = "SSuxE7QlsWCIt";
$dbname = "if0_42372963_users";

$conn = new mysqli($servername, $username, $password, $dbname);

$id = $_GET["id"];

$conn->query("UPDATE users SET Status = IF(Status=0,1,0) WHERE ID=$id");

header("Location: index.php");
exit;