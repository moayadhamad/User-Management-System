<?php
$servername = "sql211.infinityfree.com";
$username = "if0_42372963";
$password = "SSuxE7QlsWCIt";
$dbname = "if0_42372963_users";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $Name = $_POST["Name"];
    $Age = $_POST["Age"];

    $sql = "INSERT INTO users (Name, Age, Status)
            VALUES ('$Name','$Age',0)";

    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Users</title>
</head>
<body>

<form method="POST">
    Name:
    <input type="text" name="Name" required>

    Age:
    <input type="number" name="Age" required>

    <input type="submit" value="Submit">
</form>

<br>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Age</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM users");

while($row = $result->fetch_assoc()){
    echo "<tr>";
    echo "<td>".$row["ID"]."</td>";
    echo "<td>".$row["Name"]."</td>";
    echo "<td>".$row["Age"]."</td>";
    echo "<td>".$row["Status"]."</td>";
    echo "<td><a href='toggle.php?id=".$row["ID"]."'>Toggle</a></td>";
    echo "</tr>";
}

$conn->close();
?>

</table>

</body>
</html>