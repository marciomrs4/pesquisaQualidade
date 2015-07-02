<?php

namespace repository;

class TbUsuario extends \repository\Banco
{

	private $tabela = 'tb_usuario';

	public function selecUsuario($usuario,$senha)
	{
		$query = ('SELECT cd_usuario, ds_login FROM tb_usuario
					WHERE ds_login  = ? AND ds_senha = ?');

		try
		{
			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$usuario,\PDO::PARAM_STR);
			$stmt->bindParam(2,$senha,\PDO::PARAM_STR);

			$stmt->execute();

			return($stmt->fetch());

		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}

	}

	public function getUsuario($usuario,$senha)
	{
		$query = ('SELECT cd_usuario, ds_login FROM tb_usuario
					WHERE ds_login  = ? AND ds_senha = ?');
		try
		{

			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$usuario,\PDO::PARAM_STR);
			$stmt->bindParam(2,$senha,\PDO::PARAM_STR);

			$stmt->execute();

			return($stmt->rowCount());

		}catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}

	}

	public function updateSenha($cd_usuario,$ds_senha)
	{
		$query = ('UPDATE '. $this->tabela .' SET ds_senha = ? WHERE cd_usuario = ?');

		try
		{
			$stmt = $this->conexao->prepare($query);
				
			$stmt->bindParam(2,$cd_usuario,\PDO::PARAM_INT);
			$stmt->bindParam(1,$ds_senha,\PDO::PARAM_STR);

			$stmt->execute();
				
			return($stmt);
				
		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}
	}

	public function getNomeUsuario($cd_usuario)
	{
		$query = ('SELECT ds_login FROM '. $this->tabela .' WHERE cd_usuario = ?');

		try
		{
			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$cd_usuario,\PDO::PARAM_INT);
			$stmt->execute();

			$nome = $stmt->fetch();
			
			return($nome[0]);
				
		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}
	}
	
	private function executeTruncate()
	{
		$query = ('TRUNCATE tb_usuario');
	
		try
		{
			$stmt = $this->conexao->prepare($query);
	
			$stmt->execute();
	
			return($stmt);
	
		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}
	}
	
	#Insere usuario no banco da pesquisa
	public function insertUsuario($dados)
	{
		$query = ('INSERT INTO tb_usuario (ds_login, ds_senha, ds_email)
					VALUES(?, ?, ?) ');
	
		try
		{
			
			$stmt = $this->conexao->prepare($query);
	
			//login, senha, email			
			
			$stmt->bindParam(1,$dados['login'],\PDO::PARAM_INT);
			$stmt->bindParam(2,$dados['senha'],\PDO::PARAM_INT);
			$stmt->bindParam(3,$dados['email'],\PDO::PARAM_INT);
			

			
			$stmt->execute();
	
			return($stmt);
	
		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}
	}
	
	
}