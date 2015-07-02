<?php
session_start();

include_once 'vendor/autoload.php';

//if($_SESSION['cd_usuario']){}else{header('Location: index.php');}


try 
{	
	$fazerlogin = new service\FazerLogin();
	$fazerlogin->verificaUsuario($_SESSION['cd_usuario']);
	
}catch (\Exception $e)
{ header('location: respondido.php');	}

$tbpalavra = new repository\TbTpResposta();

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Pesquisa de Satisfação</title>
        <link rel="shortcut icon" href="images/" type="image/x-icon">
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
        
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width">
        
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.min.css"> 
        <link rel="stylesheet" type="text/css" href="css/style.css">       
</head>

<body>

<div id="topo">
<div class="container col-sm-8 col-sm-offset-2">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">CEADIS - 2015</h3>
	</div>
	<div class="panel-body">
	<div class="col-sm-10 col-sm-offset-2">
		<form name="pesquisasatisfacao" id="pesquisadesatisfacao" class="form-horizontal" action="cadastrarpesquisa.php" method="post" role="form">

			<?php 
			if($_SESSION['erro'])
			{						

                echo '<div class="alert alert-danger" role="alert">' , $_SESSION['erro'] , '</div>';

			}
			?>

			
			<div class="form-group">
				<label for="inputEmail3">1 - Qual o seu nivel de satisfação com os serviços prestados pelo CEADIS:</label>			
			</div>						
			
			<div class="form-group">
			<div class="col-sm-4">
			<?php

            $FormQuest1 = new \service\SelectOption();
            $FormQuest1->setStmt($tbpalavra->selecPalavras())
                ->setSelectName('quest1')
                ->setSelectedItem($_SESSION['campo']['quest1'])
                ->setOptionEmpty('')
                ->listOption();
			?>
			</div>
			</div>						
			
			<div class="form-group">
				<label for="inputEmail3">2 - Qual a principal razão pela nota atribuída ao seu nível de satisfação?</label>			
			</div>
			
			<div class="form-group">
			<div class="col-sm-9">
			<textarea class="form-control" rows="5" name="quest2"><?php echo($_SESSION['campo']['quest2']);?></textarea>
			</div>
			</div>
			
			<div class="form-group">
				<label for="inputEmail3">3 - Qual a  principal ação corretiva que faria vocês nos dar a nota muito satisfeito?</label>			
			</div>
			
			<div class="form-group">
			<div class="col-sm-9">
			<textarea class="form-control" rows="5" name="quest3" ><?php echo($_SESSION['campo']['quest3']);?></textarea>
			</div>
			</div>
			
			<div class="form-group">
				<label for="inputEmail3">4 - A disponibilidade para o agendamento das entregas atende a necessidade de abastacimento ?</label>			
			</div>
			
			<div class="form-group">
			<div class="col-sm-4">
			<?php 


            $FormQuest1 = new \service\SelectOption();
            $FormQuest1->setStmt($tbpalavra->selecPalavras())
                ->setSelectName('quest4')
                ->setSelectedItem($_SESSION['campo']['quest4'])
                ->setOptionEmpty('')
                ->listOption();
			?>	
			</div>
			</div>
			
			<div class="form-group">
				<label for="inputEmail3">5 - O horário dos pedidos atende as necessidades da unidade usuária ?</label>			
			</div>
			
			<div class="form-group">
			<div class="col-sm-4">
			<?php 

            $FormQuest1 = new \service\SelectOption();
            $FormQuest1->setStmt($tbpalavra->selecPalavras())
                ->setSelectName('quest5')
                ->setSelectedItem($_SESSION['campo']['quest5'])
                ->setOptionEmpty('')
                ->listOption();
			?>
			
			</div>
			</div>
			
			<div class="form-group">
				<label for="inputEmail3">6 - Os materiais são entregues conforme o pedido e mantêm sua integridade ?</label>			
			</div>
			
			<div class="form-group">
			<div class="col-sm-4">
			<?php

            $FormQuest1 = new \service\SelectOption();
            $FormQuest1->setStmt($tbpalavra->selecPalavras())
                ->setSelectName('quest6')
                ->setSelectedItem($_SESSION['campo']['quest6'])
                ->setOptionEmpty('')
                ->listOption();
			?>
			
			</div>
			</div>
			
			
			<div class="form-group">
				<label for="inputEmail3">7 - Os pedidos ( emergenciais e diários ) são entregues no prazo acordado?</label>			
			</div>
			
			<div class="form-group">
			<div class="col-sm-4">
			<?php

            $FormQuest1 = new \service\SelectOption();
            $FormQuest1->setStmt($tbpalavra->selecPalavras())
                ->setSelectName('quest7')
                ->setSelectedItem($_SESSION['campo']['quest7'])
                ->setOptionEmpty('')
                ->listOption();
			?>
			</div>
			</div>
			
			<div class="form-group">
				<label for="inputEmail3">8 - As posições de estoque são informadas em tempo e foram adequados ?</label>			
			</div>
			
			<div class="form-group">
			<div class="col-sm-4">
			<?php

            $FormQuest1 = new \service\SelectOption();
            $FormQuest1->setStmt($tbpalavra->selecPalavras())
                ->setSelectName('quest8')
                ->setSelectedItem($_SESSION['campo']['quest8'])
                ->setOptionEmpty('')
                ->listOption();
			?>
			</div>
			</div>
			
			<div class="form-group">
				<label for="inputEmail3">9 - Os indicadores mensais atendem sua necessidade de gerenciamento ?</label>			
			</div>
			
			<div class="form-group">
			<div class="col-sm-4">
			<?php

            $FormQuest1 = new \service\SelectOption();
            $FormQuest1->setStmt($tbpalavra->selecPalavras())
                ->setSelectName('quest9')
                ->setSelectedItem($_SESSION['campo']['quest9'])
                ->setOptionEmpty('')
                ->listOption();
            ?>
			</div>
			</div>
			
			<div class="form-group">
				<label for="inputEmail3">10 - Os canais de comunicação com o Ceadis atendem a necessidade da Unidade Usuária ?</label>			
			</div>
			
			<div class="form-group">
			<div class="col-sm-4">
			<?php

            $FormQuest1 = new \service\SelectOption();
            $FormQuest1->setStmt($tbpalavra->selecPalavras())
                ->setSelectName('quest10')
                ->setSelectedItem($_SESSION['campo']['quest10'])
                ->setOptionEmpty('')
                ->listOption();
			?>
			
			</div>
			</div>
			
			<div class="form-group">
				<label for="inputEmail3">11 - A apresentação e conduta dos funcionários são adequados ?</label>			
			</div>
			
			<div class="form-group">
			<div class="col-sm-4">
			<?php

            $FormQuest1 = new \service\SelectOption();
            $FormQuest1->setStmt($tbpalavra->selecPalavras())
                ->setSelectName('quest11')
                ->setSelectedItem($_SESSION['campo']['quest11'])
                ->setOptionEmpty('')
                ->listOption();
			?>
			
			</div>
			</div>
			
		<div class="form-group">
				<div class="col-sm col-sm-1">
					<button type="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-floppy-saved"></span> Finalizar
					</button>
				</div>
		</div>			
			
		</form>
		</div>
		

		
	</div>
</div>


			
</div>
</div>

<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/validador.js"></script>

</body>
</html>

<?php 
unset($_SESSION['erro'],$_SESSION['campo']); 

?>