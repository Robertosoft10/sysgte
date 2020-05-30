<?php
session_start();
include_once '../Persistence/estudante.Crud.php';

if(!empty($_REQUEST['nome_estud']) && !empty($_REQUEST['fone_resp']) && !empty($_REQUEST['endereco_estud'])){

$objeto = new Estud();
$objeto->setNome_estud($_REQUEST['nome_estud']);
$objeto->setFone_estud($_REQUEST['fone_estud']);
$objeto->setFone_resp($_REQUEST['fone_resp']);
$objeto->setEmail_estud($_REQUEST['email_estud']);
$objeto->setEndereco_estud($_REQUEST['endereco_estud']);
$objeto->setFoto_estud($_FILES['foto_estud']);

$crud = new CRUDEstud();
$crud->insertProf($objeto);

    $_SESSION['estudSalvo'] = "Estudante cadastrado com sucesso!";
    header('location: ../View/estudante_cad.php');
}else{
     $_SESSION['estudErro'] = "Falha! Preencha todos os campos obrigatórios!";
    header('location: ../View/estudante_cad.php');
}

?>