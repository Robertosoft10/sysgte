
<?php
session_start();
include_once '../Persistence/conection.php';
$id_prof_estud = $_GET['id_prof_estud'];
$prof = $_POST['prof'];

$sql = "UPDATE tb_professor_estud SET  prof='$prof' WHERE id_prof_estud='$id_prof_estud'";
$execute = mysqli_query($conexao, $sql);

if($execute == true){
    $_SESSION['profEstudUpdate'] = "Professor do(a) estudante atualizdos com sucesso!";
     header('location: ../View/matriculas.php');
    
}else{
    $_SESSION['profEstudUpdateErro'] = "Falha ao atualizar professor do(a) estudante";
     header('location: ../View/matriculas.php');
}
?>
