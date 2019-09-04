<?php

include_once $_SESSION["root"].'php/DAO/DAOLivros.php';
include_once $_SESSION["root"].'php/model/modelLivro.php';

class controllerLivro {
	function getAllLivros(){
		$DAOlivro = new DAOLivros();
		$livros=$DAOlivro->getAllLivros();
		include_once $_SESSION["root"].'php/view/ViewExibeLivros.php';
	}


	function cadastraLivro(){
		$livrosDAO = new DAOLivros();
		$livros = $livrosDAO->getAllLivros();
		include_once $_SESSION["root"].'php/View/ViewCadastraLivros.php';
	}


	function excluirLivro(){
			$livrosDAO = new DAOLivros();
			$livrosDAO->deletaLivro($_GET["id_livro"]);
			$livros=$livrosDAO->getAllLivros();
			
			include_once $_SESSION["root"].'php/view/ViewExibeLivros.php';
		}

	function editarLivro(){
		$livroDAO = new DAOLivros();
		$livros=$livroDAO->getAllLivros();
		
		include $_SESSION["root"].'php/view/ViewEditLivro.php';
	}

	

	function alterarLivro(){
		$livroDAO = new DAOLivros();
		$livro = new modelLivro();
		$livro->editLivroFromPOST();
		$resultadoAlteracao = $livroDAO->editarLivro($livro);
		
		$livros=$livroDAO->getAllLivros();
		
		if($resultadoAlteracao){
			$_SESSION["flash"]["msg"]="Livro editado com Sucesso";
			$_SESSION["flash"]["sucesso"]=true;			
		}

		include_once $_SESSION["root"].'php/view/ViewExibeLivros.php';
	}
	
	function setLivro(){
		$livroDAO = new DAOLivros();
		$livro = new modelLivro();
		$livro->setLivroFromPOST();

		$resultadoInsercao = $livroDAO->setLivro($livro);
		
		if($resultadoInsercao){
			$_SESSION["flash"]["msg"]="Livro Cadastrado com Sucesso";
			$_SESSION["flash"]["sucesso"]=true;			
		}
		else{
			$_SESSION["flash"]["msg"]="O Login já existe no banco";
			$_SESSION["flash"]["sucesso"]=false;
			
		}
		include_once $_SESSION["root"].'php/view/ViewCadastraLivros.php';

	}
}