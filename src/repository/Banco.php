<?php
/**
 *
 *@author M�rcio Ramos
 *@version Fevereiro 2011
 *@name Banco
 *@example Classe abstrata para conectar ao banco
 */

namespace repository;

abstract class Banco
{

	#Servidor
	/*
	private $user = 'pesquisa';
	private $password = '123456';
	private $tipobanco = 'mysql';
	private $database = 'pesquisaqualidade';
	private $server =  '192.168.31.89';
	*/
	
	private $user = 'root';
	private $password = 'q1w2e3mrs';
	private $tipobanco = 'mysql';
	private $database = 'pesquisaqualidade';
	private $server =  'localhost';
	
	/**
	 *@name PDO
	 *@uses conexao
	 *@example para fazer conexao
	 */
	protected $conexao;

	public function __construct()
	{
		try{
			$this->conexao = new \PDO($this->tipobanco.':host='.$this->server.';
			                         dbname='.$this->database,$this->user,$this->password,
			array(\PDO::ATTR_PERSISTENT => true));

			$this->conexao->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
		}
		catch (\PDOException $e)
		{
			error_log("Mensagem de erro: {$e->getMessage()} - 
					   Codigo de erro: {$e->getCode()} -  
					   Arquivo com erro: {$e->getFile()}",
						3,'/var/log/Log_de_Erro_Pesquisa.txt');
						
			throw new \PDOException($e->getMessage(),$e->getCode());
		}
	}
}
?>