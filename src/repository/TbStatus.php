<?php

namespace repository;

class TbStatus extends \repository\Banco
{

	private $tabela = 'tb_status';

	public function setStatus($cd_status,$cd_pesquisa,$cd_usuario)
	{
		$query = ('INSERT  INTO ' . $this->tabela .' (cd_status,cd_pesquisa,cd_usuario)
					VALUES(?,?,?)');

		try
		{
			$stmt = $this->conexao->prepare($query);

			$stmt->bindParam(1,$cd_status,\PDO::PARAM_INT);
			$stmt->bindParam(2,$cd_pesquisa,\PDO::PARAM_INT);
			$stmt->bindParam(3,$cd_usuario,\PDO::PARAM_INT);

			$stmt->execute();

			return($stmt);

		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}

	}

	public function getStatus($cd_usuario)
	{

		$query = ('SELECT cd_status FROM ' . $this->tabela. ' WHERE
					cd_usuario = ?');

		try
		{
			$stmt = $this->conexao->prepare($query);
			$stmt->bindParam(1,$cd_usuario,\PDO::PARAM_INT);

			$stmt->execute();

			$status = $stmt->fetch();

			return($status[0]);

		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}
	}

	private function getDataResposta($cd_usuario)
	{
		$query = ('SELECT cd_data_resp FROM ' . $this->tabela. ' WHERE
					cd_usuario = ?');

		try
		{
			$stmt = $this->conexao->prepare($query);
			$stmt->bindParam(1,$cd_usuario,\PDO::PARAM_INT);

			$stmt->execute();

			$status = $stmt->fetch();

			return($status[0]);

		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}
	}

	public function mostrarDataResposta($cd_usuario)
	{
		date_default_timezone_set('America/Sao_Paulo');

		$timestamp = $this->getDataResposta($cd_usuario);

		$timestamp = strtotime($timestamp);

		return(date('d-m-Y H:i:s',$timestamp));

	}

	public function getQtdResposta()
	{
		$query = "SELECT count(*) 
					AS 'QTD Resposta' 
					FROM tb_status;";
		
		
		try
		{
			$stmt = $this->conexao->prepare($query);
		
			$stmt->execute();
		
			$status = $stmt->fetch(\PDO::FETCH_NUM);
		
			return($status[0]);
		
		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}	
	}
	
}