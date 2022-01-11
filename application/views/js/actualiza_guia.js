class_act_guia={
    ready: function(){
        class_act_guia.control();
    },
    control: function(){
        $('#btn_regresar').on('click',function(e){
            e.preventDefault();
            window.location = '/guias';
        });
	$('#archivo').on('change',function(e){
            $('#nombre_archivo_sel').val($('#archivo')[0].files[0].name);
        });
        $('#archivo_sel').on('click',function(){
            $('#archivo').click();        
        });
    }
}

$(class_act_guia.ready);