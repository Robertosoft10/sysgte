<?php
session_start();
include_once '../Persistence/estudante.Crud.php';
if(isset($_GET['id_estud'])){

$objeto = new Estud();
$objeto->setId_estud($_REQUEST['id_estud']);
$objeto->setNome_estud($_REQUEST['nome_estud']);
$objeto->setFone_estud($_REQUEST['fone_estud']);
$objeto->setFone_resp($_REQUEST['fone_resp']);
$objeto->setEmail_estud($_REQUEST['email_estud']);
$objeto->setEndereco_estud($_REQUEST['endereco_estud']);

$crud = new CRUDEstud();
$crud->updateEstud($objeto);

    $_SESSION['estudAtualiza'] = "Dados atualizado com sucesso!";
    header('location: ../View/estudante_list.php');
}else{
     $_SESSION['estudErroAtualiza'] = "Falha na atualização!";
    header('location: ../View/estudante_list.php');
}
?>