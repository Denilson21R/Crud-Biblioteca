<?php

$path = explode('/', $_SERVER['REQUEST_URI']);

$action = $path[sizeOf($path) - 1];


$action = explode('?', $action);
$action = $action[0];

include_once $_SESSION["root"].'php/controller/controllerLogin.php';
include_once $_SESSION["root"].'php/controller/controllerAdmin.php';
include_once $_SESSION["root"].'php/controller/controllerLivro.php';
include_once $_SESSION["root"].'php/controller/controllerUsuario.php';
include_once $_SESSION["root"].'php/controller/controllerEmprestimo.php';

if ($action == '' || $action == 'index' || $action == 'index.php' || $action == 'login') {
	require_once $_SESSION["root"].'php/View/ViewLogin.php';
}
else if ($action == 'postLogin') {
	$cLogin = new controllerLogin();
	$cLogin->verificaLogin();
}
else if($_SESSION["logado"] == true){
	if ($action == 'exibeAdmins' && $_SESSION["permissao"] == 1) {
		$cFunc = new controllerAdmin();
		$cFunc->getAllAdmins();
	}
	if ($action == 'exibeAdmins' && $_SESSION["permissao"] == 0) {
		$cFunc = new controllerAdmin();
		$cFunc->getAllAdmins();
	}
	else if ($action == 'exibeLivros') {
		$cFunc = new controllerLivro();
		$cFunc->getAllLivros();
	}
	else if ($action == 'cadastraLivro') {
		$cFunc = new controllerLivro();
		$cFunc->cadastraLivro();
	}
	else if ($action == 'postCadastraLivro') {
		$cFunc = new controllerLivro();
		$cFunc->setLivro();
	}
	else if ($action == 'postCadastraUsuario') {
		$cFunc = new controllerUsuario();
		$cFunc->setUsuario();
	}
	else if($action == 'cadastraUsuario'){
		require_once $_SESSION["root"].'php/view/ViewCadastraUsuario.php';
	}
	else if($action == 'deletarLivro'){
		$cFunc = new controllerLivro();
		$cFunc->excluirLivro();
	}
	else if($action == 'editarLivro'){
		$cFunc = new controllerLivro();
		$cFunc->editarLivro();
	}
	else if($action == 'postEditarLivro'){
		$cFunc = new controllerLivro();
		$cFunc->alterarLivro();
	}
	
	else if($action == 'deletarUsuario'){
		$cFunc = new controllerUsuario();
		$cFunc->excluirUsuario();
	}
	else if($action == 'editarUsuario'){
		$cFunc = new controllerUsuario();
		$cFunc->editarUsuario();
	}
	else if($action == 'postEditarUsuario'){
		$cFunc = new controllerUsuario();
		$cFunc->alterarUsuario();
	}
	else if($action == 'deletarEmprestimo'){
		$cFunc = new controllerEmprestimo();
		$cFunc->excluirEmprestimo();
	}
	else if($action == 'deletarAdmin'){
		$cFunc = new controllerAdmin();
		$cFunc->excluirAdmin();
	}
	else if($action == 'exibeUsuarios'){
		$cDepto = new controllerUsuario();
		$cDepto->getAllUsuarios();
	}else if($action == 'cadastraEmprestimo'){
		$cProject = new controllerEmprestimo();
		$cProject->cadastraEmprestimo();
	}else if($action == 'postCadastraEmprestimo'){
		$cProject = new controllerEmprestimo();
		$cProject->setEmprestimo();
	}else if($action == 'exibeEmprestimos'){
		$cProject = new controllerEmprestimo();
		$cProject->getAllEmprestimo();
	}else if($action == 'logout'){
		$_SESSION["logado"] = false;
		require_once $_SESSION["root"].'php/View/ViewLogin.php';
	}
}
else if($_SESSION["logado"] == false){
	require_once $_SESSION["root"].'php/View/ViewLogin.php';
}
else {
	echo "Página não encontrada!";
}


?>