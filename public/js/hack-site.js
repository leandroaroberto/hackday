//var tempo = window.setInterval(site, 1000);


function site()
{
    $.ajax({
		type: "GET",
       // url: "eugenio/getDataSite/" + {!! $id_equipamento !!},
        url: "/site/eugenio/getdatasite/"+ {!! $id_equipamento !!} ,
		//data: $('#form').serialize(),
		success: function(result) {	
            //$("#tabela1").html('');								
			$("#equipamentos").html(result);						
		},
		/*beforeSend: function () {
            bloqueioHtml('#row_all');
        },
        complete: function () {
        	$('#row_all').unblock();
        	updates();
        },*/
        error: function(){
            console.log('Erro.');
        }    
    });
}

