<?php
$titulo="Exibir Emprestimos";
include $_SESSION["root"].'includes/header.php';
?>
</script>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->	
		<div id="principal">
			<h1 class="text-center">Empréstimos</h1>
			<table class="table table-striped">
			<?php 
				
				
				echo "<tr>";
					echo "<th>Nome do Livro</th>";
					echo "<th>Nome do Usuario</th>";
					echo "<th>Data de Vencimento</th>";
					echo "<th>Opções</th>";
				echo "</tr>";
				foreach ($emps as $value) {
					echo "<tr>";
						echo "<td>".$value->getIdLivro()."</td>";
						echo "<td>".$value->getIdUsuario()."</td>";
						echo "<td>".$value->getData()."</td>";
						echo "<td><a href='deletarEmprestimo?id_emprestimo=".$value->getIdEmprestimo()."'>";
						echo "<i class='fas fa-trash-alt'></i></a> ";
					echo "</tr>";
				}

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
        $('.visualizarEmprestimos').addClass('active');
    });
</script>























