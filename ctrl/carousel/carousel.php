<?php
$host = 'localhost';
$database = 'projet_stage_SKH';
$user ='root';
$password = '';
try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $query = "SELECT * FROM image";
    $statement = $pdo->query($query);
    $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Conversion en format JSON
    $jsonData = json_encode($comments);

    header('Content-Type: application/json');
    echo $jsonData;
} catch (PDOException $e) {
    die('Erreur de connexion à la base de données : ' . $e->getMessage());
}