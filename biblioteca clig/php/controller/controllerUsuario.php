<?php

include_once $_SESSION["root"].'php/DAO/DAOUsuario.php';
include_once $_SESSION["root"].'php/model/modelUsuario.php';

class controllerUsuario {
	function getAllUsuarios(){
		$DAOusuario = new DAOUsuario();
		$usuarios=$DAOusuario->getAllUsuarios();
		include_once $_SESSION["root"].'php/view/ViewExibeUsuarios.php';
	}

	function editarUsuario(){
		$userDAO = new DAOUsuario();
		$usuarios=$userDAO->getAllUsuarios();
		
		include $_SESSION["root"].'php/view/ViewEditUsuario.php';
	}

	function alterarUsuario(){
		//print_r($_POST);
		$userDAO = new DAOUsuario();
		$usuario = new modelUsuario();
		$usuario->editUsuarioFromPOST();
		$resultadoAlteracao = $userDAO->editarUsuario($usuario);
		
		$usuarios=$userDAO->getAllUsuarios();
		
		if($resultadoAlteracao){
			$_SESSION["flash"]["msg"]="Funcionário editado com Sucesso";
			$_SESSION["flash"]["sucesso"]=true;			
		}

		include_once $_SESSION["root"].'php/view/ViewExibeUsuarios.php';
	}
	

	function excluirUsuario(){
		$userDAO = new DAOUsuario();
		$userDAO->deletaUsuario($_GET["id_usuario"]);
		$usuarios=$userDAO->getAllUsuarios();
		
		include_once $_SESSION["root"].'php/view/ViewExibeUsuarios.php';
	}

	
	
	function setUsuario(){
		$usuarioDAO = new DAOUsuario();
		$usuario = new modelUsuario();
		$usuario->setUsuarioFromPOST();
		$resultadoInsercao = $usuarioDAO->setUsuario($usuario);
			
		if($resultadoInsercao){
			$_SESSION["flash"]["msg"]="Usuario Cadastrado com Sucesso";
			$_SESSION["flash"]["sucesso"]=true;			
		}
		else{
			$_SESSION["flash"]["msg"]="O Login já existe no banco";
			$_SESSION["flash"]["sucesso"]=false;
		}
		include_once $_SESSION["root"].'php/view/ViewCadastraUsuario.php';
	}
}