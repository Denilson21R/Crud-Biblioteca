<?php


class ModelEmprestimo {

	public $idEmprestimo;
    public $idLivro;
    public $idUsuario;
    public $data;
	
    public function setEmprestimoFromDataBase($linha){
        $this->setIdEmprestimo($linha["id"])
               ->setIdLivro($linha["id_livro"])
               ->setIdUsuario($linha["id_usuario"])
               ->setData($linha["data_vencimento"]);
    }
    public function setEmprestimoFromPOST(){
        $this->setIdEmprestimo(null)
            ->setIdLivro($_POST["escolhaLivro"])
            ->setIdUsuario($_POST["escolhaUsuario"])
            ->setData($_POST["data"]);
    }


    public function getIdEmprestimo(){
        return $this->idEmprestimo;
    }

    public function setIdEmprestimo($idEmprestimo){
        $this->idEmprestimo = $idEmprestimo;
        return $this;
    }

    public function getIdLivro(){
        return $this->idLivro;
    }

    public function setIdLivro($idLivro){
        $this->idLivro = $idLivro;
        return $this;
    }

    public function getIdUsuario(){
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario){
        $this->idUsuario = $idUsuario;
        return $this;
    }

    public function getData(){
        return $this->data;
    }

    public function setData($data){
        $this->data = $data;

        return $this;
    }



}