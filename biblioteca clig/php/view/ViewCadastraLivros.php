<?php
$titulo="Cadastrar Livro";
include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->	
		<div id="principal">
			<h1 class="text-center">Cadastro de Livros</h1>
			<form action="postCadastraLivro" method="POST">
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
							<label for="tituloLivro">Titulo:<span class="requerido">*</span></label>
							<input type="text" name="tituloLivro" class="form-control" id="tituloLivro" 
								value="<?php if(isset($_SESSION["flash"]["tituloLivro"]))echo $_SESSION["flash"]["tituloLivro"];?>">
						</div>
					</div>

					<div class="col-md-12">
						<div class="form-group">
							<label for="autorLivro">Autor:<span class="requerido">*</span></label>
							<input type="text" name="autorLivro" class="form-control" id="autorLivro" value="<?php if(isset($_SESSION["flash"]["autorLivro"]))echo $_SESSION["flash"]["autorLivro"];?>">
						</div>					
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="categoriaLivro">Categoria:<span class="requerido">*</span></label>
							<input type="text" name="categoriaLivro" class="form-control" id="categoriaLivro" value="<?php if(isset($_SESSION["flash"]["categoriaLivro"]))echo $_SESSION["flash"]["categoriaLivro"];?>">
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
        $('.cadastraLivro').addClass('active');
    });
</script>