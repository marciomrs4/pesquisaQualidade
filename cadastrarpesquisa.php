<?php
session_start();

include_once 'vendor/autoload.php';


if($_POST)
{
	$valida = new service\CadastraResposta();


	try {

		$valida->setPost($_POST);

		//$valida->debug();
		
		$valida->setCadastroPesquisa($_SESSION['cd_usuario'],1);

		header('location: agradecimento.php');

	}catch (\Exception $e)
	{
		$_SESSION['campo'] = $_POST;
		$_SESSION['erro'] = $e->getMessage();
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
}
?>