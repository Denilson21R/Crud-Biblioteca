<?php
$titulo="Exibir Usuarios";
include $_SESSION["root"].'includes/header.php';
?>
</script>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->	
		<div id="principal">
			<h1 class="text-center">Usuários</h1>
			<table class="table table-striped">
			<?php 
				
				
				echo "<tr>";
					echo "<th>Nome</th>";
					echo "<th>CPF</th>";
					echo "<th>Opções</th>";
				echo "</tr>";
				foreach ($usuarios as $value) {
					if($value->getExibir() == 1){
						echo "<tr>";
							echo "<td>".$value->getNome()."</td>";
							echo "<td>".$value->getCpf()."</td>";
							echo "<td><a href='deletarUsuario?id_usuario=".$value->getIdUsuario()."'>";
							echo "<i class='fas fa-trash-alt'></i></a> ";
							echo "<a href='editarUsuario?id_usuario=".$value->getIdUsuario()."'>";
							echo "<i class='fas fa-edit'></i></a></td>";
						echo "</tr>";
					}
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
        $('.visualizarUsuario').addClass('active');
    });
</script>