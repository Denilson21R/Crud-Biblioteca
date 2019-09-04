<?php
$titulo="Cadastrar Usuario";
include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->	
		<div id="principal">
			<h1 class="text-center">Cadastro de Usuários</h1>
			<form action="postCadastraUsuario" method="POST">
				<div class="row">
					<?php if(isset($_SESSION["flash"]["msg"])){
							if($_SESSION["flash"]["sucesso"]==false)
								echo"<div class='bg-danger text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							else{
								echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							}
						} ?>
					<div class="col-md-12">
						<div class="form-group">
							<label for="nomeUsuario">Nome:<span class="requerido">*</span></label>
							<input type="text" name="nomeUsuario" class="form-control" id="nomeUsuario" 
								value="<?php if(isset($_SESSION["flash"]["nomeUsuario"]))echo $_SESSION["flash"]["nomeUsuario"];?>">
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label for="cpfUsuario">CPF:<span class="requerido">*</span></label>
							<input type="text" name="cpfUsuario" class="form-control" id="cpfUsuario" value="<?php if(isset($_SESSION["flash"]["cpfUsuario"]))echo $_SESSION["flash"]["cpfUsuario"];?>">
						</div>					
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="senhaUsuario">Senha:<span class="requerido">*</span></label>
							<input type="password" name="senhaUsuario" class="form-control" id="senhaUsuario" value="<?php if(isset($_SESSION["flash"]["senhaUsuario"]))echo $_SESSION["flash"]["senhaUsuario"];?>">
						</div>					
					</div>
			  	</div>
			  <button type="submit" class="btn btn-default center-block">Cadastrar</button>
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
	}?>
<!-- fim footer -->
<script>		
	$(document).ready(function () {
        $('.cadastraUsuario').addClass('active');
    });
</script>