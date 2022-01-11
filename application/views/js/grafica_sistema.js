getResource = function(resource) { return $.ajax({url:resource, type:'GET', cache:false}); }

class_grafica= {
        server:'http://digitalab-ssie.unam.mx/',
        //0-base,1-archivo
        resource_valores: 0,
        json_valores: ['restserver/table/valores','/json/valores.json'],
        json_fuente_informacion: ['restserver/table/fuente_informacion','/json/fuente_informacion.json'],
        json_area_conocimiento: ['restserver/table/area_conocimiento','/json/area_conocimiento.json'],
        json_recurso_electronico: ['restserver/table/recurso_electronico','/json/recurso_electronico.json'],
        json_tipo_informacion: ['restserver/table/tipo_informacion','/json/tipo_informacion.json'],
        data:[],
        filtrado:[],
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
        option_ac:[],
        option_re:[],
        option_ti:[],
        option_a:[],
        anio_base:2018,
        anio_tope:(new Date()).getFullYear(),
        json_grafica:{
            chart: {
                type: 'line',
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
                categories: ['enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio', 
                                'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre']
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
                }
            },
            legend: {
                labelFormatter: null,
            },
            tooltip: {
                headerFormat: "",
                pointFormat: "<b>{series.name}</b><br/>{point.category}: <b>{point.y}</b>"
            },
            series: []
        },
	ready: function(){                        
            $('.nav-item').removeClass('active');
            $('#li_consultas').addClass('active');
            $.when( getResource( ((class_grafica.resource_valores === 0)?class_grafica.server:'') + class_grafica.json_valores[class_grafica.resource_valores] ),
                    getResource( ((class_grafica.resource_valores === 0)?class_grafica.server:'') + class_grafica.json_fuente_informacion[class_grafica.resource_valores] ),
                    getResource( ((class_grafica.resource_valores === 0)?class_grafica.server:'') + class_grafica.json_area_conocimiento[class_grafica.resource_valores] )
                    ).then(function(v,fi,ac){
                        $.when( getResource( ((class_grafica.resource_valores === 0)?class_grafica.server:'') + class_grafica.json_recurso_electronico[class_grafica.resource_valores] ),
                                getResource( ((class_grafica.resource_valores === 0)?class_grafica.server:'') + class_grafica.json_tipo_informacion[class_grafica.resource_valores] )
                        ).then(function(re,ti){
                        v=v[0];
                        fi=fi[0];
                        class_grafica.option_ac = ac[0];
                        class_grafica.option_re = re[0];
                        class_grafica.option_ti = ti[0];
                        $.each(v,function(i,val){
                            var obj = fi.find(function(a){
                                return a.id_fuente === val.id_fuente;
                            });
                            val.sistema = obj.nombre_fuente;
                            val.acronimo = obj.acronimo;
                            val.id_recurso = obj.id_recurso;
                            val.id_area = obj.id_area;
                        });
                        for (i=class_grafica.anio_base;i<=class_grafica.anio_tope;i++){
                            var res = v.find(function(e){
                                return parseInt(e.anio) === i;
                            });
                            if( res !== undefined)
                                class_grafica.option_a.push(i);
                        };
                        //v = class_grafica.find_cero(v);                        
                        class_grafica.options();
                $('#anio').select2();
                $('#tipo').select2();
                $('#area').select2();
                class_grafica.data = v;
                class_grafica.anio = $('#anio').val();
                class_grafica.informacion = $('#informacion').val();
                var filtrado = class_grafica.filtros(class_grafica.data);
                class_grafica.option_sistemas(filtrado);
                class_grafica.control();
            });					
            });
	},
        options:function(){
            $('#area').html('');
            $.each(class_grafica.option_ac,function(i,val){
                $('#area').append('<option value="'+val.id_area+'">'+val.nombre_area+'</option>');
            });
            $('#tipo').html('');
            $.each(class_grafica.option_re,function(i,val){
                $('#tipo').append('<option value="'+val.id_recurso+'">'+val.nombre_recurso+'</option>');
            });
            $('#informacion').html('');
            $.each(class_grafica.option_ti,function(i,val){
                $('#informacion').append('<option value="'+val.id_tipo_info+'">'+val.nombre_tipo_info+'</option>');
            });
            $('#anio').html('');
            $.each(class_grafica.option_a,function(i,val){
                $('#anio').append('<option value="'+val+'">'+val+'</option>');
            });
        },
        control: function(){
            
            $('#informacion').change(function(){
                class_grafica.informacion = $('#informacion').val();
                class_grafica.reset();
            });
            $('#anio').change(function(){
                class_grafica.anio = $('#anio').val();
                class_grafica.reset();
            });
            $('#sistemas').change(function(){                
                setTimeout(function(){ 
                    class_grafica.series();
                    if(class_grafica.json_grafica.series.length === 0)
                        $('#container').html('');
                    else{
                        class_grafica.json_grafica.chart.height = 500 + 50*(class_grafica.json_grafica.series.length/2);
                        Highcharts.chart('container',class_grafica.json_grafica);                    
                    }
                }, 1);
            });
            $('#tipo').change(function(){
                class_grafica.tipo = $('#tipo').val();
                class_grafica.option_sistemas(class_grafica.filtros(class_grafica.data));
                $('#sistemas').val([]);
                $('#div_sistemas .select2-selection__rendered').html('');
                $('#container').html('');
            });
            $('#area').change(function(){
                class_grafica.area = $('#area').val();
                class_grafica.option_sistemas(class_grafica.filtros(class_grafica.data));
                $('#sistemas').val([]);
                $('#div_sistemas .select2-selection__rendered').html('');
                $('#container').html('');
            });
        },
        series: function(){
            class_grafica.json_grafica.series = [];
            class_grafica.json_grafica.legend.labelFormatter = function () {
                    return this.name[0] + ' (' + this.name[1] + ') : '+class_grafica.find_sistema(class_grafica.filtros(class_grafica.filtrado),this.name[0])[0].sistema;
                };
            var nombre_tipo_info = class_grafica.option_ti.find(function(e){return e.id_tipo_info === class_grafica.informacion}).nombre_tipo_info;
            class_grafica.json_grafica.yAxis.title.text = nombre_tipo_info;
            class_grafica.json_grafica.title.text = nombre_tipo_info.replace(/^\w/, (c) => c.toUpperCase()); // + ' ' + class_grafica.anio;
            $.each($('#sistemas').val(),function(i,val){
                                
                var sistema = class_grafica.find_sistema(class_grafica.filtrado,val);
                $.each(sistema,function(i_sistema,val_sistema){
//                  console.log("val: "+val_sistema);  
                var serie = {};
                serie.anio = val_sistema.anio;
                serie.name = [];
                serie.name[0] = val;
                serie.name[1] = val_sistema.anio;
                serie.acronimo = val;
                serie.data = [];                              
				e = $('#div_sistemas .select2-selection__choice:nth-child(5n+'+(i+1)+')');
				serie.color = e.css("background").substr(0,e.css("background").indexOf(')')+1);
                serie.data.push(
                    parseInt(val_sistema.m1),
                    parseInt(val_sistema.m2),
                    parseInt(val_sistema.m3),
                    parseInt(val_sistema.m4),
                    parseInt(val_sistema.m5),
                    parseInt(val_sistema.m6),
                    parseInt(val_sistema.m7),
                    parseInt(val_sistema.m8),
                    parseInt(val_sistema.m9),
                    parseInt(val_sistema.m10),
                    parseInt(val_sistema.m11),
                    parseInt(val_sistema.m12)
                );
                class_grafica.json_grafica.series.push(serie);
                });
            });
        },
        option_sistemas: function(options){            
            $('#sistemas').html('');
            var grupo = null;
            class_grafica.sistemas = [];
            var html_sistemas = '';

            $.each(options,function(i,val){
                if( class_grafica.sistemas.indexOf(val.acronimo) === -1){
                    class_grafica.sistemas.push(val.acronimo);
                    if(grupo !== val.id_recurso){
                        if(grupo !== null)
                            //$('#sistemas').append('</optgroup>');
                            html_sistemas += '</optgroup>';

                        grupo = val.id_recurso;
                        //$('#sistemas').append('<optgroup label="'+class_grafica.option_re.find(function(e){return e.id_recurso === val.id_recurso}).nombre_recurso+'">');
                        html_sistemas += '<optgroup label="'+class_grafica.option_re.find(function(e){return e.id_recurso === val.id_recurso}).nombre_recurso+'">';
                    }
                    //$('#sistemas').append('<option value="'+val.acronimo+'">'+val.acronimo+' ('+class_grafica.area_abrev[parseInt(val.id_area)]+')</option>');
                    html_sistemas += '<option value="'+val.acronimo+'">'+val.acronimo+' ('+class_grafica.area_abrev[parseInt(val.id_area)]+')</option>';
                }
            });
            $('#sistemas').append('</optgroup>');
            html_sistemas += '</optgroup>';
            $('#sistemas').html(html_sistemas);
            $('#sistemas').select2();
        },
        reset: function(){
            class_grafica.tipo = [];
            class_grafica.area = [];
            class_grafica.sistemas = [];
            class_grafica.sistemas_html = '';
            class_grafica.sistemas_val = [];
            $('#area').val([]);
            $('#tipo').val([]);
            $('#sistemas').val([]);
            $('#area').select2();
            $('#tipo').select2();
            $('#sistemas').select2();
            $('#container').html('');
            class_grafica.option_sistemas(class_grafica.filtros(class_grafica.data));
        },
        filtros: function(data){
            data = class_grafica.find_info(data,class_grafica.informacion);
            data = class_grafica.find_anio(data,class_grafica.anio);
            data = class_grafica.find_tipo(data,class_grafica.tipo);
            if(class_grafica.area.length > 0)
                data = class_grafica.find_area(data,class_grafica.area);
            data = data.sort(class_grafica.order_by('acronimo'));
            data = data.sort(class_grafica.order_by('id_recurso'));
            class_grafica.filtrado = data;
            return data;
        },
        find_info: function(obj,info){
            return obj.filter(function(obj2){
                return obj2.id_tipo_info === info;
            });
        },
        find_anio: function(obj,anio){
            return obj.filter(function(obj2){
                return anio.indexOf(obj2.anio) !== -1;
            });
        },
        find_sistema: function(obj,sistema){
            return obj.filter(function(obj2){
                return obj2.acronimo === sistema;
            });
        },
        find_sistema_by_anio: function(obj,sistema,anio){
            return obj.filter(function(obj2){
                return obj2.acronimo === sistema && obj2.anio === anio;
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
                return area.indexOf(String(obj2.id_area)) !== -1;
            });
        },
        find_cero: function(obj){
            return obj.filter(function(obj2){
                return obj2.m1 !== '0' || obj2.m2 !== '0' || obj2.m3 !== '0' || obj2.m4 !== '0' ||
                       obj2.m5 !== '0' || obj2.m6 !== '0' || obj2.m7 !== '0' || obj2.m8 !== '0' ||
                       obj2.m9 !== '0' || obj2.m10 !== '0' || obj2.m11 !== '0' || obj2.m12 !== '0';
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

$(class_grafica.ready);