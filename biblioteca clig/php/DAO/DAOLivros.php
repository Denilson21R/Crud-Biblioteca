<?php

include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';
include_once $_SESSION["root"].'php/model/modelLivro.php';
class DAOLivros {
    function getAllLivros(){  
        $instance = DatabaseConnection::getInstance();
        $conn = $instance->getConnection();
        $statement = $conn->prepare("SELECT * FROM livro");       
        $statement->execute();

        $linhas = $statement->fetchAll(); 
        
        if(count($linhas)==0)
                return null;

        $livros;      
        
        foreach ($linhas as $value) {
            $livro = new modelLivro();
            $livro->setLivroFromDataBase($value);           
            $livros[]=$livro;
        }   
        return $livros;       
    }

    
    function setLivro($livro){          
        try {
            //monto a query
            $sql = "INSERT INTO livro (     
                titulo,
                autor,
                categoria,
                id,
                exibir) 
                VALUES (
                :titulo,
                :autor,
                :categoria,
                :id,
                :exibir)"
            ;

            //pego uma ref da conexão
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            //Utilizando Prepared Statements
            $statement = $conn->prepare($sql);

            $statement->bindValue(":titulo", $livro->getTitulo());
            $statement->bindValue(":autor", $livro->getAutor());
            $statement->bindValue(":categoria", $livro->getCategoria());
            $statement->bindValue(":id", $livro->getIdLivro());
            $statement->bindValue(":exibir", $livro->getExibir());
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }
        
    }

    function deletaLivro($id_livro){
        //as vezes não queremos deletar completamente alguns dados do banco
        try{
            $query = "UPDATE livro SET exibir=0 WHERE id = $id_livro";

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();

            $statement = $conn->prepare($query);
                    $statement->execute();
        }catch (PDOException $e) {
            echo "Erro ao deletar na base de dados.".$e->getMessage();
        }   
    }

    function editarLivro($livro){
        $instance = DatabaseConnection::getInstance();
        $conn = $instance->getConnection();

        try {
            $sql = "UPDATE livro SET
                id = :idLivro,
                titulo = :titulo,
                categoria = :categoria,
                autor = :autor,
                exibir = :exibir 
                WHERE id = :id"
            ;
        
            //pego uma ref da conexão
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            //Utilizando Prepared Statements
            $statement = $conn->prepare($sql);

            $statement->bindValue(":idLivro", intval($livro->getIdLivro()));
            $statement->bindValue(":titulo", $livro->getTitulo());
            $statement->bindValue(":categoria", $livro->getCategoria());
            $statement->bindValue(':autor', $livro->getAutor());
            $statement->bindValue(":exibir", intval($livro->getExibir()));
            $statement->bindValue(":id", intval($livro->getIdLivro()));

            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao alterar na base de dados.".$e->getMessage();
        }       
    }
}