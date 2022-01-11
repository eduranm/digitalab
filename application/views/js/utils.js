class_utils= {
    ready: function(){
        if($('#li_usuario')){
            $('#li_usuario').on('click',function(){
               window.location = 'usuarios/cerrar_sesion'; 
            });
        }
    },
    getResource: function(resource) { 
        return $.ajax({url:resource, type:'GET', cache:false}); 
    },
    setTabla: function(id, extra){
        var options_default = {
            dom: 'Bfrtip',
            buttons: [
                'csvHtml5',
            ],
            responsive: true,
            language:{
                "sProcessing":     "Procesando...",
                "sLengthMenu":     "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "buttons": {
                    "copy": "Copiar",
                    "colvis": "Visibilidad"
                }
            },
            footerCallback: function ( row, data, start, end, display ) {
                var api = this.api(), data;

                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\$,]/g, '')*1 :
                        typeof i === 'number' ?
                            i : 0;
                };

                // Total over all pages
                total = api
                    .column( 2 )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

                // Total over this page
                pageTotal = api
                    .column( 2, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );

                // Update footer
                $( api.column( 2 ).footer() ).html(
                    '$'+pageTotal +' ( $'+ total +' total)'
                );
            }
        }
        $('#'+id).DataTable( Object.assign(options_default,extra) );
    },
    filter_anio: function(obj,anio){
        return obj.filter(function(obj2){
            return anio.indexOf(obj2.anio) !== -1;
        });
    },
    filter_prop: function(obj,prop,val){
        return obj.filter(function(obj2){
            return eval('obj2.' + prop + '== val');
        });
    },
	filter_prop_diff: function(obj,prop,val){
        return obj.filter(function(obj2){
            return eval('obj2.' + prop + '!== val');
        });
    },
    find_prop: function(obj,prop,val){
        return obj.find(function(obj2){
            return eval('obj2.' + prop + '== val');
        });
    },
    order_by: function(key, order = 'asc') {
        return function innerSort(a, b) {
          if (!a.hasOwnProperty(key) || !b.hasOwnProperty(key)) {
            // property doesn't exist on either object
            return 0;
          }

          const varA = (typeof a[key] === 'string')
            ? a[key].toUpperCase().trim() : a[key];
          const varB = (typeof b[key] === 'string')
            ? b[key].toUpperCase().trim() : b[key];

          let comparison = 0;
          if (varA > varB) {
            comparison = 1;
          } else if (varA < varB) {
            comparison = -1;
          }
          return (
            (order === 'desc') ? (comparison * -1) : comparison
          );
        };
    }
}

$(class_utils.ready);