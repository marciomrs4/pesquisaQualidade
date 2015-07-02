<?php

namespace service;

class CadastraResposta extends \repository\TbResposta
{

	private $post;

	public function validaCampo($campo)
	{
		if($campo == '')
		{
			throw new \Exception('** Todos os Campos são Obrigatórios **',300);
			
		}
	}


	public function setPost($post)
	{

        foreach ($post as $campo => $valor):

            $this->post[$campo] = $valor;

        endforeach;

	}

	public function setCadastroPesquisa($cd_usuario,$cd_pesquisa)
	{
		$tbstatu = new \repository\TbStatus();
		
		$tbrespdescritiva = new \repository\TbRespostaDescritiva();
		
		$tbrespcompleta = new \repository\TbRespostaCompleta();
		
		try
		{
			foreach ($this->post as $campo):
				
			$this->validaCampo($campo);
				
			endforeach;

			try
			{
				$this->conexao->beginTransaction();
				
				$this->post['codigo_usuario'] = $cd_usuario;
				$tbrespcompleta->setRespostaCompleta($this->post);
				
				$this->setResposta($cd_usuario, $cd_pesquisa, $this->post['quest1'],1);
				$this->setResposta($cd_usuario, $cd_pesquisa, $this->post['quest4'],4);
				$this->setResposta($cd_usuario, $cd_pesquisa, $this->post['quest5'],5);
				$this->setResposta($cd_usuario, $cd_pesquisa, $this->post['quest6'],6);
				$this->setResposta($cd_usuario, $cd_pesquisa, $this->post['quest7'],7);
				$this->setResposta($cd_usuario, $cd_pesquisa, $this->post['quest8'],8);
				$this->setResposta($cd_usuario, $cd_pesquisa, $this->post['quest9'],9);
				$this->setResposta($cd_usuario, $cd_pesquisa, $this->post['quest10'],10);
				$this->setResposta($cd_usuario, $cd_pesquisa, $this->post['quest11'],11);

				$tbrespdescritiva->setResposta($cd_usuario,$this->post['quest2'],2);
				$tbrespdescritiva->setResposta($cd_usuario,$this->post['quest3'],3);
								
				$tbstatu->setStatus(1, $cd_pesquisa, $cd_usuario);
				
				#Pega o nome do usuario
				$tbUsuario = new \repository\TbUsuario();
				$login = $tbUsuario->getNomeUsuario($cd_usuario);

/*				#Grava o nome na tabela de status do portal
				$BancoPostGree = new \repository\BancoPostGreeTabelaStatus();
				$BancoPostGree->insertStatusPortal($cd_usuario, $login);*/
				
				$this->conexao->commit();
				
			}catch (\PDOException $e)
			{
				$this->conexao->rollBack();
				
				throw new \PDOException($e->getMessage(),$e->getCode());
			}
		}catch (\Exception $e)
		{
			throw new \Exception($e->getMessage(),$e->getCode());
		}
	}

	public function debug()
	{
		foreach ($this->post as $campo => $valor):

		echo "Campo: $campo - Valor $valor <br />";

		endforeach;
	}
}