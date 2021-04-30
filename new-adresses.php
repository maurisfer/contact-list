<?php

require_once "vendor/autoload.php";

use Contact\Entity\CreateAdresses;
use Contact\Entity\CreateContact;

//DEFINE TÍTULO DE ACORDO COM A PÁGINA
define('TITLE', 'Cadastrar Endereços');
define('BUTTON_TITLE', "Cadastrar");

//VALIDA SE EXISTE UM ID NA URL
if(!isset($_GET['id']) or !is_numeric($_GET['id'])) {
    header('location:index.php?status=error');
    exit;
}
//BUSCA O CONTATO NO BANCO DE DADOS
$objContact = CreateContact::getContact($_GET['id']);
$objCadastro = new CreateAdresses();


// VALIDA SE O RETORNO É UM OBJETO DO TIPO CONTATO
if(!$objContact instanceof CreateContact){
    header('location:index.php?status=error');
    exit;
}

if(isset(
    $_POST['id_contact'],
    $_POST['zipcode'],
    $_POST['street'],
    $_POST['number'],
    $_POST['district'],
    $_POST['city'],
    $_POST['state'],

)){
    $objCadastro = new CreateAdresses();
    $objCadastro->id_contact = $_POST['id_contact'];//PASSADO NO INPUT DO FORMULÁRIO
    $objCadastro->zipcode = $_POST['zipcode'];
    $objCadastro->street = $_POST['street'];
    $objCadastro->number = $_POST['number'];
    $objCadastro->district = $_POST['district'];
    $objCadastro->city = $_POST['city'];
    $objCadastro->state = $_POST['state'];

    $objCadastro->createAdress(); //Intância do crete da classe

    header('location: adresses.php?status=success');
    exit;
}

include __DIR__. "/includes/header.php";
include __DIR__ . "/includes/adress-form.php";
include __DIR__. "/includes/footer.php";

