<?php
session_start();

include_once 'vendor/autoload.php';



try
{
	
	$login = new service\FazerLogin();

	$login->getUrl($_GET);

	//header('location: pesquisa.php');
	
	header('location: PesquisaQualidade.php');
		
	}catch (\Exception $e)
	{
		$_SESSION['erro'] = $e->getMessage();
		
		echo $_SESSION['erro'];
		
		//header('location: '.$_SERVER['HTTP_REFERER']);
	}




unset($_SESSION['erro']); 
?>