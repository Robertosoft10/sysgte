<?php
session_start();
include_once '../Persistence/conection.php';
$id_estud = $_GET['id_estud'];
$sql = "SELECT foto_estud FROM tb_estudantes";
$consult = mysqli_query($conexao, $sql);
$result  = mysqli_fetch_assoc($consult);

    if(is_file('../Images/estudante/'.$result['foto_estud'])){
      $sql_img = unlink('../Images/estudante/'.$result['foto_estud']);
      if($sql_img){
        @$sql = "DELETE FROM tb_estudantes WHERE foto_estud = '$foto_estud'";
        $execute = mysqli_query($conexao, $sql);
      }
    }
if($execute == true){
  include_once '../Persistence/estudante.Crud.php';
  $crud = new CRUDEstud();
  $crud->deleteEstud($_REQUEST['id_estud']);

    $_SESSION['estudDelete'] = "Estudante excluido com sucesso!";
    header('location: ../View/estudante_list.php');
}else{
     $_SESSION['estudErroDelete'] = "Falha ao excluir dados da escola!";
    header('location: ../View/estudante_list.php');
}
?>