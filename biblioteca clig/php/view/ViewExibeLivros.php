<?php
$titulo="Exibir Livros";
include $_SESSION["root"].'includes/header.php';
?>
</script>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->	
		<div id="principal">
			<h1 class="text-center">Livros</h1>
			<table class="table table-striped" id="livros_table">
			<?php 
				
				
				echo "<thead>";
				echo "<tr>";
					echo "<th>Titulo</th>";
					echo "<th>Autor</th>";
					echo "<th>Categoria</th>";
					echo "<th>Opções</th>";
				echo "</tr>";
				echo "</thead>";
				echo "<tbody>";
				foreach ($livros as $value) {
					if($value->getExibir() == 1){
						echo "<tr>";
							echo "<td>".$value->getTitulo()."</td>";
							echo "<td>".$value->getAutor()."</td>";
							echo "<td>".$value->getCategoria()."</td>";
							echo "<td><a href='deletarLivro?id_livro=".$value->getIdLivro()."'>";
							echo "<i class='fas fa-trash-alt'></i></a> ";
							echo "<a href='editarLivro?id_livro=".$value->getIdLivro()."'>";
							echo "<i class='fas fa-edit'></i></a></td>";
						echo "</tr>";
					}
				}
				echo "</tbody>";
			?>
					
			</table>
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
        $('.visualizarLivro').addClass('active');
    });
</script>