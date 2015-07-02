<?php
session_start();

include_once 'vendor/autoload.php';

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
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">CEADIS - 2015</h3>
            </div>
            <div class="panel-body">
                <div class="alert alert-info" role="alert">

                    Você já respondeu esse questionário em:
                    <?php
                        $tbstatus = new repository\TbStatus();
                    echo($tbstatus->mostrarDataResposta($_SESSION['cd_usuario']));?>
                </div>
            </div>
            </div>
        </div>



    </div>
</div>

</body>
</html>
<?php
session_start();
session_unset();
session_destroy();
?>