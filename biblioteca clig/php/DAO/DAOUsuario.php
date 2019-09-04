<?php
//Add a classe responsavel por fazer a conexao com banco de dados
include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/model/modelUsuario.php';
class DAOUsuario {
    
    function getAllUsuarios(){  

        
        $instance = DatabaseConnection::getInstance();
        $conn = $instance->getConnection();

        //Faço o select usando prepared statement
        $statement = $conn->prepare("SELECT * FROM usuario");       
        $statement->execute();

        //linhas recebe todas as tuplas retornadas do banco     
        $linhas = $statement->fetchAll(); 
        
        //Verifico se houve algum retorno, senão retorno null
        if(count($linhas)==0)
                return null;

        
        $usuarios;      
        
        foreach ($linhas as $value) {
            $usuario = new modelUsuario();
            $usuario->setUsuarioFromDataBase($value);           
            $usuarios[]=$usuario;
        }   
        return $usuarios;       
    }

    
    
    function setUsuario($usuario){          
        try {
            //monto a query
            $sql = "INSERT INTO usuario (     
                nome,
                cpf,
                senha,
                exibir) 
                VALUES (
                :nome,
                :cpf,
                :senha,
                :exibir)"
            ;

            //pego uma ref da conexão
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            //Utilizando Prepared Statements
            $statement = $conn->prepare($sql);

            $statement->bindValue(":nome", $usuario->getNome());
            $statement->bindValue(":cpf", $usuario->getCpf());
            $statement->bindValue(":senha", $usuario->getSenha());
            $statement->bindValue(":exibir", $usuario->getExibir());
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }
        
    }

    function deletaUsuario($id_usuario){
        //as vezes não queremos deletar completamente alguns dados do banco
        try{
            $query = "UPDATE usuario SET exibir=0 WHERE id = $id_usuario";

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();

            $statement = $conn->prepare($query);
                    $statement->execute();
        }catch (PDOException $e) {
            echo "Erro ao deletar na base de dados.".$e->getMessage();
        }   
    }

    function editarUsuario($usuario){
        $instance = DatabaseConnection::getInstance();
        $conn = $instance->getConnection();

        try {
            $sql = "UPDATE usuario SET
                id = :idUsuario,
                nome = :nome,
                cpf = :cpf,
                senha = :senha,
                exibir = :exibir 
                WHERE id = :id"
            ;
        
            //pego uma ref da conexão
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            //Utilizando Prepared Statements
            $statement = $conn->prepare($sql);

            $statement->bindValue(":idUsuario", intval($usuario->getIdUsuario()));
            $statement->bindValue(":nome", $usuario->getNome());
            $statement->bindValue(":cpf", $usuario->getCpf());
            $statement->bindValue(':senha', $usuario->getSenha());
            $statement->bindValue(":exibir", $usuario->getExibir());
            $statement->bindValue(":id", intval($usuario->getIdUsuario()));

            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao alterar na base de dados.".$e->getMessage();
        }       
    }
}