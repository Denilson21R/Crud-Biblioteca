<?php

class modelLivro{

	public $idLivro;
	public $titulo;
	public $autor;
	public $categoria;
    public $exibir;


	public function setLivroFromDataBase($linha){
        $this->setIdLivro($linha["id"])
           ->setTitulo($linha["titulo"])
           ->setAutor($linha['autor'])
           ->setCategoria($linha['categoria'])
           ->setExibir($linha['exibir']);
    }

    public function setLivroFromPOST(){
        print_r($_POST);
        $this->setIdLivro(null)
               ->setTitulo($_POST["tituloLivro"])
               ->setAutor($_POST["autorLivro"])
               ->setCategoria($_POST["categoriaLivro"])
               ->setExibir(1);
    }

    public function editLivroFromPOST(){
        $this->setIdLivro($_POST["id"])
               ->setTitulo($_POST["titulo"])
               ->setAutor($_POST["autor"])
               ->setCategoria($_POST["categoria"])
               ->setExibir(1);
    }

    public function getExibir(){
        return $this->exibir;
    }


    public function setExibir($exibir){
        $this->exibir = $exibir;
        return $this;
    }


    public function getTitulo(){
        return $this->titulo;
    }


    public function setTitulo($titulo){
        $this->titulo = $titulo;
        return $this;
    }

	public function getIdLivro(){
        return $this->idLivro;
    }


    public function setIdLivro($idLivro){
        $this->idLivro = $idLivro;
        return $this;
    }


   public function getAutor(){
        return $this->autor;
    }

    public function setAutor($autor){
        $this->autor = $autor;
        return $this;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

}