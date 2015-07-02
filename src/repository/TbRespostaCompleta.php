<?php

namespace repository;

class TbRespostaCompleta extends \repository\Banco
{
	
	private $tabela = 'tb_resposta_completa';
	
	private $quest1 = 'quest1';
	private $quest2 = 'quest2';
	private $quest3 = 'quest3';
	private $quest4 = 'quest4';
	private $quest5 = 'quest5';
	private $quest6 = 'quest6';
	private $quest7 = 'quest7';
	private $quest8 = 'quest8';
	private $quest9 = 'quest9';
	private $quest10 = 'quest10';
	private $quest11 = 'quest11';
	private $codigo_usuario = 'codigo_usuario';
	
	public function setRespostaCompleta($dados)
	{
		$query = ("INSERT INTO $this->tabela 
					($this->quest1, $this->quest2, $this->quest3, $this->quest4, 
					$this->quest5, $this->quest6, $this->quest7, $this->quest8, 
					$this->quest9, $this->quest10, $this->quest11, $this->codigo_usuario)
                    VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
		
		try 
		{
			$stmt = $this->conexao->prepare($query);
			
			$stmt->bindParam(1,$dados[$this->quest1],\PDO::PARAM_INT);
			$stmt->bindParam(2,utf8_decode($dados[$this->quest2]),\PDO::PARAM_STR);
			$stmt->bindParam(3,utf8_decode($dados[$this->quest3]),\PDO::PARAM_STR);
			$stmt->bindParam(4,$dados[$this->quest4],\PDO::PARAM_INT);
			$stmt->bindParam(5,$dados[$this->quest5],\PDO::PARAM_INT);
			$stmt->bindParam(6,$dados[$this->quest6],\PDO::PARAM_INT);
			$stmt->bindParam(7,$dados[$this->quest7],\PDO::PARAM_INT);
			$stmt->bindParam(8,$dados[$this->quest8],\PDO::PARAM_INT);
			$stmt->bindParam(9,$dados[$this->quest9],\PDO::PARAM_INT);
			$stmt->bindParam(10,$dados[$this->quest10],\PDO::PARAM_INT);
			$stmt->bindParam(11,$dados[$this->quest11],\PDO::PARAM_INT);
			$stmt->bindParam(12,$dados[$this->codigo_usuario],\PDO::PARAM_INT);
																		
			$stmt->execute();
				
			return($stmt);
			
		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}
		
	}
	
}