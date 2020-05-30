<?php
session_start();
include_once '../Persistence/conection.php';
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
                        <?php
                        include_once  '../Persistence/estudante.Crud.php';
                        $crudEstud = new CRUDEstud();
                        $result = $crudEstud->listEstud();
                        ?>
                        <form action="pesquisa_matricula.php" method="post">
	                  <div class="input-group form">
	                       <select type="text" name="estud_cod" class="form-control" placeholder="Pesquisar Estudante">
                               <option></option>
                           <?php while($line = array_shift($result)){?> 
                            <option  value="<?= $line->getId_estud();?>"><?= $line->getNome_estud();?></option> 
                            <?php } ?>   
                          </select>
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
  			   <div class="col-md-12">
            <div class="content-box-large">
  		    <div class="panel-heading">
				<div class="panel-title"><i class="fa fa-edit"></i> Lista de Matrículas </div>
				</div>
  				<div class="panel-body">
                    <!--==== pesquisa de professor =====-->
                    <?php
                    $result = 0;
                    
                    @$estud_cod = $_POST['estud_cod'];
                    if(!empty($_POST['estud_cod'])){
                     $sql = "SELECT * FROM tb_matriculas WHERE estud_cod LIKE '%$estud_cod%'";
                    $consult = mysqli_query($conexao, $sql);
                    $result = mysqli_num_rows($consult);
                    $_SESSION['profEncontrado'] = "Matrícula pesquisada encontrado com sucesso!";
                    }
                    ?>
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
						<thead>
							<tr id="th-tabela">
								<th>Estudante</th>
								<th>Turno</th>
                                <th>Série</th>
								<th>Ação</th>
							</tr>
						</thead>
						<tbody>
                            <?php
                            if($result > 0){
                             $sql = "SELECT * FROM tb_matriculas MT JOIN tb_estudantes ET ON MT.estud_cod = ET.id_estud";
                            $consult = mysqli_query($conexao, $sql);
                            while($line = mysqli_fetch_array($consult)){?>
							<tr class="odd gradeX" id="nome-informacao">
								<td><?= $line['nome_estud'];?></td>
                                <td><?= $line['turno_estud'];?></td>
                                <td><?= $line['serie_estud'];?></td>
								<td id="btn-acao-disc">
                                    <a  href="detalhe_matricula.php?id_estud=<?= $line['id_estud'];?>">
                                    <i id="icon-list-tabela" class="fa fa-folder-open"></i></a> 
                                </td>
							</tr>
                            <?php
                            }
                            }else{
                             $_SESSION['matricEncontradoErro'] = "Matrícula pesquisada não foi encontrado";
                            }
                            ?>
						</tbody>
					</table>
              </div>
		</div>
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
    <script src="../Components/javascript/jquery.js"></script>
    <script src="../Components/javascript/jquery2.js"></script>
    <script src="../Components/javascript/js/bootstrap.min.js"></script>
    <script src="../Components/javascript/datatables/js/jquery.dataTables.min.js"></script>
    <script src="../Components/javascript/datatables/dataTables.bootstrap.js"></script>
     <link href="../Components/javascript/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">
    <script src="../Components/javascript/js/custom.js"></script>
    <script src="../Components/javascript/js/tables.js"></script>
        
<!-- ===== alert pesquisa =====-->
<?php if(isset($_SESSION['profEncontrado'])){?>
<script type="text/javascript">
  $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultSuccess').ready(function() {
      toastr.success('<?= $_SESSION['profEncontrado'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['profEncontrado']); }?>
  <?php if(isset($_SESSION['matricEncontradoErro'])){?>
    <script type="text/javascript">
    $(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });
    $('.toastrDefaultError').ready(function() {
      toastr.error('<?= $_SESSION['matricEncontradoErro'];?>')
    });
  });
  </script>
  <?php unset($_SESSION['matricEncontradoErro']); }?>
  <!-- ===== fim alert pesquisa =====-->
 
  </body>
</html>