
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
    <h2>List of Transactions</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Montant</th>
            <th>Type</th>
            <th>Compte ID</th>
        </tr>
        <?php
        if (isset($_GET['compte_id'])) {
            $compte_id = mysqli_real_escape_string($conn, $_GET['compte_id']);
            $sql = "SELECT transactions.id, transactions.montant, transactions.tp, transactions.compte_id
                    FROM transactions
                    INNER JOIN comptes ON transactions.compte_id = comptes.compte_id
                    WHERE comptes.compte_id = $compte_id";

            $result = $conn->query($sql);

            if (!$result) {
                die("Error: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['montant']}</td>";
                    echo "<td>{$row['tp']}</td>";
                    echo "<td>{$row['compte_id']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "No transactions found for the selected compte";
            }
        } else {
            $sql = "SELECT transactions.id, transactions.montant, transactions.tp, transactions.compte_id
                    FROM transactions
                    INNER JOIN comptes ON transactions.compte_id = comptes.compte_id";

            $result = $conn->query($sql);

            if (!$result) {
                die("Error: " . $conn->error);
            }

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>";
                    echo "<td>{$row['montant']}</td>";
                    echo "<td>{$row['tp']}</td>";
                    echo "<td>{$row['compte_id']}</td>";
                    echo "</tr>";
                }
            } else {
                echo "No transactions found";
            }
        }
        ?>
    </table>
</body>

</html>


<?php
$conn->close();
?>