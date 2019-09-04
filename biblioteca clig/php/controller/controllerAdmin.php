<?php

include_once $_SESSION["root"].'php/DAO/DAOAdmin.php';
include_once $_SESSION["root"].'php/Model/modelAdmin.php';

//supondo que só podem ser adicionados diretamente pelo banco
class controllerAdmin {
	function getAllAdmins(){
		$adminDAO = new DAOAdmin();
		$admins=$adminDAO->getAllAdmins();
		include_once $_SESSION["root"].'php/View/ViewExibeAdmins.php';
	}

	function excluirAdmin(){
		$adminDAO = new DAOAdmin();
		$adminDAO->deletaAdmin($_GET["id_admin"]);
		$admins=$adminDAO->GetAllAdmins();
		include_once $_SESSION["root"].'php/view/ViewExibeAdmins.php';
	}

	
}