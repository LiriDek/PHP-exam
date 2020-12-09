<?php

// Inclusion du fichier de configuration
require '../config.php';

/**
 * Crée la connexion PDO
 */
function getPDOConnection()
{
    // Construction du Data Source Name
    $dsn = 'mysql:dbname='.DB_NAME.';host='.DB_HOST;

    // Tableau d'options pour la connexion PDO
    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ];

    // Création de la connexion PDO (création d'un objet PDO)
    $pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $options);
    $pdo->exec('SET NAMES UTF8');

    return $pdo;
}

/**
 * Prépare et exécute une requête SQL
 */
function prepareAndExecuteQuery(string $sql, array $criteria = []): PDOStatement
{
    // Connexion PDO
    $pdo = getPDOConnection();

    // Préparation de la requête SQL
    $query = $pdo->prepare($sql);

    // Exécution de la requête
    $query->execute($criteria);

    // Retour du résultat
    return $query;
}

/**
 * Exécute une requête de sélection et retourne plusieurs résultats
 */
function selectAll(string $sql, array $criteria = [])
{
    $query = prepareAndExecuteQuery($sql, $criteria);

    return $query->fetchAll();
}


/**
 * Exécute une requête de sélection et retourne UN résultat
 */
function selectOne(string $sql, array $criteria = [])
{
    $query = prepareAndExecuteQuery($sql, $criteria);

    return $query->fetch();
}

function insertProduct(string $titre, string $adresse, string $ville, int $cp, string  $description, string $photo, float $prix, int $surface, int $type)
{
    $sql = 'INSERT INTO products (titre, adresse, ville, cp, description, photo, prix, surface, type)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';

    prepareAndExecuteQuery($sql, [$titre, $adresse, $ville, $cp, $description, $photo, $prix, $surface, $type]);        
}