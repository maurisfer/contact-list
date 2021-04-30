<?php

require_once "vendor/autoload.php";

use Contact\Entity\CreateContact;

// EFETUA A BUSCA DOS CONTATOS NO BANCO DE DADOS
$contatos = CreateContact::getContacts();

//INCLUI AS PÁGINAS CORRESPONDENTES
include __DIR__. "/includes/header.php";
include __DIR__ . "/includes/contact-list.php";
include __DIR__. "/includes/footer.php";

