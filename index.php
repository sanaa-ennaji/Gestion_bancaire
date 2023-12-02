<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h2>Banc management</h2> 
        <nav>
            <a href="index.php"><p>Home</p></a>
            <a href="clients.php"><p>Clients</p></a>
            <a href="comptes.php"><p>Comptes</p></a>
            <a href="transactions.php"><p>Transaction</p></a> 
        </nav>
    </header>
    <div  class ="welcome">
    <h1>WELCOME TO YOUR ADMINISTRATOR DASHBOARD</h1>
    </div>
  <?php   
$host = 'localhost';
$username = 'root';
$password = 'new_password';
$databaseName = 'gestionBancaire';
    
$conn = mysqli_connect($host, $username, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sqlCreateDatabase = "CREATE DATABASE IF NOT EXISTS $databaseName";

// if ($conn->query($sqlCreateDatabase) === TRUE) {
//     echo "Database gestionBancaire created successfully.\n";
// } else {
//     echo "Error creating database: " . $conn->error;
// }

$conn->close();

// Connect to the specific database
$conn = mysqli_connect($host, $username, $password, $databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 // Create tables
$sql = "CREATE TABLE IF NOT EXISTS clients (
    client_id INT AUTO_INCREMENT PRIMARY KEY,  
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    date_naissance DATE,
    nationalite VARCHAR(50),
    genre VARCHAR(10)
)";

// if ($conn->query($sql) === TRUE) {
//     echo "Clients table created successfully";
// } else {
//     echo "Error creating clients table: " . $conn->error;
// }

$sql = "CREATE TABLE IF NOT EXISTS comptes (
    compte_id INT AUTO_INCREMENT PRIMARY KEY,
    balance DECIMAL(10, 2) NOT NULL,
    devise VARCHAR(10) NOT NULL, 
    client_id INT,
    FOREIGN KEY (client_id) REFERENCES clients(client_id)  -- Change this line
)";

// if ($conn->query($sql) === TRUE) {
//     echo "Comptes table created successfully";
// } else {
//     echo "Error creating comptes table: " . $conn->error;
// }
    $sql = "CREATE TABLE IF NOT EXISTS transactions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        montant DECIMAL(10, 2) NOT NULL,
        tp VARCHAR(10) NOT NULL,
        compte_id INT,
        FOREIGN KEY (compte_id) REFERENCES comptes(compte_id)
    )";

    // if ($conn->query($sql) === TRUE) {
    //     echo "Transactions table created successfully";
    // } else {
    //     echo "Error creating transactions table: " . $conn->error;
    // }

  // Insert data into clients
// $sqlClients = "INSERT INTO clients (nom, prenom, date_naissance, nationalite, genre)
// VALUES ('Doe', 'John', '1990-01-01', 'French', 'Male'),
//        ('Smith', 'Jane', '1985-03-15', 'American', 'Female')";

// // Insert data into comptes
// $sqlComptes = "INSERT INTO comptes (balance, devise, client_id)
// VALUES (5000.00, 'USD',1),
//        (3000.00, 'EUR',2)";

// // Insert data into transactions
// $sqlTransactions = "INSERT INTO transactions (montant, tp, compte_id)
//      VALUES (1000.00, 'CREDIT',1),
//             (2000.00, 'DEBIT',2)";

// // Execute queries separately
// if ($conn->multi_query($sqlClients) === TRUE) {
// echo "Clients inserted successfully";
// } else {
// echo "Error inserting clients: " . $conn->error;
// }

// if ($conn->multi_query($sqlComptes) === TRUE) {
// echo "Comptes inserted successfully";
// } else {
// echo "Error inserting comptes: " . $conn->error;
// }

// if ($conn->multi_query($sqlTransactions) === TRUE) {
// echo "Transactions inserted successfully";
// } else {
// echo "Error inserting transactions: " . $conn->error;
// }

    $conn->close();
    ?>
</body> 
</html>
