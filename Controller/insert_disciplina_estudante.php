
<?php
include_once '../Persistence/conection.php';
$id_estud = $_GET['id_estud'];
$sql = "SELECT * FROM tb_matriculas MT JOIN tb_estudantes ET ON MT.estud_cod = ET.id_estud WHERE id_estud='$id_estud'";
$consult = mysqli_query($conexao, $sql);
$line_mt = mysqli_fetch_assoc($consult);

$estuda = $_GET['id_estud'];
$discip = $_POST['discip'];

$sql = "INSERT INTO  tb_discip_estud(estuda, discip)VALUES('$estuda', '$discip')";
$execute = mysqli_query($conexao, $sql);
if($execute == true){
    $_SESSION['discipAdd'] = "Disciplina do(a) estudante adicionada com sucesso!";
    
}else{
    $_SESSION['discipAddErro'] = "Falha tente novamente";
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
                        <form>
	                  <div class="input-group form">
	                       <input type="text" name="#" class="form-control" placeholder="Pesquisar Estudante">
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
                    <a id="menu-link" href="../View/administrativo.php">
                    <i class="fa fa-home"></i> Administrativo</a>
                    </li>
                     <li>
                    <a id="menu-link"  href="../View/estudante_list.php">
                    <i class="fa fa-users"></i> Estudantes</a>
                    </li>
                     <li>
                    <a id="menu-link"  href="../View/professor_list.php">
                    <i class="fa fa-male"></i>  
                      <i id="icon-painel" class="fa fa-desktop"></i>
                      <i class="fa fa-female"></i> Professores</a>
                    </li>
                     <li>
                    <a id="menu-link"  href="../View/matriculas.php">
                    <i class="fa fa-edit"></i> Matrículas</a>
                    </li>
                    <li>
                    <a id="menu-link"  href="../View/disciplinas.php">
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
					            <div class="panel-title"><i class="fa fa-edit"></i> Detalhe da Matrícula</div>
                                <button class="btn btn-primary btn-sm pull-right"><i class="fa fa-list"></i> Notas</button>
					        </div>
			  				<div class="panel-body">
			  					<table class="table table-striped">
				              <thead>
				                <tr  id="th-tabela">
				                  <th>Estudante</th>
				                  <th>Série</th>
				                  <th>Turno</th>
				                </tr>
				              </thead>
				              <tbody>
				                <tr>
				                  <td><?= $line_mt['nome_estud'];?></td>
				                  <td><?= $line_mt['serie_estud'];?></td>
				                  <td><?= $line_mt['turno_estud'];?></td>
				                </tr>
				                <tr>
				                  <th colspan="2">Endereço</th>
				                  <th>Telefone</th>
				                </tr>
                                <tr>
				                  <td  colspan="2"><?= $line_mt['endereco_estud'];?></td>
				                  <td><?= $line_mt['fone_estud'];?></td>
				                </tr>
				              </tbody>
				            </table>
			  				</div>
			  			</div>
	  				</div>
              </div>
            <div class="content-box-large">
  		    <div class="panel-heading">
				<div class="panel-title"><i class="fa fa-plus"></i> Informações</div>
				</div>
  				<div class="panel-body">
                    <div>
                        <div>
                            <div>
								<ul class="nav nav-pills">
								  	<li class="active"><a href="#tab1" data-toggle="tab"><i class="fa fa-calendar"></i> Frequência</a></li>
									<li><a href="#tab2" data-toggle="tab"><i class="fa fa-male"></i> <i class="fa fa-desktop"></i>
                                    <i class="fa fa-female"></i> Professores</a></li>
									<li><a href="#tab3" data-toggle="tab"><i class="fa fa-book"></i> Disciplinas</a></li>
								</ul>
								 </div>
								  </div>
								</div>
								<div class="tab-content">
                                    <!--====== frequencia ====--> 
								    <div class="tab-pane active" id="tab1">
                                <button  id="btn-add-det-mat" data-toggle="modal" data-target="#modal-chamada<?= $line_mt['id_estud'];?>" class="btn btn-primary btn-sm pull-right">
                            <i class="fa fa-calendar"></i> Fazer Chamada</button>
						<table class="table table-striped">
                        <thead>
                             <tr  id="th-tabela">
                               <th>Dia</th>
                               <th>Data</th>
                               <th>Status</th>
                                <th>Ação</th>
                             </tr>
                           </thead>
                           <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_frequencias FQ JOIN tb_estudantes ET ON FQ.estudante = ET.id_estud WHERE id_estud='$id_estud'";
                        $consult = mysqli_query($conexao, $sql);
                        while($line_fq = mysqli_fetch_array($consult)){
                          ?>
                          <tr id="infor-freq">
                            <td><?= $line_fq['dia_freq'];?></td>
                            <td><?= $line_fq['data_freq'];?></td>
                            <td><?= $line_fq['status_freq'];?></td>
                            <td>
                        <a  href=""  data-toggle="modal" data-target="#modal-alterar-chamada<?= $line_fq['id_freq'];?>">
                        <i id="icon-list-freq" class="fa fa-pencil"></i></a>
                <!-- ========== modal alterar chamada ========-->
                <div class="modal fade" id="modal-alterar-chamada<?= $line_fq['id_freq'];?>">
                    <div class="modal-dialog"  id="posicao-modal">
                        <div class="modal-content"  id="tamanho-modal">
                            <div class="modal-header">
                                <h4 class="modal-title">Alterar dados da chamada</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                            </div>
                        <div class="modal-body">
                    <form class="form-horizontal" role="form" action="../Controller/update_frequencia.php?id_freq=<?= $line_fq['id_freq'];?>" method="post">
			 <div class="form-group">
                 <small for="inputEmail3" class="col-sm-2 control-label">Dia: </small>
				   <div class="col-sm-10">
				    <select type="text" name="dia_freq" class="form-control" id="inputEmail3">
                    <option><?= $line_fq['dia_freq'];?></option>
                    <option>Segunda Feira</option>
                    <option>Terça Feira</option>
                    <option>Quarta Feira</option>
                    <option>Quinta Feira</option>
                    <option>Sexta Feira</option>
                    <option>Sábado</option>
                    <option>Domingo</option>
                    </select>
				</div>
			 </div>
			 <div class="form-group">
			    <small for="inputEmail3" class="col-sm-2 control-label">Data: </small>
				 <div class="col-sm-10">
				    <input type="date" name="data_freq" class="form-control" id="inputPassword3" value="<?= $line_fq['data_freq'];?>">
				</div>
		   </div>
               <div class="form-group">
			   <small for="inputEmail3" class="col-sm-2 control-label">Status:</small>
				 <div class="col-sm-10">
				   <select type="text" name="status_freq" class="form-control" id="inputEmail3">
                    <option><?= $line_fq['status_freq'];?></option>
                    <option>Presença</option>
                    <option>Falta</option>
                    </select>
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
      </div>
        <!--      fim -->            
       <a  href="" data-toggle="modal" data-target="#modal-delete-freq<?= $line_fq['id_freq'];?>">
          <i id="icon-del-freq" class="fa fa-trash"></i></a>
                <!-- ========== modal delete frequencia ========-->
                <div class="modal fade" id="modal-delete-freq<?= $line_fq['id_freq'];?>">
                   <div class="modal-dialog"  id="posicao-modal">
                      <div class="modal-content"  id="tamanho-modal">
                        <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body text-center">
                                 <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                                  <a href="../Controller/delete_frequencia.php?id_freq=<?= $line_fq['id_freq'];?>">
                                <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Sim</button></a>
                               <button id="btn-modal" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-thumbs-o-down"></i> Não</button>
                            </div>
                        </div>
                    </div>
                 </div> 
                 </td>
                 </tr>
                   <?php } ?>
              </tbody>
         </table>
			</div>
        <!--==== professores ===-->
		<div class="tab-pane" id="tab2">
         <button id="btn-add-det-mat" data-toggle="modal" data-target="#modal-professor<?= $line_mt['id_estud'];?>" class="btn btn-primary btn-sm pull-right">
            <i class="fa fa-plus"></i> Professor</button>
		  <table class="table table-striped">
                        <thead>
                             <tr  id="th-tabela">
                               <th>Professor</th>
                                <th>Ação</th>
                             </tr>
                           </thead>
                           <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_professor_estud PE  JOIN tb_professores PF ON PE.prof = PF.id_prof JOIN tb_estudantes ET ON PE.estud = ET.id_estud WHERE id_estud='$id_estud'";
                        $consult_prof = mysqli_query($conexao, $sql);
                        while($line_prof = mysqli_fetch_array($consult_prof)){
                          ?>
                          <tr id="infor-freq">
                            <td><?= $line_prof['nome_prof'];?></td>
                              
                            <td  id="btn-acao-matric">
                        <a  href=""  data-toggle="modal" data-target="#modal-alterar-prof_estudante<?= $line_prof['id_prof_estud'];?>">
                        <i id="icon-list-freq" class="fa fa-pencil"></i></a>  
                          <!-- ========== modal alterar professor ========-->
        <div class="modal fade" id="modal-alterar-prof_estudante<?= $line_prof['id_prof_estud'];?>">
        <div class="modal-dialog"  id="posicao-modal">
          <div class="modal-content"  id="tamanho-modal">
            <div class="modal-header">
            <h4 class="modal-title">Alterar  professor do(a) estudante</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
           <form class="form-horizontal" role="form" action="../Controller/update_professor_estudante.php?id_prof_estud=<?= $line_prof['id_prof_estud'];?>" method="post">
			 <div class="form-group">
                 <?php
                 include_once  '../Persistence/professor.Crud.php';
                    $crudProf = new CRUDProf();
                    $result = $crudProf->listProf();
                    ?>
                 <label for="inputEmail3" class="col-sm-2 control-label">Professor: </label>
				   <div class="col-sm-10">
				    <select type="text" name="prof" class="form-control" id="inputEmail3">
                    <option><?= $line_prof['nome_prof'];?></option>
                        <?php while($line_pf = array_shift($result)){?>
                    <option value="<?= $line_pf->getId_prof();?>"><?= $line_pf->getNome_prof();?></option>
                        <?php }?>
                    </select>
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
      </div> 
        <!--      fim -->            
       <a  href="" data-toggle="modal" data-target="#modal-delete-prof<?= $line_prof['id_prof_estud'];?>">
          <i id="icon-del-freq" class="fa fa-trash"></i></a>
                <!-- ========== modal delete professor ========-->
                <div class="modal fade" id="modal-delete-prof<?= $line_prof['id_prof_estud'];?>">
                   <div class="modal-dialog"  id="posicao-modal">
                      <div class="modal-content"  id="tamanho-modal">
                        <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body text-center">
                                 <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                                  <a href="../Controller/delete_professor_estudante.php?id_prof_estud=<?= $line_prof['id_prof_estud'];?>">
                                <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Sim</button></a>
                               <button id="btn-modal" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-thumbs-o-down"></i> Não</button>
                            </div>
                        </div>
                    </div>
                 </div> 
                 </td>
                 </tr>
                <?php } ?>
              </tbody>
            </table>
				</div>
                <!--==== disciplinas ====--->
				<div class="tab-pane" id="tab3">
				<button  id="btn-add-det-mat" data-toggle="modal" data-target="#modal-disciplina<?= $line_mt['id_estud'];?>" class="btn btn-primary btn-sm pull-right">
                            <i class="fa fa-plus"></i> Disciplina</button>
		          <table class="table table-striped">
                        <thead>
                             <tr  id="th-tabela">
                               <th>Disciplina</th>
                                <th>Ação</th>
                             </tr>
                           </thead>
                           <tbody>
                        <?php
                        $sql = "SELECT * FROM tb_discip_estud DE  JOIN tb_disciplinas DC ON DE.discip = DC.id_discip JOIN tb_estudantes ET ON DE.estuda = ET.id_estud WHERE id_estud='$id_estud'";
                        $consult_discip = mysqli_query($conexao, $sql);
                        while($line_discip = mysqli_fetch_array($consult_discip)){
                          ?>
                          <tr id="infor-freq">
                            <td><?= $line_discip['nome_discip'];?></td>
                              
                            <td id="btn-acao-matric">
                        <a  href=""  data-toggle="modal" data-target="#modal-alterar-discip_estudante<?= $line_discip['id_discip_estud'];?>">
                        <i id="icon-list-freq" class="fa fa-pencil"></i></a> 
                    <!-- ========== modal alterar disciplina ========-->
                    <div class="modal fade" id="modal-alterar-discip_estudante<?= $line_discip['id_discip_estud'];?>">
                    <div class="modal-dialog"  id="posicao-modal">
                      <div class="modal-content"  id="tamanho-modal">
                        <div class="modal-header">
                        <h4 class="modal-title">Alterar  disciplina do(a) estudante</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                       <form class="form-horizontal" role="form" action="../Controller/update_disciplina_estudante.php?id_discip_estud=<?= $line_discip['id_discip_estud'];?>" method="post">
                         <div class="form-group">
                     <?php
                     include_once  '../Persistence/disciplina.Crud.php';
                        $crudDiscip = new CRUDDiscip();
                        $result = $crudDiscip->listDiscip();
                        ?>
                 <label for="inputEmail3" class="col-sm-2 control-label">Disciplina: </label>
				   <div class="col-sm-10">
				    <select type="text" name="discip" class="form-control" id="inputEmail3">
                    <option><?= $line_discip['nome_discip'];?></option>
                        <?php while($line_dc = array_shift($result)){?>
                    <option value="<?= $line_dc->getId_discip();?>"><?= $line_dc->getNome_discip();?></option>
                        <?php }?>
                    </select>
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
      </div> 
        <!--      fim -->            
       <a  href="" data-toggle="modal" data-target="#modal-delete-discip<?= $line_discip['id_discip_estud'];?>">
          <i id="icon-del-freq" class="fa fa-trash"></i></a>
                <!-- ========== modal delete disciplina ========-->
                <div class="modal fade" id="modal-delete-discip<?= $line_discip['id_discip_estud'];?>">
                   <div class="modal-dialog"  id="posicao-modal">
                      <div class="modal-content"  id="tamanho-modal">
                        <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body text-center">
                                 <small id="pergunta-modal"> Deseja realmente excuir este registro ?</small><br><br>
                                  <a href="../Controller/delete_disciplina_estudante.php?id_discip_estud=<?= $line_discip['id_discip_estud'];?>">
                                <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Sim</button></a>
                               <button id="btn-modal" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-thumbs-o-down"></i> Não</button>
                            </div>
                        </div>
                    </div>
                 </div> 
                 </td>
                 </tr>
                <?php } ?>
              </tbody>
            </table>
        </div>
            </div>
            </div>
               </div>
          </div>
      </div>
    </div>
      <!-- ========== modal chamada ========-->
        <div class="modal fade" id="modal-chamada<?= $line_mt['id_estud'];?>">
        <div class="modal-dialog"  id="posicao-modal">
          <div class="modal-content"  id="tamanho-modal">
            <div class="modal-header">
            <h4 class="modal-title">Fazer chamada</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
           <form class="form-horizontal" role="form" action="../Controller/insert_frequencia.php?id_estud=<?= $line_mt['id_estud'];?>" method="post">
			 <div class="form-group">
                 <label for="inputEmail3" class="col-sm-2 control-label">Dia: </label>
				   <div class="col-sm-10">
				    <select type="text" name="dia_freq" class="form-control" id="inputEmail3" required="">
                    <option></option>
                    <option>Segunda Feira</option>
                    <option>Terça Feira</option>
                    <option>Quarta Feira</option>
                    <option>Quinta Feira</option>
                    <option>Sexta Feira</option>
                    <option>Sábado</option>
                    <option>Domingo</option>
                    </select>
				</div>
			 </div>
			 <div class="form-group">
			    <label for="inputEmail3" class="col-sm-2 control-label">Data: </label>
				 <div class="col-sm-10">
				    <input type="date" name="data_freq" class="form-control" id="inputPassword3" required="">
				</div>
		   </div>
               <div class="form-group">
			   <label for="inputEmail3" class="col-sm-2 control-label">Status:</label>
				 <div class="col-sm-10">
				   <select type="text" name="status_freq" class="form-control" id="inputEmail3" required="">
                    <option></option>
                    <option>Presença</option>
                    <option>Falta</option>
                    </select>
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
      </div> 
      <!-- ========== modal add professor ========-->
        <div class="modal fade" id="modal-professor<?= $line_mt['id_estud'];?>">
        <div class="modal-dialog"  id="posicao-modal">
          <div class="modal-content"  id="tamanho-modal">
            <div class="modal-header">
            <h4 class="modal-title">Adicionar  professor do(a) estudante</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
           <form class="form-horizontal" role="form" action="../Controller/insert_professor_estudante.php?id_estud=<?= $line_mt['id_estud'];?>" method="post">
			 <div class="form-group">
                 <?php
                 include_once  '../Persistence/professor.Crud.php';
                    $crudProf = new CRUDProf();
                    $result = $crudProf->listProf();
                    ?>
                 <label for="inputEmail3" class="col-sm-2 control-label">Professor: </label>
				   <div class="col-sm-10">
				    <select type="text" name="prof" class="form-control" id="inputEmail3" required="">
                    <option></option>
                        <?php while($line_prof = array_shift($result)){?>
                    <option value="<?= $line_prof->getId_prof();?>"><?= $line_prof->getNome_prof();?></option>
                        <?php }?>
                    </select>
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
      </div> 
      <!-- ========== modal add disciplina ========-->
        <div class="modal fade" id="modal-disciplina<?= $line_mt['id_estud'];?>">
        <div class="modal-dialog"  id="posicao-modal">
          <div class="modal-content"  id="tamanho-modal">
            <div class="modal-header">
            <h4 class="modal-title">Adicionar  disciplina do(a) estudante</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
           <form class="form-horizontal" role="form" action="../Controller/insert_disciplina_estudante.php?id_estud=<?= $line_mt['id_estud'];?>" method="post">
			 <div class="form-group">
                  <?php
                 include_once  '../Persistence/disciplina.Crud.php';
                    $crudDiscip = new CRUDDiscip();
                    $result = $crudDiscip->listDiscip();
                    ?>
                 <label for="inputEmail3" class="col-sm-2 control-label">Disciplina: </label>
				   <div class="col-sm-10">
				    <select type="text" name="discip" class="form-control" id="inputEmail3" required="">
                    <option><?= $line_discip['nome_discip'];?></option>
                        <?php while($line_discip = array_shift($result)){?>
                    <option value="<?= $line_discip->getId_discip();?>"><?= $line_discip->getNome_discip();?></option>
                        <?php }?>
                    </select>
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
      </div>
      <!-- ========== modal cadatro professor estudante ========-->
                <div class="modal fade" id="modalAcerto">
                   <div class="modal-dialog"  id="posicao-modal">
                      <div class="modal-content"  id="tamanho-modal">
                        <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body text-center">
                                 <small id="pergunta-modal">
                                     <?= $_SESSION['discipAdd'];?></small><br><br>
                                  <a href="../View/detalhe_matricula.php?id_estud=<?= $id_estud;?>">
                                <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Sim</button></a>
                            </div>
                        </div>
                    </div>
                 </div> 
      <!-- ========== modal cadatro erro professor estudante ========-->
                <div class="modal fade" id="myModalErro">
                   <div class="modal-dialog"  id="posicao-modal">
                      <div class="modal-content"  id="tamanho-modal">
                        <div class="modal-header">
                             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body text-center">
                                 <small id="pergunta-modal">Erro no cadastro</small><br><br>
                                  <a href="../View/detalhe_matricula.php?id_estud=<?=  $id_estud;?>">
                                <button id="btn-modal" class="btn btn-primary"><i class="fa fa-thumbs-o-up"></i> Sim</button></a>
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
    <script src="../Components/jquery_modal.js"></script>
    <script src="../Components/jquery_modell.js"></script>
      

<?php 
if($_SESSION['discipAdd'] == true){
  ?>
<script type="text/javascript">
$(document).ready(function(){
  $('#modalAcerto').modal('show');
});
</script>
<?php
}else{
?>
  <script type="text/javascript">
$(document).ready(function(){
  $('#myModalErro').modal('show');
});
</script>
<?php
}
?>
</body>
</html>