<?php

class modelAdmin{

	public $idAdmin;
	public $login;
	public $senha;
	public $email;
	public $permissao;


	public function setAdminFromDataBase($linha){
        $this->setIdAdmin($linha["id"])
           ->setEmail($linha["email"])
           ->setLogin($linha['login'])
           ->setPermissao($linha['permissao'])
           ->setSenhaFromBD($linha['senha']);
    }

    public function getPermissao(){
        return $this->permissao;
    }


    public function setPermissao($permissao){
        $this->permissao = $permissao;
        return $this;
    }

	public function getIdAdmin(){
        return $this->idAdmin;
    }


    public function setIdAdmin($idAdmin){
        $this->idAdmin = $idAdmin;
        return $this;
    }


   public function getLogin(){
        return $this->login;
    }

    public function setLogin($login){
        $this->login = $login;
        return $this;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setSenha($senha){
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
        return $this;
    }

    public function setSenhaFromBD($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
        return $this;
    }
}