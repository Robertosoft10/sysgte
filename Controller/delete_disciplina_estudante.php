<?php
session_start();
include_once '../Persistence/conection.php';
$id_discip_estud = $_GET['id_discip_estud'];
$sql = "DELETE FROM tb_discip_estud  WHERE id_discip_estud='$id_discip_estud'";
$execute = mysqli_query($conexao, $sql);
if($execute == true){
    $_SESSION['discipEstuDelete'] = "Disciplina do estutante excluida com sucesso!";
     header('location: ../View/matriculas.php');
    
}else{
    $_SESSION['discipEstuDeleteErro'] = "Falha ao excluir disciplina do(a) estudante ";
     header('location: ../View/matriculas.php');
}
?>
