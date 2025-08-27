<?php
// db.php - Database connection file
$host = 'localhost'; // Assuming localhost, change if needed
$dbname = 'dbmzvg7bojqegj';
$user = 'uws1gwyttyg2r';
$pass = 'k1tdlhq4qpsf';
 
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
