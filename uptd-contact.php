<?php

require_once "vendor/autoload.php";

use Contact\Entity\CreateContact;

//DEFINE TÍTULO DE ACORDO COM A PÁGINA
define('TITLE', 'Editar Contato');
define('BUTTON_TITLE', "Atualizar");

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


// VALIDAÇÃO DO POST
if(isset($_POST['name'], $_POST['email'])){
    $objContact->name = $_POST['name'];
    $objContact->email = $_POST['email'];
    //echo "<pre>";print_r($objContactUpdate); echo "</pre>";exit;

    $objContact->updateContact(); //Intância do update da classe

    header('location: index.php?status=success');
    exit;

}

include __DIR__. "/includes/header.php";
include __DIR__ . "/includes/contact-form.php";
include __DIR__. "/includes/footer.php";

