<?php

require_once "vendor/autoload.php";

use Contact\Entity\CreateAdresses;
use Contact\Entity\CreateContact;

//VALIDA SE EXISTE UM ID DE CONTACTS NA URL
if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location:index.php?status=error');
    exit;
}
//BUSCA O CONTATO NO BANCO DE DADOS
$objContact = CreateContact::getContact($_GET['id']);


// VALIDA SE O RETORNO É UM OBJETO DO TIPO CONTATO
if(!$objContact instanceof CreateContact){
    header('location:index.php?status=error');
    exit;
}

//echo "<pre>";print_r($idContact); echo "</pre>";exit;

// EFETUA A BUSCA NO BANCO DE DADOS
$adresses = CreateAdresses::getAdresses('id_contact='.$objContact->id);

//INCLUI AS PÁGINAS CORRESPONDENTES
include __DIR__. "/includes/header.php";
include __DIR__ . "/includes/adress-list.php";
include __DIR__. "/includes/footer.php";

