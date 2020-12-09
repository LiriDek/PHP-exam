<?php 

// Inclusion des dépendances
require '../vendor/autoload.php';
require '../src/functions.php';


// Initialisations
$errors = null;

// Si le formulaire est soumis 
if (!empty($_POST)) {

    // Récupérer les données du formulaire
    $titre = $_POST['titre'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $cp = $_POST['cp'];
    $surface = $_POST['surface'];
    $type = $_POST['type'];
    $prix = $_POST['prix'];
    $description = $_POST['description'];

    // Validation des données
    $errors = validateProductForm($titre, $adresse, $ville, $cp, $surface, $type, $prix, $description);

    // Si tout est OK
    if (empty($errors)) {

        // Insertion du produit dans la BDD
        insertProduct($titre, $adresse, $ville, $cp, $surface, $type, $prix, $description);

        // Message flash puis redirection vers le dashboard admin
        addFlashMessage('Annonce correctement ajoutée');
        header('Location: add_product.phhtml');
        exit;
    }
}



include '../templates/add_product.phtml';