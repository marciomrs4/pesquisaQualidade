
var $alert = jQuery.noConflict();

$alert(document).ready(function(){
    //Encolhe os paineis do sistema de forma padrao
    $alert(".panel-heading").click(
        function(){
            $alert(this).next().toggle('slow');
        });

    var count = 1;

/*
    function timer() {


        //$load("#tempo").html(count);

        if (count > 1)
            count--;
        else

            setTimeout("timer();", 6000);

        var codigo_secundario = $valor("select[name='status_secundario']").val();

        $load.post('action/statuspedidopainelcliente.php',
            {stp_codigo: codigo_secundario},
            function (data) {
                $load("#secundario").html(data);
            }, 'html');

        var codigo_terceario = $valor("select[name='status_terceario']").val();

        $load.post('action/statuspedidopainelcliente.php',
            {stp_codigo: codigo_terceario},
            function (data) {
                $load("#terceario").html(data);
            }, 'html');

    }
*/


});