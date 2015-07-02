<?php
/**
 *
 *@author M�rcio Ramos
 *@version Fevereiro 2011
 *@name Banco
 *@example Classe abstrata para conectar ao banco
 */

namespace repository;

class BancoPostGreeTabelaStatus extends \repository\Banco_postgree
{

	private $tabela = 'cead_usuarios_pesquisa_de_qualidade';

	private $id = 'id';
	private $login  = 'login';
	private $data  = 'data';	


	public function insertStatusPortal($id,$login)
	{
		$query = ("INSERT INTO $this->tabela (id,login,data)
					VALUES(?,?,?)");
		try
		{
			$stmt = $this->conexao->prepare($query);
				
			$stmt->bindParam(1,$id,\PDO::PARAM_INT);
			$stmt->bindParam(2,$login,\PDO::PARAM_STR);
			$stmt->bindParam(3,date("Y-m-d H:i:s",time()),\PDO::PARAM_STR);
						
			$stmt->execute();
			
			return($stmt);
				
		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}

	}

	public function updateStatusPortal($id,$login)
	{
		$query = ("UPDATE cead_usuarios_pesquisa_de_qualidade
					SET login = ?
					WHERE id = ?
					");
		try
		{
			$stmt = $this->conexao->prepare($query);
	
			$stmt->bindParam(1,$login,\PDO::PARAM_STR);
			$stmt->bindParam(2,$id,\PDO::PARAM_INT);

			$stmt->execute();
			
			return($stmt);
				
		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}

	}

	public function listarStatusPortal()
	{
		$query = ("SELECT * FROM $this->tabela");

		//$query = ("INSERT INTO cead_usuarios_pesquisa_de_qualidade (id,login) VALUES(6,'santos.ramos')");

		try
		{
			$stmt = $this->conexao->prepare($query);
				
			$stmt->execute();
				
			return($stmt);
				
		}catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(), $e->getCode());
		}

	}

	#TESTE
	public function listaUsuariosPortal()
	{
		$query = ("SELECT login, senha, email FROM user_usuario WHERE isativo = 't'");
	
	
		try
		{
			$stmt = $this->conexao->prepare($query);
	
			$stmt->execute();
	
			return($stmt);
	
		}catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(), $e->getCode());
		}
	
	}
	
	

}

?>
