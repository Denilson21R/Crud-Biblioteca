<?php
$titulo="Cadastrar Emprestimo";
include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->	
		<div id="principal">
			<h1 class="text-center">Cadastro de Emprestimos</h1>
			<form action="postCadastraEmprestimo" method="POST">
				<div class="row">
					<?php if(isset($_SESSION["flash"]["msg"])){
							if($_SESSION["flash"]["sucesso"]==false)
								echo"<div class='bg-danger text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							else{
								echo"<div class='bg-success text-center msg'>".$_SESSION["flash"]["msg"]."</div>";
							}
						} ?>
					<div class="col-md-6">
						<div class="form-group">
							<label for="escolhaLivro">Livro:<span class="requerido">*</span></label>
							<select name="escolhaLivro" class="form-control" id="escolhaLivro">
								<option>Escolha um livro:</option>
								<?php
									foreach ($livros as $livro) {
										echo '<option value"'.$livro->getIdLivro().'">'.$livro->getTitulo().'</option>';
									}
								?>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="escolhaUsuario">Usuario:<span class="requerido">*</span></label>
							<select name="escolhaUsuario" class="form-control" id="escolhaUsuario">
								<option>Escolha um usuario:</option>
								<?php
									foreach ($usuarios as $usuario) {
										echo '<option value"'.$usuario->getIdUsuario().'">'.$usuario->getNome().'</option>';
									}
								?>
							</select>
						</div>					
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="escolhaLivro">Data de Vencimento:<span class="requerido">*</span></label>
							<input id="data" type="date" name="data">
								
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
        $('.cadastrarEmprestimo').addClass('active');
    });
</script>