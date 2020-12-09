<?php

// Inclusion des dépendances
require '../vendor/autoload.php';
require '../src/functions.php';

/*************************************/
/* REQUETE DE SELECTION DES PRODUITS */
/*************************************/
// $products = getAllProducts();

/*************************************/
/* AFFICHAGE : INCLUSION DU TEMPLATE */
/*************************************/
$pageTitle = 'Bienvenue chez mon agence';

include '../templates/index.phtml';