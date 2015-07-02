<?php

namespace repository;

class TbTpResposta extends \repository\Banco
{
	
	private $tabela = 'tb_tp_resposta';
	
	public function selecPalavras()
	{
		$query = ('SELECT * FROM ' . $this->tabela);
		
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
	
	public function selectedCampo($campo,$valorcampo)
	{
		if($campo == $valorcampo)
		{
			return('selected="selected"');
		}
		
	}
}