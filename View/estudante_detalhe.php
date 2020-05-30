<?php
session_start();
include_once  '../Persistence/estudante.Crud.php';
$crudEstud = new CRUDEstud();
$result = $crudEstud->listEstud();
if(isset($_GET['id_estud'])){
  $id_estud = $_GET['id_estud'];
  $line_estud = $crudEstud->serchEstud($id_estud);
}
?>
<!DOCTYPE html>
<html>
  <head>
    <title>SysGTE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../Components/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../Components/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="../Components/css/styles.css" rel="stylesheet">
    <link href="../Components/style.css" rel="stylesheet">
  </head>
  <body>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-8">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="">xxxxxxxxxxxxxx  <img id="img-list-tabela" src="../Images/estudante/img.jpg" alt="" class="img-circle img-fluid col-md-10 col-sm-10 col-xs-10"></a></h1>
	              </div>
	           </div>
	           <div class="col-md-4">
	              <div class="row">
	                <div class="col-lg-12">
                      <form action="pesquisa_estudante.php" method="post">
	                  <div class="input-group form">
	                       <input type="text" name="nome_estud" class="form-control" placeholder="Pesquisar Estudante">
	                       <span class="input-group-btn">
	                         <button class="btn btn-primary"><i class="fa fa-search"></i></button>
	                       </span>
	                  </div>
                      </form>
	                </div>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>
    <div class="page-content">
    	<div class="row">
		  <div class="col-md-3">
		  	<div class="sidebar content-box" style="display: block;">
                <div class="sidebar-nav navbar-collapse">
                <ul class="nav">
                    <!-- Main menu -->
                    <li class="submenu">
                         <a id="menu-link"  href="#">
                            <i class="fa fa-user"></i> xxxxxxxxxxxxx
                            <span class="caret pull-right"></span>
                         </a>
                         <!-- Sub menu -->
                         <ul>
                            <li>
                             <a id="menu-link"  href="../Persistence/logout.php">
                            <i class="fa fa-sign-out"></i> Sair</a>
                             </li>
                        </ul>
                    </li>
                    <li>
                    <a id="menu-link" href="administrativo.php">
                    <i class="fa fa-home"></i> Administrativo</a>
                    </li>
                     <li>
                    <a id="menu-link"  href="estudante_list.php">
                    <i class="fa fa-users"></i> Estudantes</a>
                    </li>
                     <li>
                    <a id="menu-link"  href="professor_list.php">
                    <i class="fa fa-male"></i>  
                      <i id="icon-painel" class="fa fa-desktop"></i>
                      <i class="fa fa-female"></i> Professores</a>
                    </li>
                     <li>
                    <a id="menu-link"  href="matriculas.php">
                    <i class="fa fa-edit"></i> Matrículas</a>
                    </li>
                    <li>
                    <a id="menu-link"  href="disciplinas.php">
                    <i class="fa fa-book"></i> Disciplinas</a>
                    </li>
                </ul>
             </div>
            </div>
		  </div>
		  <div class="col-md-9">
		  	<div class="row">
  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title"><i class="fa fa-user"></i> Detalhe do Estudante 
                    </div>
                    <a href="estudante_cad.php">
                    <button id="btn-novo-registro" class="btn btn-primary pull-right">
                    <i class="fa fa-plus"></i> Novo Estudante</button></a>
				</div>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered">
						<thead>
							<tr id="th-tabela">
								<th id="foto-list-tabela-detalhe">Foto</th>
								<th>Informações</th>
							</tr>
						</thead>
						<tbody>
							<tr class="odd gradeX">
								<td>
                                  <img id="img-detalhe-tabela" src="<?= "../Images/estudante/".$line_estud->getFoto_estud();?>" alt="" class="img-circle img-fluid col-md-12 col-sm-12 col-xs-12">
                                </td>
								<td id="nome-informacao">
                                  Estudante: <?= $line_estud->getNome_estud();?><br>
                                  Telefone: <?= $line_estud->getFone_estud();?><br>
                                  Telefone Resp: <?= $line_estud->getFone_resp();?><br>
                                  Email: <?= $line_estud->getEmail_estud();?><br>
                                  Endereço: <?= $line_estud->getEndereco_estud();?><br>
                                    <div id="btn-acao-detalhe">
                                    <hr>
                                    <a id="icon-list-tabela" href="estudante_cad.php?id_estud=<?= $line_estud->getId_estud();?>">
                                    <i class="fa fa-pencil"></i></a>
                                     
                                    <a id="icon-delt-tabela" href="" data-toggle="modal" data-target="#modal-delete<?= $line_estud->getId_estud();?>">
                                    <i class="fa fa-trash"></i>
                                    </a>
                                    </div>
                                </td>
                                </tr>
                                <tr>
                                <td colspan="2">
                                   <small id="nome-img-detalhe"> Alterar foto</small>
                                <form action="../Controller/update_foto_estudante.php?id_estud=<?= $line_estud->getId_estud();?>" method="post" enctype="multipart/form-data">
                                  <div class="input-group form">
                                       <input type="file" name="foto_estud" class="form-control" required="">
                                       <span class="input-group-btn">
                                         <button class="btn btn-primary"><i class="fa fa-save"></i></button>
                                       </span>
                                  </div>
                                  </form>
                                </td>
							</tr>
						</tbody>
					</table>
  				</div>
  			</div>
		  </div>
		</div>
    </div>
        <!-- ========== modal delete ========-->
        <div class="modal fade" id="modal-delete<?= $line_estud->getId_estud();?>">
        <div class="modal-dialog"  id="posicao-modal">
          <div class="modal-content"  id="tamanho-modal">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body text-center">
            <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
            <a href="../Controller/delete_estudante.php?id_estud=<?= $line_estud->getId_estud();?>">
            <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Sim</button></a>
            <button id="btn-modal" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-thumbs-o-down"></i> Não</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright &copy; <?php $data = date('D/M/Y'); echo $data;?>
                SysGTE - Sistema Gestão Escolar -
                 Robertosoft10 Todos os direitos reservados
            </div>
            
         </div>
      </footer>
    <script src="../Components/jquery/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="../Components/jquery/jquery-ui.js"></script>
      <link href="../Components/vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="../Components/bootstrap/js/bootstrap.min.js"></script>

    <script src="../Components/vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="../Components/vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="../Components/js/custom.js"></script>
    <script src="../Components/js/tables.js"></script>
  </body>
</html>