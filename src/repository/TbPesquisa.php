<?php
namespace repository;

class TbPesquisa extends \repository\Banco
{
	
	private $tabela = 'tb_pesquisa';
	
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
	
	
	public function getSomatariaQuestao($quest1)
	{

		//$query = ("SELECT SUM($quest1) FROM tb_resposta_completa");
		
		$query = ("SELECT SUM((SELECT ds_peso
		FROM tb_tp_resposta
		WHERE cd_tp_resposta = $quest1))
		FROM tb_resposta_completa;");
		
		try
		{
			$stmt = $this->conexao->prepare($query);
				
			$stmt->execute();
			
			$dados = $stmt->fetch();
			
			return($dados[0]);
				
		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}
		
	}
	
	public function getSomatariaUsuarioRespondentes()
	{
	
		$query = ("SELECT COUNT(cd_usuario) FROM tb_status;");
	
		try
		{
			$stmt = $this->conexao->prepare($query);
	
			$stmt->execute();
				
			$dados = $stmt->fetch();
				
			return($dados[0]);
	
		} catch (\PDOException $e)
		{
			throw new \PDOException($e->getMessage(),$e->getCode());
		}
	
	}
	

	public function getRelatorioPesquisaSatisfacao()
	{
	
		$query = ("SELECT (SELECT ds_login FROM tb_usuario WHERE cd_usuario = codigo_usuario) Usuario,
							data_resposta as DataResposta,
							(SELECT ds_resposta FROM tb_tp_resposta WHERE cd_tp_resposta = quest1) AS 'Qual o seu nível de satisfação com serviços prestados pelo CEADIS?', 
							(SELECT ds_peso FROM tb_tp_resposta WHERE cd_tp_resposta = quest1) Peso,  
							(SELECT ds_resposta FROM tb_tp_resposta WHERE cd_tp_resposta = quest4) ' A disponibilidade para o agendamento das entregas atende a necessidade de abastecimento?', 
							(SELECT ds_peso FROM tb_tp_resposta WHERE cd_tp_resposta = quest4) Peso,  
							(SELECT ds_resposta FROM tb_tp_resposta WHERE cd_tp_resposta = quest5) 'O horário dos pedidos atende as necessidades da Unidade Usuária?', 
							(SELECT ds_peso FROM tb_tp_resposta WHERE cd_tp_resposta = quest5) Peso,  
							(SELECT ds_resposta FROM tb_tp_resposta WHERE cd_tp_resposta = quest6) 'Os materiais são entregues conforme o pedido e mantém sua integridade?', 
							(SELECT ds_peso FROM tb_tp_resposta WHERE cd_tp_resposta = quest6) Peso,  
							(SELECT ds_resposta FROM tb_tp_resposta WHERE cd_tp_resposta = quest7) 'Os pedidos ( emergenciais e diários ) são entregues no prazo acordado?', 
							(SELECT ds_peso FROM tb_tp_resposta WHERE cd_tp_resposta = quest7) Peso,  
							(SELECT ds_resposta FROM tb_tp_resposta WHERE cd_tp_resposta = quest8) 'As posições de estoque são informadas em tempo e foram adequados?', 
							(SELECT ds_peso FROM tb_tp_resposta WHERE cd_tp_resposta = quest8) Peso,  
							(SELECT ds_resposta FROM tb_tp_resposta WHERE cd_tp_resposta = quest9) 'Os indicadores mensais atendem sua necessidade de gerenciamento?', 
							(SELECT ds_peso FROM tb_tp_resposta WHERE cd_tp_resposta = quest9) Peso,  
							(SELECT ds_resposta FROM tb_tp_resposta WHERE cd_tp_resposta = quest10) 'Os canais de comunicação com o Ceadis atendem a necessidade da Unidade Usuária?', 
							(SELECT ds_peso FROM tb_tp_resposta WHERE cd_tp_resposta = quest10) Peso,
							(SELECT ds_resposta FROM tb_tp_resposta WHERE cd_tp_resposta = quest11) 'A apresentação e conduta dos funcionários são adequados?', 
							(SELECT ds_peso FROM tb_tp_resposta WHERE cd_tp_resposta = quest11) Peso,    
						quest2, quest3, '', '', '', '', '', '', ''
					FROM tb_resposta_completa
					ORDER BY 1;");
	
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
	

	public function getSomatariaQuestoes()
	{
	
		$query = ("SELECT 
					SUM((SELECT ds_peso 
							 FROM tb_tp_resposta 
							 WHERE cd_tp_resposta = quest1)) quest1,
					SUM((SELECT ds_peso 
							 FROM tb_tp_resposta 
							 WHERE cd_tp_resposta = quest4)) quest4,
					SUM((SELECT ds_peso 
							 FROM tb_tp_resposta 
							 WHERE cd_tp_resposta = quest5)) quest5,
					SUM((SELECT ds_peso 
							 FROM tb_tp_resposta 
							 WHERE cd_tp_resposta = quest6)) quest6,
					SUM((SELECT ds_peso 
							 FROM tb_tp_resposta 
							 WHERE cd_tp_resposta = quest7)) quest7,
					SUM((SELECT ds_peso 
							 FROM tb_tp_resposta 
							 WHERE cd_tp_resposta = quest8)) quest8,
					SUM((SELECT ds_peso 
							 FROM tb_tp_resposta 
							 WHERE cd_tp_resposta = quest9)) quest9,
					SUM((SELECT ds_peso 
							 FROM tb_tp_resposta 
							 WHERE cd_tp_resposta = quest10)) quest10,
					SUM((SELECT ds_peso 
							 FROM tb_tp_resposta 
							 WHERE cd_tp_resposta = quest11)) quest11 
				
				FROM tb_resposta_completa;");
	
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
	
	
	
}