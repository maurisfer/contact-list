<?php

require_once "vendor/autoload.php";

use Contact\Entity\CreateAdresses;

define('TITLE', "Deletar Endereço");

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header("location: index.php?status=error");
    exit;
}


//INSTÂNCIA DO OBJETO ALVO POR ID
$objAdress = CreateAdresses::getAdress($_GET['id']);
//echo "<pre>"; print_r($objAdress); echo "</pre>";exit;

//VALIDAÇÃO DO ENDEREÇO EXISTENTE
if(!$objAdress instanceof CreateAdresses){
    header("location: index.php?status=error");
    exit;
}

//echo "<pre>"; print_r($objAdress); echo "</pre>"; exit;

// VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

    $objAdress->deleteAdress(); //Instância do delete da classe

    header('location: index.php?status=success');
    exit;

}

include __DIR__. "/includes/header.php";
include __DIR__ . "/includes/confirmation.php";
include __DIR__. "/includes/footer.php";

