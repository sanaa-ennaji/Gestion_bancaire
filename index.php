<?php
    $host = 'localhost';
    $username = 'root';
    $password = 'new_password';
    $databaseName = 'bank';
    
    $conn = mysqli_connect($host, $username, $password);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create the database
    $sql = "CREATE DATABASE IF NOT EXISTS $databaseName CHARACTER SET utf8 COLLATE utf8_general_ci";

    if ($conn->query($sql) === TRUE) {
        echo "Database '$databaseName' created successfully.\n";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // Select the database
    mysqli_select_db($conn, $databaseName);

    // Create the banks table
    $sql = "CREATE TABLE IF NOT EXISTS banks (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        logo LONGBLOB
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Banks table created successfully\n";
    } else {
        echo "Error creating banks table: " . $conn->error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS agencies (
        id INT AUTO_INCREMENT PRIMARY KEY,
        longitude DECIMAL(10, 6) NOT NULL,
        latitude DECIMAL(10, 6) NOT NULL,
        adresse VARCHAR(255) NOT NULL,
        bank_id INT,
        FOREIGN KEY (bank_id) REFERENCES banks(id) ON UPDATE CASCADE ON DELETE CASCADE
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Agencies table created successfully\n";
    } else {
        echo "Error creating agencies table: " . $conn->error;
    }
    mysqli_select_db($conn, $databaseName);
    $sql = "CREATE TABLE IF NOT EXISTS  distributeurs  (
        id INT AUTO_INCREMENT PRIMARY KEY,
        longitude DECIMAL(10, 6) NOT NULL,
        latitude DECIMAL(10, 6) NOT NULL,
        adresse VARCHAR(255) NOT NULL,
        bank_id INT,
        FOREIGN KEY (bank_id) REFERENCES banks(id) ON UPDATE CASCADE ON DELETE CASCADE
    )";
     if ($conn->query($sql) === TRUE) {
        echo "distrib table created successfully\n";
    } else {
        echo "Error creating  distr table: " . $conn->error;
    }
    mysqli_select_db($conn, $databaseName);

    $sql = "CREATE TABLE IF NOT EXISTS roles (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL
    )";
    if ($conn->query($sql) === TRUE) {
        echo "Table 'roles' created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    $sql = " CREATE TABLE IF NOT EXISTS addresses (
        id INT AUTO_INCREMENT PRIMARY KEY,
        ville VARCHAR(255) NOT NULL,
        quartier VARCHAR(255) NOT NULL,
        rue VARCHAR(255) NOT NULL,
        codePostal VARCHAR(20) NOT NULL,
        email VARCHAR(255) NOT NULL,
        telephone VARCHAR(20) NOT NULL
    )";
      if ($conn->query($sql) === TRUE) {
        echo "Table 'adresse' created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
    

    $conn->close();
?>
