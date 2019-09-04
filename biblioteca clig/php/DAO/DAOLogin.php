<?php
//Add a classe responsavel por fazer a conexao com banco de dados
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/model/modelAdmin.php';
class DAOLogin {
	
	function verificaLogin($login){	

		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		$statement = $conn->prepare("SELECT * FROM admin WHERE login = :login");
		$statement->bindParam(':login', $login);
		$statement->execute();

		$linha = $statement->fetch();
		

		if($linha==null){
			return null;
		}
		$admin = new modelAdmin();	

		$admin->setAdminFromDataBase($linha);
   		return $admin;
		
	}

	function verificaCadastro($login){
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		$statement = $conn->prepare("SELECT * FROM admin WHERE login = :login");
		$statement->bindParam(':login', $login);
		$statement->execute();
	
		$linha = $statement->fetch();
		
		if($linha==null){
			return true;
		}else{
			return false;
		}

	}
}