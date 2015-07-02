<?php

namespace repository;

class TbRespostaDescritiva extends \repository\Banco
{
	
	private $tabela = 'tb_resposta_descritiva';
	
	public function setResposta($cd_usuario,$cd_descricao_resposta,$cd_questao)
	{
		$query = ("INSERT INTO $this->tabela (cd_usuario,cd_descricao_resposta,cd_questao)
                        VALUES(?,?,?)");
		
		try 
		{
			$stmt = $this->conexao->prepare($query);
			
			$stmt->bindParam(1,$cd_usuario,\PDO::PARAM_INT);
			$stmt->bindParam(2,utf8_decode($cd_descricao_resposta),\PDO::PARAM_STR);
			$stmt->bindParam(3,$cd_questao,\PDO::PARAM_INT);
												
				$stmt->execute();
				
			return($stmt);
			
		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}
		
	}
	
	
}