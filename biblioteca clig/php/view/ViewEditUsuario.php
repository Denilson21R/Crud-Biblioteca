<?php
$titulo="Editar Usuario";
include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->

		<?php		
  		foreach ($usuarios as $key => $usuario) {
  			if($usuario->getIdUsuario() == $_GET["id_usuario"]){
	  	?>

		<div id="principal">
			<h1 class="text-center">Editar Usuario</h1>
			<form action="postEditarUsuario" method="POST">
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" name="id" value="<?php echo $_GET['id_usuario']; ?>">
						<div class="form-group">
							<label for="email">Nome:<span class="requerido">*</span></label>
							<input type="login" name="nome" class="form-control" id="nome" 
								value="<?=$usuario->getNome();?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="nome">CPF:<span class="requerido">*</span></label>
							<input type="text" name="cpf" class="form-control" id="cpf" value="<?=$usuario->getCpf();?>"> 
						</div>
					</div>	
					<div class="col-md-12">
						<div class="form-group">
							<label for="salario">Senha:<span class="requerido">*</span></label>
							<input type="password" name="senha" class="form-control" id="senha" value="<?=$_SESSION["senha"]?>">
						</div>

					</div>
				<?php
			 	}
			 }
			?>

			  	</div>
			  <button type="submit" class="btn btn-default center-block">Submit</button>
			</form>
		</div>
	</div>	
</body>
<!-- add no footer -->
<?php 
	include $_SESSION["root"].'includes/footer.php';
	if(isset($_SESSION["flash"])){
		foreach ($_SESSION["flash"] as $key => $value) {
			unset($_SESSION["flash"][$key]);	
		}
	}
?>
<!-- fim footer -->