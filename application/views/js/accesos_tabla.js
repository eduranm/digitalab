class_acc_ri_tabla = {
    server:'http://digitalab-ssie.unam.mx/',
    //0-base,1-archivo
    resource_valores: 0,
    json_vb_ITMS_accesos_servicio: ['restserver/table/vb_ITMS_accesos_servicio','/json/vb_ITMS_accesos_servicio.json'],
    tr_tabla:   '<tr>' +
                    '<td><anio></td>' +
                    '<td><servicio></td>' +
                    '<td><accesos></td>' +
                    '<td><porcentaje>%</td>' +
                '</tr>',
    html_body:'',
    ready: function(){        
        $.when(class_utils.getResource( ((class_acc_ri_tabla.resource_valores === 0)?class_acc_ri_tabla.server:'') + class_acc_ri_tabla.json_vb_ITMS_accesos_servicio[class_acc_ri_tabla.resource_valores] ))
        .then(function(v){
            $.each(v,function(i,val){
                console.log(val);
                class_acc_ri_tabla.html_body += class_acc_ri_tabla.tr_tabla.replace('<anio>',val.anio)
                                                                           .replace('<servicio>',val.nombre_servicio)
                                                                           .replace('<accesos>',val.accesos)
                                                                           .replace('<porcentaje>',val.porcentaje);
            });
            $('#body_tabla').html(class_acc_ri_tabla.html_body);
            class_utils.setTabla('example');
            $('.buttons-csv span').html('Descargar .csv');
        });
        
        $('.nav-item').removeClass('active');        
        $('#li_accesos').addClass('active');
        $('#accesos_totales').addClass('show');
        $('#accesos_servicio_tabla a').addClass('active');        
    },
}

$(class_acc_ri_tabla.ready);




