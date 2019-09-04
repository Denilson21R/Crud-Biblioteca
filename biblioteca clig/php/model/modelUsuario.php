<?php
class modelUsuario {

    public $idUsuario;
    public $nome;
    public $cpf;
    public $senha; 
    public $exibir;

    
    public function setUsuarioFromDataBase($linha){
        $this->setIdUsuario($linha["id"])
               ->setNome($linha["nome"])
               ->setCpf($linha["cpf"])
               ->setSenhaFromBD($linha['senha'])
               ->setExibir($linha['exibir']);
    }
    public function setUsuarioFromPOST(){

        $this->setIdUsuario(null)
               ->setNome($_POST["nomeUsuario"])
               ->setCpf($_POST['cpfUsuario'])
               ->setSenhaFromBD($_POST['senhaUsuario'])
               ->setExibir(1);
    }

    public function editUsuarioFromPOST(){

        $this->setIdUsuario($_POST["id"])
               ->setNome($_POST["nome"])
               ->setCpf($_POST["cpf"])
               ->setSenha($_POST["senha"])
               ->setExibir(1);
    }
    
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;

        return $this;
    }

    
    public function getNome()
    {
        return $this->nome;
    }

    
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function setExibir($exibir)
    {
        $this->exibir = $exibir;

        return $this;
    }

    public function getExibir()
    {
        return $this->exibir;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    
    public function setCpf($cpf)
    {
        $this->cpf = $cpf ;

        return $this;
    }

    
    public function getSenha()
    {
        return $this->senha;
    }

    public function setSenha($senha)
    {
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);

        return $this;
    }

    
    public function setSenhaFromBD($senha)
    {
        $this->senha = $senha;

        return $this;
    }


}