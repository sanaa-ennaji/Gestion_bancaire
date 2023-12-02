
  <?php   
$host = 'localhost';
$username = 'root';
$password = 'new_password';
$databaseName = 'gestionBancaire';
    
$conn = mysqli_connect($host, $username, $password, $databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts</title>
 <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h2>Banc managment</h2> 
    <nav>
        <a href="index.php"><p>Home</p></a>
        <a href="clients.php"><p>Clients</p></a>
        <a href="comptes.php"><p>Comptes</p></a>
        <a href="transactions.php"><p>Transaction</p></a> 
    </nav>
</header>
    <h2>list des comptes</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Balance</th>
            <th>Devise</th>
            <th>client id</th>
            <th>action</th>
        </tr>
        <?php
// Check if category_id is set in the URL
if (isset($_GET['client_id'])) {
    $client_id = $_GET['client_id'];
    $sql = "SELECT comptes.compte_id, comptes.balance, comptes.devise, comptes.client_id
            FROM comptes
            INNER JOIN clients ON comptes.client_id = clients.client_id
            WHERE clients.client_id = $client_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['compte_id']}</td>";
            echo "<td>{$row['balance']}</td>";
            echo "<td>{$row['devise']}</td>";
            echo "<td>{$row['client_id']}</td>";
            echo "<td><a href='transactions.php?compte_id={$row['compte_id']}'>Show</a></td>";
            echo "</tr>";
        }
    } else {
        echo "No comptes found for the selected client";
    }
} else {
    $sql = "SELECT comptes.compte_id, comptes.balance, comptes.devise, comptes.client_id
            FROM comptes
            INNER JOIN clients ON comptes.client_id = clients.client_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['compte_id']}</td>";
            echo "<td>{$row['balance']}</td>";
            echo "<td>{$row['devise']}</td>";
            echo "<td>{$row['client_id']}</td>";
            echo "<td><a href='transactions.php?compte_id={$row['compte_id']}'>Show</a></td>";
            echo "</tr>";
        }
 }     
    else {
        echo "No comptes found";
    }
 }
?>

    </table>
</body>

</html>

<?php
$conn->close();
?>
