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
    <link rel="shortcut icon"  href="../Images/icon/icon.png">
    <link rel="stylesheet" href="../Components/plugins/toastr/toastr.min.css">
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
                <?php if(!isset($_GET['id_estud'])){?>
  			   <div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><i class="fa fa-user"></i> Cadastrar novo(a) estudante</div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" action="../Controller/insert_estudante.php" method="post" enctype="multipart/form-data">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Estudante: *</label>
								    <div class="col-sm-10">
								      <input type="text" name="nome_estud" class="form-control" id="inputEmail3">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Telefone: </label>
								    <div class="col-sm-10">
								      <input type="text" name="fone_estud" class="form-control" id="inputPassword3">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Telefone Resp: *</label>
								    <div class="col-sm-10">
								      <input type="text" name="fone_resp" class="form-control" id="inputPassword3">
								    </div>
								  </div>
                                     <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">E-mail: </label>
								    <div class="col-sm-10">
								      <input type="email" name="email_estud" class="form-control" id="inputPassword3">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Endereço: *</label>
								    <div class="col-sm-10">
								      <input type="text" name="endereco_estud" class="form-control" id="inputPassword3">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Foto: </label>
								    <div class="col-sm-10">
								      <input type="file" name="foto_estud" class="form-control" id="inputPassword3">
								      </div>
								   </div>
								   <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button id="btn-cad" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
                <?php } else{?>
                <div class="col-md-12">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><i class="fa fa-user"></i> Alterar dados do(a) estudante</div>
					        </div>
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" action="../Controller/update_estudante.php?id_estud=<?= $line_estud->getId_estud();?>" method="post">
								  <div class="form-group">
								    <label for="inputEmail3" class="col-sm-2 control-label">Estudante: </label>
								    <div class="col-sm-10">
								      <input type="text" name="nome_estud" class="form-control" id="inputEmail3"
                                             value="<?= $line_estud->getNome_estud();?>">
								    </div>
								  </div>
								  <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Telefone: </label>
								    <div class="col-sm-10">
								      <input type="text" name="fone_estud" class="form-control" id="inputPassword3"
                                              value="<?= $line_estud->getFone_estud();?>">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Telefone Resp: </label>
								    <div class="col-sm-10">
								      <input type="text" name="fone_resp" class="form-control" id="inputPassword3"
                                              value="<?= $line_estud->getFone_estud();?>">
								    </div>
								  </div>
                                     <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">E-mail: </label>
								    <div class="col-sm-10">
								      <input type="email" name="email_estud" class="form-control" id="inputPassword3"
                                              value="<?= $line_estud->getEmail_estud();?>">
								    </div>
								  </div>
                                    <div class="form-group">
								    <label for="inputPassword3" class="col-sm-2 control-label">Endereço: </label>
								    <div class="col-sm-10">
								      <input type="text" name="endereco_estud" class="form-control" id="inputPassword3"
                                            value="<?= $line_estud->getEndereco_estud();?>">
								    </div>
								   </div>
								   <div class="form-group">
								    <div class="col-sm-offset-2 col-sm-10">
								      <button id="btn-cad" type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Salvar Alterações</button>
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
	  				</div>
                <?php } ?>
              </div>
		</div>
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
        
    <script src="../Components/plugins/jquery/jquery.min.js"></script>
    <script src="../Components/plugins/toastr/toastr.min.js"></script>
    <script src="../Components/plugins/sweetalert2/sweetalert2.min.js"></script>
        
<!-- ===== alert insert =====-->
<?php if(isset($_SESSION['estudSalvo'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['estudSalvo'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['estudSalvo']); }?>
  <?php if(isset($_SESSION['estudErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['estudErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['estudErro']); }?>
  <!-- ===== fim alert insert =====-->
  </body>
</html>