<?php
$host = 'localhost';
$username = 'root';
$password = 'new_password';
$databaseName = 'gestionBancaire';

$conn = mysqli_connect($host, $username, $password, $databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM clients";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clients</title>
   <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h2>Banc managment</h2> 
    <nav>
        <a href="index.php"><p>Home</p></a>
        <a href="#"><p>Clients</p></a>
        <a href="comptes.php"><p>Comptes</p></a>
        <a href="transactions.php"><p>Transaction</p></a> 
    </nav>
</header>

<h2>List of Clients</h2>
<table border="1">
   
    <tr>                 
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Date de Naissance</th>
        <th>Nationalité</th>
        <th>Genre</th>
        <th>Action</th>
    </tr>
    <?php
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$row['client_id']}</td>";
        echo "<td>{$row['nom']}</td>";
        echo "<td>{$row['prenom']}</td>";
        echo "<td>{$row['date_naissance']}</td>";
        echo "<td>{$row['nationalite']}</td>";
        echo "<td>{$row['genre']}</td>";
        echo "<td><a href='comptes.php?client_id={$row['client_id']}'>Show</a></td>";
        echo "</tr>";
    }
    ?>
</table>
</body>
</html>
<?php
$conn->close();
?>
