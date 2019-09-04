<?php

include_once $_SESSION["root"].'php/DAO/DAOEmprestimo.php';
include_once $_SESSION["root"].'php/Model/modelEmprestimo.php';
include_once $_SESSION["root"].'php/DAO/DAOLivros.php';
include_once $_SESSION["root"].'php/model/modelLivro.php';
include_once $_SESSION["root"].'php/DAO/DAOUsuario.php';
include_once $_SESSION["root"].'php/model/modelUsuario.php';


class controllerEmprestimo {
	function getAllEmprestimo(){
		$empDAO = new DAOEmprestimo();
		$emps=$empDAO->GetAllEmprestimos();
		$DAOlivro = new DAOLivros();
		$livros=$DAOlivro->getAllLivros();
		$DAOusuario = new DAOUsuario();
		$usuarios=$DAOusuario->getAllUsuarios();
		include_once $_SESSION["root"].'php/view/ViewExibeEmprestimo.php';
	}

	function cadastraEmprestimo(){
		$empDAO = new DAOEmprestimo();
		$emps=$empDAO->GetAllEmprestimos();
		$DAOlivro = new DAOLivros();
		$livros=$DAOlivro->getAllLivros();
		$DAOusuario = new DAOUsuario();
		$usuarios=$DAOusuario->getAllUsuarios();
		include_once $_SESSION["root"].'php/view/ViewCadastraEmprestimo.php';
	}

	

	function excluirEmprestimo(){
		$empDAO = new DAOEmprestimo();
		$empDAO->deletaEmprestimo($_GET["id_emprestimo"]);
		$emps=$empDAO->GetAllEmprestimos();
		
		include_once $_SESSION["root"].'php/view/ViewExibeEmprestimo.php';
	}


	function setEmprestimo(){
		$empDAO = new DAOEmprestimo();
		$emprestimo = new modelEmprestimo();
		
		$emprestimo->setEmprestimoFromPOST();
		$resultadoInsercao = $empDAO->setEmprestimo($emprestimo);
		
			
		if($resultadoInsercao){
			$_SESSION["flash"]["msg"]="Emprestimo Cadastrado com Sucesso";
			$_SESSION["flash"]["sucesso"]=true;			
		}
		
		$empDAO = new DAOEmprestimo();
		$emps=$empDAO->GetAllEmprestimos();
		$DAOlivro = new DAOLivros();
		$livros=$DAOlivro->getAllLivros();
		$DAOusuario = new DAOUsuario();
		$usuarios=$DAOusuario->getAllUsuarios();
		include_once $_SESSION["root"].'php/view/ViewCadastraEmprestimo.php';

	}
}