class_guias = {
    server:'http://digitalab-ssie.unam.mx/',
    //0-base,1-archivo
    resource_valores: 0,
    json_tc_guia_recursos: ['restserver/table/tc_guia_recursos','/json/tc_guia_recursos.json'],
    tr_tabla:   '<tr>' +
                    '<td><recurso></td>' +
//                    '<td><div class="tabla-descripcion"><descripcion></div></td>' +
                    ((typeof(usuario) !== "undefined")?'<td style="width:10px"><a class="edita" href="javascript:void(0)" id="<id_recurso>"><i class="icon-note"></i></a></td>':'') +
                    '<td style="width:50%"><descripcion></td>' +                    
                    '<td><a href="<enlace_guia>" target="_blank"><nombre_guia></a></td>' +
                    '<td><a href="<enlace_recurso>" target="_blank"><enlace_recurso></a></td>' +
                '</tr>',
    div_tabla:  '<table id="tabla_guias" class="display responsive nowrap" style="width:100%">' +
                    '<thead>' +
                        '<tr>' +
                            '<th class="all">Recurso</th>' +
                            ((typeof(usuario) !== "undefined")?'<th class="all"></th>':'') +
                            '<th class="none">Descripción</th>' +
                            '<th class="none">Guía</th>' +
                            '<th class="none">Enlace</th>' +
                        '</tr>' +
                    '</thead>' +
                    '<tbody id="body_tabla">' +
                    '</tbody>' +
                '</table>',
    html_body:'',
    data: [],
    ready: function(){       
        $.when(class_utils.getResource( ((class_guias.resource_valores === 0)?class_guias.server:'') + class_guias.json_tc_guia_recursos[class_guias.resource_valores] ))
        .then(function(v){
            class_guias.data = v;
            class_guias.control();
        });
        
        $('.nav-item').removeClass('active');        
        $('#li_accesos').addClass('active');
        $('#accesos_totales').addClass('show');
        $('#accesos_servicio_tabla a').addClass('active');        
    },
    control: function(){
        clic = false;
        $('.area').on('click',function(e){
            if(!clic){
                clic = true;
                class_guias.muestra_guias(this.id.split('-')[1]);
                setTimeout(function(){ clic = false; }, 3000);
            }
        });
        $('.edita').off('click').on('click',function(e){
            $.ajax({
                type: 'POST',
                url: '/guias/preedicion',
                data: class_utils.find_prop(class_guias.filtrado,'id_recurso',this.id),
                }).done(function() {
                    window.location='/guias/edicion';
                });            
        });
    },
    muestra_guias: function(area){
        $('#card_guias').show();
        $('#div_tabla').html(class_guias.div_tabla);
        $('#div_area').html("Guías para el área " + area);
        class_guias.html_body = '';
        class_guias.filtrado = class_utils.filter_prop(class_guias.data,'id_area',area);
		(typeof(usuario) == "undefined")?class_guias.filtrado = class_utils.filter_prop_diff(class_guias.filtrado,'descripcion',null):"";
        $.each(class_guias.filtrado,function(i,val){
                class_guias.html_body += class_guias.tr_tabla.replace('<recurso>',val.nombre_recurso)
                                                                           .replace('<descripcion>',(val.descripcion == null)?'':val.descripcion)
                                                                           .replace('<enlace_guia>',(val.enlace_guia == null)?'':'docs/guias/'+val.enlace_guia.replaceAll(/ /gi,'_'))
                                                                           .replace('<nombre_guia>',(val.nombre_guia == null)?'':val.nombre_guia)
                                                                           .replace('<id_recurso>',val.id_recurso)
                                                                           .replaceAll(/<enlace_recurso>/gi,(val.enlace_recurso == null)?'':val.enlace_recurso);
            });
            $('#body_tabla').html(class_guias.html_body);
            var extra={
                deferRender: true,
                columnDefs: [
                    {
                        render: function (data, type, full, meta) {
                            return "<div class='tabla-descripcion'>" + data + "</div>";
                        },
                        targets: (typeof(usuario) !== "undefined")?[0,1,2,3,4]:[0,1,2,3]
                    }
                ],
		drawCallback: function( settings ) {
                    class_guias.control();
                }
            };
            class_utils.setTabla('tabla_guias',extra);
            $('.buttons-csv span').html('Descargar .csv');
            $('.buttons-csv').hide();
    }
}

$(class_guias.ready);