<?php
$titulo="Editar Livro";
include $_SESSION["root"].'includes/header.php';
?>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->

		<?php	
  		foreach ($livros as $key => $livro) {
  			if($livro->getIdLivro() == $_GET["id_livro"]){
	  	?>

		<div id="principal">
			<h1 class="text-center">Editar Livro</h1>
			<form action="postEditarLivro" method="POST">
				<div class="row">
					<div class="col-md-12">
						<input type="hidden" name="id" value="<?php echo $_GET['id_livro']; ?>">
						<div class="form-group">
							<label for="email">Titulo:<span class="requerido">*</span></label>
							<input type="login" name="titulo" class="form-control" id="login" 
								value="<?=$livro->getTitulo();?>">
						</div>
					</div>
					<div class="col-md-12">
						<div class="form-group">
							<label for="nome">Autor:<span class="requerido">*</span></label>
							<input type="text" name="autor" class="form-control" id="nome" value="<?=$livro->getAutor();?>"> 
						</div>
					</div>	
					<div class="col-md-12">
						<div class="form-group">
							<label for="salario">Categoria:<span class="requerido">*</span></label>
							<input type="text" name="categoria" class="form-control" id="salario" value="<?=$livro->getCategoria();?>">
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