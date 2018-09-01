//var tempo = window.setInterval(eugenio, 10000);

$('#getEugenio').on('click',function(){
    eugenio();
});


eugenio();

function eugenio()
{
    $.ajax({
		type: "GET",
		url: "eugenio/getData",
		//data: $('#form').serialize(),
		success: function(result) {	
            //$("#tabela1").html('');								
			$("#tabela1").html(result);						
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