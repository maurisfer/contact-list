<?php

require_once "vendor/autoload.php";

use Contact\Entity\CreateContact;

define('TITLE', "Deletar Contato");

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header("location: index.php?status=error");
    exit;
}

//INSTÂNCIA DO OBJETO ALVO POR ID
$objContact = CreateContact::getContact($_GET['id']);

//VALIDAÇÃO DO CONTATO EXISTENTE
if(!$objContact instanceof CreateContact){
    header("location: index.php?status=error");
    exit;
}

//echo "<pre>";print_r($objContact); echo "</pre>";exit;

// VALIDAÇÃO DO POST
if(isset($_POST['excluir'])){

    $objContact->deleteContact(); //Instância do delete da classe

    header('location: index.php?status=success');
    exit;
}

include __DIR__. "/includes/header.php";
include __DIR__ . "/includes/confirmation.php";
include __DIR__. "/includes/footer.php";

