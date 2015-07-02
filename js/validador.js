

var $valida = jQuery.noConflict();


function submitForm(form){			

	$valida(".btn btn-default").hide();

	form.submit();
	
}


$valida(document).ready( function() 
{

	$valida("#pesquisadesatisfacao").validate({

		rules:{
			quest1:{
				required: true /* Campo obrigat?rio */
			},
			quest2:{
				required: true
			},
            quest3:{
                required: true /* Campo obrigat?rio */
            },
            quest4:{
                required: true
            },
            quest5:{
                required: true /* Campo obrigat?rio */
            },
            quest6:{
                required: true
            },
            quest7:{
                required: true /* Campo obrigat?rio */
            },
            quest8:{
                required: true
            },
            quest9:{
                required: true /* Campo obrigat?rio */
            },
            quest10:{
                required: true
            },
            quest11:{
                required: true /* Campo obrigat?rio */
            }
		},
		messages:{
			quest1:{
				required: "Preencha este campo"

			},
			quest2:{
				required: "Preencha este campo"
			},
            quest3:{
                required: "Preencha este campo"

            },
            quest4:{
                required: "Preencha este campo"
            },
            quest5:{
                required: "Preencha este campo"

            },
            quest6:{
                required: "Preencha este campo"
            },
            quest7:{
                required: "Preencha este campo"

            },
            quest8:{
                required: "Preencha este campo"
            },
            quest9:{
                required: "Preencha este campo"

            },
            quest10:{
                required: "Preencha este campo"
            },
            quest11:{
                required: "Preencha este campo"

            }
		},
		
		submitHandler: function(form){

			submitForm(form);

		}
	});

});