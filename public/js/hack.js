var tempo = window.setInterval(eugenio, 1000);

$('#getEugenio').on('click',function(){
    eugenio();
});

function eugenio()
{
    $.ajax({
		type: "GET",
		url: "eugenio/getData",
		//data: $('#form').serialize(),
		success: function(result) {			
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