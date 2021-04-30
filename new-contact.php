<?php

require_once "vendor/autoload.php";

use Contact\Entity\CreateContact;

define('TITLE', 'Cadastrar Contato');
define('BUTTON_TITLE', "Cadastrar");



if(isset($_POST['name'], $_POST['email'])){

    $objContact = new CreateContact();
    $objContact->name = $_POST['name'];
    $objContact->email = $_POST['email'];


    $objContact->createContact(); //Intância do crete da classe

    header('location: index.php?status=success');
    exit;

}

include __DIR__. "/includes/header.php";
include __DIR__ . "/includes/contact-form.php";
include __DIR__. "/includes/footer.php";

