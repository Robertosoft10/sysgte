<?php
session_start();
include_once '../Persistence/conection.php';
$id_prof = $_GET['id_prof'];
$sql = "SELECT foto_prof FROM tb_professores";
$consult = mysqli_query($conexao, $sql);
$result  = mysqli_fetch_assoc($consult);

    if(is_file('../Images/professor/'.$result['foto_prof'])){
      $sql_img = unlink('../Images/professor/'.$result['foto_prof']);
      if($sql_img){
        @$sql = "DELETE FROM tb_professores WHERE foto_prof = '$foto_prof'";
        $execute = mysqli_query($conexao, $sql);
      }
    }
if($execute == true){
  include_once '../Persistence/professor.Crud.php';
  $crud = new CRUDProf();
  $crud->deleteProf($_REQUEST['id_prof']);

    $_SESSION['profDelete'] = "Professor excluido com sucesso!";
    header('location: ../View/professor_list.php');
}else{
     $_SESSION['profErroDelete'] = "Falha ao excluir dados da escola!";
    header('location: ../View/professor_list.php');
}
?>