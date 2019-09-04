<?php

include_once $_SESSION["root"].'php/DAO/DatabaseConnection.php';

include_once $_SESSION["root"].'php/model/modelAdmin.php';

class DAOAdmin{

	function GetAllAdmins(){
		$instance = DatabaseConnection::getInstance();
		$conn = $instance->getConnection();

		$statement = $conn->prepare("SELECT * FROM admin");		
		$statement->execute();
		$linhas = $statement->fetchAll(); 
			
		if(count($linhas)==0)
				return null;

		$admins;		
		
		foreach ($linhas as $value) {
			$admin = new ModelAdmin();
			$admin->setAdminFromDataBase($value);			
			$admins[]=$admin;
		}	
		return $admins;	
	}

	function setAdmin($func){			
        $instance = DatabaseConnection::getInstance();
        $conn = $instance->getConnection();

        $verificarLogin = new LoginDAO();
        if($verificarLogin->verificaCadastro($admin->getLogin()) == true){            
            try {
                //monto a query
                $sql = "INSERT INTO admin (       
                    id,
                    email,
                    login,
                    senha,
                    permissao) 
                    VALUES (
                    :idAdmin,
                    :email,
                    :login,
                    :senha,
                	:permissao)"
                ;

                $statement = $conn->prepare($sql);

                $statement->bindValue(":id", $admin->getIdAdmin());
                $statement->bindValue(":email", $admin->getNome());
                $statement->bindValue(":login", $admin->getLogin());
                $statement->bindValue(":senha", $admin->getSenha());
                $statement->bindValue(":permissao", $admin->getPermissao());

                return $statement->execute();

            } catch (PDOException $e) {
                echo "Erro ao inserir na base de dados.".$e->getMessage();
            }       
        }
		
	}

    function deletaAdmin($id_admin){
        try{
            $query = "DELETE FROM admin WHERE id = $id_admin";

            $instance = DatabaseConnection::getInstance();
            $conn = $instance->getConnection();

            $statement = $conn->prepare($query);
                    $statement->execute();
        }catch (PDOException $e) {
            echo "Erro ao deletar na base de dados.".$e->getMessage();
        }   
    }
}	