getResource = function(resource) { return $.ajax({url:resource, type:'GET', cache:false}); }

class_grafica= {
        server:'http://digitalab-ssie.unam.mx/',
        //0-base,1-archivo
        resource_valores: 0,
        json_recurso_electronico: ['restserver/table/recurso_electronico','/json/recurso_electronico.json'],
        json_tipo_informacion: ['restserver/table/tipo_informacion','/json/tipo_informacion.json'],
        json_vb_cons_des_total: ['restserver/table/vb_cons_des_total','/json/vb_cons_des_total.json'],
        data:[],
        anio:null,
        informacion:null,
        tipo:[],
        area:[],
        sistemas:[],
        chart:null,
        sistemas_val:[],
        sistemas_html:'',
        area_abrev:['','FM','CB','CS','AH','M'],
        acronimos:[],
        option_re:[],
        option_ti:[],
        arr_re:[],
        arr_ti:[],
        anio_base:2018,
        anio_tope:(new Date()).getFullYear(),
        val_descargas : '1',
        json_grafica:{
            chart: {
                height: 500
            },
            credits: {
                href: "http://digitalab-ssie.unam.mx/",
                text: "Fuente: digitalab-ssie.unam.mx"
            },
            title: {
                text: ''
            },
            subtitle: {
                text: ''
            },
            xAxis: {
                categories: []
            },
            yAxis: {
                title: {
                    text: ''
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: true
                },
                 series: {
                    borderWidth: 0,
                    dataLabels: {
                        enabled: true
                    }
                }
            },
            tooltip: {
                headerFormat: "",
                pointFormat: "<b>{series.name}</b><br/>{point.category}: <b>{point.y}</b>"
            },
            series: []
        },
	ready: function(){
            $('.nav-item').removeClass('active');
            $('#li_consultas_total').addClass('active');
            
            $.when(getResource( ((class_grafica.resource_valores === 0)?class_grafica.server:'') + class_grafica.json_vb_cons_des_total[class_grafica.resource_valores] ),
                    getResource( ((class_grafica.resource_valores === 0)?class_grafica.server:'') + class_grafica.json_recurso_electronico[class_grafica.resource_valores] ),
                    getResource( ((class_grafica.resource_valores === 0)?class_grafica.server:'') + class_grafica.json_tipo_informacion[class_grafica.resource_valores] )
                    ).then(function(v,re,ti){
                        v=v[0];
                        console.log(v);
                        class_grafica.option_re = re[0];
                        class_grafica.option_ti = ti[0];
                        $('#tipo').select2();
                        $('#informacion').select2();
                        class_grafica.data = v;
                        
                        for (i=class_grafica.anio_base;i<=class_grafica.anio_tope;i++){
                            var res = v.find(function(e){
                                return parseInt(e.anio) === i;
                            });
                            if( res !== undefined)
                                class_grafica.json_grafica.xAxis.categories.push(i);
                        };
                        
                        class_grafica.options();
                        class_grafica.control();
                    });
            
	},
        options:function(){
            $('#tipo').html('');
            $.each(class_grafica.option_re,function(i,val){
                class_grafica.arr_re[val.id_recurso] = val.nombre_recurso;
                $('#tipo').append('<option value="'+val.id_recurso+'">'+val.nombre_recurso+'</option>');
            });
            $('#informacion').html('');
            $.each(class_grafica.option_ti,function(i,val){
                class_grafica.arr_ti[val.id_tipo_info] = val.nombre_tipo_info;
                $('#informacion').append('<option value="'+val.id_tipo_info+'">'+val.nombre_tipo_info+'</option>');
            });
        },
        control: function(){
            $('#informacion').change(function(){
                class_grafica.informacion = $('#informacion').val();
                class_grafica.series();
            });
            $('#tipo').change(function(){
                class_grafica.tipo = $('#tipo').val();
                class_grafica.series();
            });
        },
        series: function(){
            class_grafica.json_grafica.series = [];
            $.each($('#informacion').val(),function(i,val){
                $.each($('#tipo').val(),function(i2,val2){
                    var serie = {};
                    serie.type = (val === class_grafica.val_descargas )?'column':'line';                
                    serie.data = [];
                    serie.name = class_grafica.capital(class_grafica.arr_ti[val]) + ' ' + class_grafica.capital(class_grafica.arr_re[val2]);                    
                    var informacion = class_grafica.find_info(class_grafica.data,val);
                    var valores = class_grafica.find_tipo(informacion,val2);
                    $.each(class_grafica.json_grafica.xAxis.categories,function(c,valc){
                       var valor = parseInt(class_grafica.find_anio(valores,valc)[0].total);
                       serie.data.push((valor===undefined)?0:valor);
                    });
                    if(serie.data.length > 0)
                        class_grafica.json_grafica.series.push(serie);
                });                
            });
            class_grafica.json_grafica.series = class_grafica.json_grafica.series.sort(class_grafica.order_by('type'));
            Highcharts.chart('container',class_grafica.json_grafica);
        },
        find_info: function(obj,info){
            return obj.filter(function(obj2){
                return obj2.id_tipo_info === info;
            });
        },
        find_anio: function(obj,anio){
            return obj.filter(function(obj2){
                return parseInt(obj2.anio) === anio;
            });
        },
        find_sistema: function(obj,sistema){
            return obj.find(function(obj2){
                return obj2.acronimo === sistema;
            });
        },
        find_valores: function(obj,anio){
            return obj.filter(function(obj2){
                return obj2.anio === anio;
            });
        },
        find_valor_mes: function(obj,mes){
            return obj.filter(function(obj2){
                return obj2.mes === mes;
            });
        },
        find_tipo: function(obj,tipo){
            return obj.filter(function(obj2){
                return tipo.indexOf(obj2.id_recurso) !== -1;
            });
        },
        find_area: function(obj,area){
            return obj.filter(function(obj2){
                return area.indexOf(String(obj2.area)) !== -1;
            });
        },
        capital: function(s){
            return s.replace(/^\w/, (c) => c.toUpperCase());
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

$(class_grafica.ready);