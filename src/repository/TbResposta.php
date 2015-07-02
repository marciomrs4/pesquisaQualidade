<?php

namespace repository;

class TbResposta extends \repository\Banco
{
	
	private $tabela = 'tb_resposta';
	
	public function setResposta($cd_usuario,$cd_pesquisa,$cd_tp_resposta,$cd_questao)
	{
		$query = ('INSERT INTO tb_resposta (cd_usuario,cd_pesquisa,cd_tp_resposta,cd_questao)
                        VALUES(?,?,?,?)');
		
		try 
		{
			$stmt = $this->conexao->prepare($query);
			
			$stmt->bindParam(1,$cd_usuario,\PDO::PARAM_INT);
			$stmt->bindParam(2,$cd_pesquisa,\PDO::PARAM_INT);
			$stmt->bindParam(3,$cd_tp_resposta,\PDO::PARAM_INT);
			$stmt->bindParam(4,$cd_questao,\PDO::PARAM_INT);
												
				$stmt->execute();
				
			return($stmt);
			
		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}
		
	}
	
	
}