<?php
session_start();
include_once '../Persistence/conection.php';

if(!empty($_POST['estud_cod']) && !empty($_POST['turno_estud'])){
$estud_cod = $_POST['estud_cod'];
$serie_estud = $_POST['serie_estud'];
$turno_estud = $_POST['turno_estud'];

$sql = "INSERT INTO tb_matriculas(estud_cod, serie_estud, turno_estud)
VALUES('$estud_cod', '$serie_estud', '$turno_estud')";
$execute = mysqli_query($conexao, $sql);

    $_SESSION['matricSalva'] = "Matrícula efetuada com sucesso!";
    header('location: ../View/matriculas.php');
}else{
    $_SESSION['matricSalvaErro'] = "Falha preencha os campos obrigatórios!";
    header('location: ../View/matriculas.php');
}
?>