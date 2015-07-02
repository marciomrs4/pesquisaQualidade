<?php

namespace service;

class FazerLogin extends \repository\TbUsuario
{
	private $post;

	public function validaCampo($campo)
	{
		
		if($campo == '')
		{
			throw new \Exception('Todos os Campos sao Obrigatorios',300);
		}
	}

	final public function hashSenha($senha)
	{
		#retirado o Hash da senha
		//return(sha1($senha));
		
		return $senha;
	}

	public function setPost($post)
	{
		$this->post = $post;
	}

	public function fazLogin()
	{
		try
		{
			$this->validaCampo($this->post['usuario']);
			$this->validaCampo($this->post['senha']);
				
			try {
				$erro = $this->getUsuario($this->post['usuario'],$this->hashSenha($this->post['senha']));

				if($erro == 1)
				{
					$dados = $this->selecUsuario($this->post['usuario'],$this->hashSenha($this->post['senha']));
					$this->criaSessao($dados);
				}else
				{
					throw new \Exception('Usu&aacute;rio n&atilde;o encontrado - Por favor entre em contato com a Qualidade: qualidade@ceadis.org.br ou 11-3646-5626',300);
				}

			}catch (\PDOException $e)
			{
				throw new \PDOException($e->getMessage(),$e->getCode());
			}
		}catch (\Exception $e)
		{
			throw new \Exception($e->getMessage(),$e->getCode());
		}
	}

	public static function destroiSessao()
	{
		session_start();
		session_unset();
		session_destroy();

		header('location: index.php');
	}

	private function criaSessao($dados)
	{
		session_start();

		$_SESSION['cd_usuario'] = $dados[0];
		$_SESSION['ds_login'] = $dados[1];
	}

	public static function validaSessao()
	{
		if($_SESSION['cd_usuario'])
		{ }
		else
		{
			header('location: index.php');
		}
	}

	private function tamanhoSenha($senha)
	{
		if(strlen($senha) < 6)
		{
			throw new \Exception('Tamanho de senha inferior a 6 caracteres',300);
		}

	}

	private function comparaCampo($campo1,$campo2)
	{
		if($campo1 == $campo2)
		{

		}else
		{
			throw new \Exception('As senhas n�o s�o iguais',300);
		}

	}

	public function alteraSenha($cd_usuario)
	{

		try
		{
			$this->validaCampo($this->post['senha']);
			$this->validaCampo($this->post['senha2']);

			try
			{
				$this->comparaCampo($this->post['senha'],$this->post['senha2']);
				$this->tamanhoSenha($this->post['senha']);
				$this->tamanhoSenha($this->post['senha2']);

				try
				{
					$this->updateSenha($cd_usuario,$this->hashSenha($this->post['senha']));

				} catch (\PDOException $e)
				{
					throw new \PDOException($e->getMessage(),$e->getCode());
				}
			} catch (\Exception $e)
			{
				throw new \Exception($e->getMessage(),$e->getCode());
			}

		} catch (\Exception $e)
		{
			throw new \Exception($e->getMessage(),$e->getCode());
		}

	}

	public function verificaUsuario($cd_usuario)
	{
		$tbstatus = new \repository\TbStatus();

		$status = $tbstatus->getStatus($cd_usuario);

		if($status == 1)
		{
			throw new \Exception('Voc� j� respondeu esse question�rio',400);
		}

	}

	public function getUrl($get)
	{
		$this->post['usuario'] = $get['user'];
		$this->post['senha'] = $get['senha'];
				
		$this->fazLogin();
		
	}	
	
}