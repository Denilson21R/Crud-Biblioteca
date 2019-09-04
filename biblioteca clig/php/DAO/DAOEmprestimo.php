<?php

include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';

include_once $_SESSION["root"].'php/model/modelEmprestimo.php';

class DAOEmprestimo{

	function GetAllEmprestimos(){
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		$statement = $conn->prepare("SELECT * FROM emprestimo");		
		$statement->execute();
		$linhas = $statement->fetchAll(); 
			
		if(count($linhas)==0)
				return null;

		$emprestimos;		
		
		foreach ($linhas as $value) {
			$emprestimo = new modelEmprestimo();
			$emprestimo->setEmprestimoFromDataBase($value);			
			$emprestimos[]=$emprestimo;
		}	
		return $emprestimos;	
	}

	function setEmprestimo($emprestimo){         
        try {
            //monto a query
            $sql = "INSERT INTO emprestimo (     
                id,
                id_livro,
                id_usuario,
                data_vencimento)
                VALUES (
                :id,
                :id_livro,
                :id_usuario,
                :data)"
            ;

            //pego uma ref da conexão
            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();
            //Utilizando Prepared Statements
            $statement = $conn->prepare($sql);

            $statement->bindValue(":id", $emprestimo->getIdEmprestimo());
            $statement->bindValue(":id_livro", $emprestimo->getIdLivro());
            $statement->bindValue(":id_usuario", $emprestimo->getIdUsuario());
            $statement->bindValue(":data", $emprestimo->getData());
            
            return $statement->execute();

        } catch (PDOException $e) {
            echo "Erro ao inserir na base de dados.".$e->getMessage();
        }
        
    }

    function deletaEmprestimo($id_emprestimo){
        try{
            $query = "DELETE FROM emprestimo WHERE id = $id_emprestimo";

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();

            $statement = $conn->prepare($query);
                    $statement->execute();
        }catch (PDOException $e) {
            echo "Erro ao deletar na base de dados.".$e->getMessage();
        }   
    }
}	