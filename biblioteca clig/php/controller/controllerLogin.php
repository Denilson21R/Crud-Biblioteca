<?php

include_once $_SESSION["root"].'php/DAO/DAOLogin.php';
include_once $_SESSION["root"].'php/model/modelAdmin.php';

class controllerLogin {
	function verificaLogin(){
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			//recebo as variaveis por POST
			$login=$_POST["login"];
			$senha=$_POST["senha"];	
			
			$loginDAO = new DAOLogin();
			$admin=$loginDAO->verificaLogin($login);
			
			if ($admin!=NULL && $admin->getSenha()) {//password_verify($senha,$admin->getSenha()) caso for salvo em hash
				$_SESSION["logado"]=true;
				$_SESSION["nomeLogado"]=$admin->getLogin();
				$_SESSION["permissao"]=$admin->getPermissao();
				$_SESSION["senha"] = $_POST["senha"];
				
			
				if($admin->getPermissao() == 1){header("Location:exibeAdmins");}
				if($admin->getPermissao() == 0){header("Location:exibeLivros");}
			}
			else{
				$_SESSION["flash"]["login"]=$login;
				$_SESSION["flash"]["msg"]="Usuário ou senha não conferem";
				$_SESSION["flash"]["sucesso"]=false;
				//Coloquei na sessão "temporária" os avisos e feedbacks necessários, chamo a rota Login	
				header("Location:login");
			}
		}
	}
}