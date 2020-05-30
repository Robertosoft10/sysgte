
<?php
session_start();
include_once '../Persistence/conection.php';
$id_discip_estud = $_GET['id_discip_estud'];
$discip = $_POST['discip'];

$sql = "UPDATE  tb_discip_estud SET discip='$discip' WHERE id_discip_estud='$id_discip_estud'";
$execute = mysqli_query($conexao, $sql);
if($execute == true){
    $_SESSION['discipEstudUpdate'] = "Professor do(a) estudante atualizda com sucesso!";
     header('location: ../View/matriculas.php');
    
}else{
    $_SESSION['discipEstudUpdateErro'] = "Falha ao atualizar disciplina do(a) estudante";
     header('location: ../View/matriculas.php');
}
?>