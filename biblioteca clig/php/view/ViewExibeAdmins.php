<?php
$titulo="Exibir Admins";
include $_SESSION["root"].'includes/header.php';
?>
</script>
<body>
	<div class="container" >
		<!-- add no menu -->
		<?php include $_SESSION["root"].'includes/menu.php';?>
		<!-- fim menu -->	
		<div id="principal">
			<h1 class="text-center">Administradores	</h1>
			<table class="table table-striped">
			<?php 
				
				
				echo "<tr>";
					echo "<th>E-mail</th>";
					echo "<th>Login</th>";
					echo "<th>Permissão</th>";
					if($_SESSION["permissao"]==1){
						echo "<th>Opções</th>";
					}
				echo "</tr>";
				foreach ($admins as $value) {
					echo "<tr>";
						echo "<td>".$value->getEmail()."</td>";
						echo "<td>".$value->getLogin()."</td>";
						if ($_SESSION["permissao"] == '') {
							echo "<td>Pode deletar outros admins</td>";
						}else{
							echo "<td>Não pode deletar outros admins</td>";
						}
						//echo "<td>".$value->getPermissao()."</td>";
						if($_SESSION["permissao"] == 1){
							echo "<td><a href='deletarAdmin?id_admin=".$value->getIdAdmin()."'>";
							echo "<i class='fas fa-trash-alt'></i></a> ";
						}
						
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
        $('.visualizarAdmin').addClass('active');
    });
</script>