class_grafica= {
    server:'http://digitalab-ssie.unam.mx/',
    //0-base,1-archivo
    resource_valores: 0,
    json_vb_ITMS_accesos_servicio: ['restserver/table/vb_ITMS_accesos_servicio','/json/vb_ITMS_accesos_servicio.json'],
    data:[],
    filtrado:[],
    anio_base:2018,
    anio_tope:(new Date()).getFullYear(),
    servicios:[],
    servicios_html:'',
    servicios_val:[],
    option_a:[],
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
            text: 'Accesos por año'
        },
        subtitle: {
            text: ''
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'Accesos'
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
        $('#li_accesos').addClass('active');
        $('#accesos_totales').addClass('show');
        $('#accesos_servicio_grafica a').addClass('active'); 
        
        $.when(class_utils.getResource( ((class_grafica.resource_valores === 0)?class_grafica.server:'') + class_grafica.json_vb_ITMS_accesos_servicio[class_grafica.resource_valores] ))
        .then(function(v){
            for (i=class_grafica.anio_base;i<=class_grafica.anio_tope;i++){
                var res = v.find(function(e){
                    return parseInt(e.anio) === i;
                });
                if( res !== undefined)
                    class_grafica.option_a.push(i);
            };
            class_grafica.data = v;
            class_grafica.options();
            $('#anio').select2();
            $('#servicio').select2();
            class_grafica.control();
        });
    },
    options:function(){
        $('#anio').html('');
        $.each(class_grafica.option_a,function(i,val){
            $('#anio').append('<option value="'+val+'">'+val+'</option>');
        });
    },
    control: function(){                   
        $('#anio').change(function(){
            class_grafica.anio = $('#anio').val();
            class_grafica.reset();
        });
        $('#servicio').change(function(){                
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
    },
    series: function(){
        class_grafica.json_grafica.series = [];
        class_grafica.json_grafica.legend.labelFormatter = function () {
                return this.name;
            };
        class_grafica.json_grafica.xAxis.categories = class_grafica.anio;
        $.each($('#servicio').val(),function(i,val){

            var servicio = class_grafica.filter_servicio(class_grafica.filtrado,val);
            console.log(servicio);
            var serie = {};
            serie.anio = servicio[0].anio;
            serie.name = servicio[0].nombre_servicio;
            serie.data = [];                              
                            e = $('#div_servicio .select2-selection__choice:nth-child(5n+'+(i+1)+')');
                            serie.color = e.css("background").substr(0,e.css("background").indexOf(')')+1);
            $.each(servicio,function(i_servicio,val_servicio){
//                  console.log("val: "+val_sistema);  
                serie.data[class_grafica.anio.indexOf(val_servicio.anio)] = parseInt(val_servicio.accesos);
            });
            class_grafica.json_grafica.series.push(serie);
        });
    },
    option_servicios: function(options){            
        $('#servicio').html('');
        class_grafica.servicios = [];
        var html_servicios = '';
        console.log(options);
        $.each(options,function(i,val){
            if( class_grafica.servicios.indexOf(val.nombre_servicio) === -1){
                class_grafica.servicios.push(val.nombre_servicio);
                
                html_servicios += '<option value="'+val.nombre_servicio+'">'+val.nombre_servicio+'</option>';
            }
        });        
        $('#servicio').html(html_servicios);
        $('#servicio').select2();
    },
    reset: function(){
        class_grafica.servicios = [];
        class_grafica.servicios_html = '';
        class_grafica.servicios_val = [];
        $('#servicio').val([]);
        $('#servicio').select2();
        $('#container').html('');
        class_grafica.option_servicios(class_grafica.filtros(class_grafica.data));
    },
    filtros: function(data){
        data = class_utils.filter_anio(data,class_grafica.anio);
        data = data.sort(class_utils.order_by('nombre_servicio'));
        class_grafica.filtrado = data;
        return data;
    },
    filter_servicio: function(obj,servicio){
        return obj.filter(function(obj2){
            return obj2.nombre_servicio === servicio;
        });
    }
//    json_grafica:{
//        chart: {
//            type: 'packedbubble',
//            height: ''
//        },
//        credits: {
//            href: "http://digitalab-ssie.unam.mx/",
//            text: "Fuente: digitalab-ssie.unam.mx"
//        },
//        title: {
//            text: ''
//        },
//        subtitle: {
//            text: ''
//        },
//        plotOptions: {
//            packedbubble: {
//                minSize: '20%',
//                maxSize: '100%',
//                zMin: 0,
//                zMax: 1500,
//                layoutAlgorithm: {
//                    gravitationalConstant: 0.02,
//                    splitSeries: true,
//                    seriesInteraction: false,
//                    dragBetweenSeries: true,
//                    parentNodeLimit: true
//                },
//                dataLabels: {
//                    enabled: true,
//                    format: '{point.name}',
//                    filter: {
//                        property: 'y',
//                        operator: '>',
//                        value: 0
//                    },
//                    style: {
//                        color: 'black',
//                        textOutline: 'none',
//                        fontWeight: 'normal'
//                    }
//                }
//            }
//        },
//        tooltip: {
////            headerFormat: "",
//            useHTML: true,
//            pointFormat: '<b>{point.name}:</b> {point.value}</sub>'
//        },
//        series: [{
//            name:'2017',
//            data: [{
//                    name: 'UpToDate',
//                    value: 1119.081
//                }
//                ,{
//                    name: 'Clinical Key',
//                    value: 978.752
//                }
//                ,{
//                    name: 'Ebsco Host',
//                    value: 572.609
//                }
//                ,{
//                    name: 'PubMed',
//                    value: 462.592
//                }
//                ,{
//                    name: 'Science Direct',
//                    value: 407.645
//                }
//            ]
//        },
//        {
//            name:'2018',
//            data: [{
//                    name: 'UpToDate',
//                    value: 299.447
//                }
//                ,{
//                    name: 'Clinical Key',
//                    value: 255.462
//                }
//                ,{
//                    name: 'Ebsco Host',
//                    value: 160.583
//                }
//                ,{
//                    name: 'PubMed',
//                    value: 127.076
//                }
//                ,{
//                    name: 'Science Direct',
//                    value: 107.551
//                }
//            ]
//        }
//        ]
//    }
}

$(class_grafica.ready);
//Highcharts.chart('container', class_grafica.json_grafica);
$('.nav-item').removeClass('active');
$('#li_accesos').addClass('active');