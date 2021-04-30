<?php

require_once "vendor/autoload.php";

use Contact\Entity\CreateAdresses;
use Contact\Entity\CreateContact;

//DEFINE TÍTULO DE ACORDO COM A PÁGINA
define('TITLE', 'Editar Endereço');
define('BUTTON_TITLE', "Atualizar");

//VALIDAÇÃO DO ID
if(!isset($_GET['id']) or !is_numeric($_GET['id'])){
    header("location: adresses.php?status=error");
    exit;
}

//INSTÂNCIA DO OBJETO ALVO POR ID

$objCadastro = CreateAdresses::getAdress($_GET['id']);
$objContact = CreateContact::getContact($objCadastro->id_contact);

//VALIDAÇÃO DO CONTATO EXISTENTE
if(!$objCadastro instanceof CreateAdresses){
    header("location: index.php?status=error");
    exit;
}
//echo "<pre>";print_r($objCadastro); echo "</pre>";exit;

// VALIDAÇÃO DO POST
if(isset(
    $_POST['street'],
    $_POST['number'],
    $_POST['district'],
    $_POST['city'],
    $_POST['state'],
    $_POST['zipcode']
)){
    $objCadastro->street = $_POST['street'];
    $objCadastro->number = $_POST['number'];
    $objCadastro->district = $_POST['district'];
    $objCadastro->city = $_POST['city'];
    $objCadastro->state = $_POST['state'];
    $objCadastro->zipcode = $_POST['zipcode'];



    $objCadastro->updateAdress(); //Intância do update da classe

    header('location: index.php?status=success');
    exit;

}

include __DIR__. "/includes/header.php";
include __DIR__ . "/includes/adress-form.php";
include __DIR__. "/includes/footer.php";

