<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>PAINEL DE RESPOSTAS</title>
<link rel="stylesheet" href="./css/bootstrap.css">
<link rel="stylesheet" href="./css/style.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel='shortcut icon' href='./img/ceadisico.ico'>
</head>
<body onload="startTime()">
    
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="navbar-header">
	
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#menu-principal">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
            
	</div>	
	  
	<div class="container-fluid collapse navbar-collapse" id="menu-principal">
            <h4 class="navbar-text"><span class="estilo">CEADIS</span> - Centro Estadual de Armazenamento e Distribuição de insumos de Saúde</h4>
            <h5 class="navbar-right navbar-text"><span class="estilohora"> <?php echo (date('d-m-Y')); ?> | <span id="timer"></span></span></h5><span class="navbar-right navbar-text"></span>		            
	</div>	
</nav>
<nav class="navbar"></nav>
