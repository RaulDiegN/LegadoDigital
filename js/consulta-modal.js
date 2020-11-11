$(function () {
	$('.ver').on('click',function(e) {
		e.preventDefault();
		var idd = $(this).attr('id');
		//console.log($(this).attr('id'));
		
		$.ajax({
            method: 'POST',
            url:'include/ajax/consulta-abogado.php',
            data: {idd:idd},
            success : function(response) {
            	var rsp = JSON.parse(response);

            	if (rsp.response != 'ok') {
            		return;
            	}
            	var consulta = rsp.consulta;
            	$('#descripcion').text(consulta.description);
            	$('#text-consulta').text(consulta.text_consulta);
            	$('#email').text(consulta.user_email);
                $('.modal').fadeIn();
            },
            error: function(){
                alert("error de conexion");
            }
        });

	});

	$('.close').on('click',function(e) {
		e.preventDefault();
		$('.modal').fadeOut();

	});

	window.onclick = function(event) {
		var $modal = $('.modal');
	    if (event.target.matches('.modal')) {
	        $modal.fadeOut();
	    }
	}
});
