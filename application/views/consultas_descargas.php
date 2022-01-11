<div class="main-panel">
          <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div id="subtitulo" class="col-sm-12 col-md-12">
                                    Gráficas de consultas y descargas de recursos electrónicos de información suscritas por la UNAM
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-12 col-md-6 form-group">
                                    <label for="informacion">Información</label>
                                    <select class="form-control form-control-sm" id="informacion">
                                        <option value="consultas">Consultas</option>
                                        <option value="descargas">Descargas</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 col-md-6 form-group">
                                    <label for="anio">Año</label>
                                    <select class="form-control form-control-sm" id="anio" name="anio[]" multiple="multiple">
                                      <option>2018</option>
                                      <option>2019</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div id="div_tipo" class="col-sm-12 col-md-6 form-group">
                                    <label for="tipo">Recurso</label>
                                    <select class="form-control form-control-sm" id="tipo" name="tipo[]" multiple="multiple">
                                        <!--<optgroup label="Opciones">-->
                                            <!--<optgroup label="Opciones1.1">-->
                                                <option value="revista">Revistas</option>
                                                <option value="base">Bases de datos</option>
                                                <option value="libro">Libros</option>
                                            <!--</optgroup>-->
                                            <!--<optgroup label="Opciones1.2">-->
                                                <!--<option>Libros</option>-->
                                            <!--</optgroup>-->                                            
                                        <!--</optgroup>-->
                                    </select>
                                </div>
                                <div id="div_area" class="col-sm-12 col-md-6 form-group">
                                    <label for="tipo">Área de conocimiento</label>
                                    <select class="form-control form-control-sm" id="area" name="area[]" multiple="multiple">
                                        <!--<optgroup label="Opciones">-->
                                            <option value="1">Ciencias Físico, Matemáticas e Ingeniería</option>
                                            <option value="2">Ciencias Biológicas, Químicas y de la Salud</option>
                                            <option value="3">Ciencias Sociales</option>
                                            <option value="4">Artes y Humanidades</option>
                                            <option value="5">Multidisciplinarias</option>
                                        <!--</optgroup>-->
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div id="div_sistemas" class="col-sm-12 col-md-12 form-group">
                                    <label for="sistemas">Acrónimo</label>
                                    <select class="form-control form-control-sm" id="sistemas" name="sistemas[]" multiple="multiple">
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12" id="container">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-xl-12 contenido">
                                    <ul>
                                        <li>
                                            Las estadísticas de consultas y descargas aquí graficadas tienen como fuente de información los reportes proporcionados por las editoriales proveedoras de información.
                                        </li>
                                        <br>
                                        <li>
                                            Otra fuente de información del uso de los recursos es la que se extrae de los accesos remotos que son contabilizados a través de la plataforma ITMS Analytics.
                                        </li>
                                        <br>
                                        <li>
                                            Los recursos de información se clasifican en <b>Bases de datos</b>, <b>Revistas</b> y <b>Libros</b>.
                                            <ul>
                                                <br>
                                                <li>
                                                    En <b>Bases de datos</b> se incluyen aquellos recursos que son suscritos por proveedores o distribuidores nacionales e internacionales que proveen bases de datos referenciales, esto es, aquellas que incluyen únicamente los resúmenes (abstracts) y los datos esenciales de las referencias de documentos impresos o electrónicos que permiten localizarlos. También se incluyen bases de datos de texto completo que contienen los documentos descargables en formato HTML o PDF.
                                                </li>
                                                <br>
                                                <li>
                                                    En <b>Revistas</b> se incluyen las editoriales de revistas científicas y técnicas con quienes se tiene suscripción.
                                                </li>
                                                <br>
                                                <li>
                                                    En <b>Libros</b> se incluyen colecciones de libros electrónicos provenientes de editores y proveedores con quienes se tienen suscritas también revistas electrónicas o bases de datos.
                                                </li>
                                            </ul>
                                        </li>
                                        <br>
                                        <li>
                                            Los recursos de información están descritos por acrónimos para efecto de su visualización en las gráficas.
                                        </li>
                                        <br>
                                        <li>
                                            Los títulos completos de los acrónimos utilizados pueden consultarse en esta lista: <a target="_blank" href="<?php echo base_url();?>/docs/Acronimos_y_Nombres_completos_2018-2020.xlsx"> Descargar lista </a>
                                        </li>
                                        <br>
                                        <li>
                                            Las estadísticas de uso se subdividen en <b>consultas</b> y <b>descargas</b>.
                                        </li>
                                        <br>
                                        <li>
                                            Con objeto de contabilizar, homologar y estandarizar los datos relativos al uso de recursos electrónicos, las editoriales se ajustan a la metodología de conteo conocida como <i>Counting Online Usage of Networked Electronic Resources</i> ( COUNTER ).
                                        </li>
                                        <br>
                                        <li>
                                            De acuerdo con esta metodología, se considera una <b>consulta</b> al número de veces que un usuario busca términos en una base de datos o recurso electrónico, y una <b>descarga</b> al número de veces que se despliega o descarga el texto completo de un documento, ya sea en formato HTML o PDF.
                                        </li>
                                        <br>
                                        <li>
                                            La metodología COUNTER ha registrado cambios con objeto de afinar la medición en el uso de los recursos electrónicos. En 2019, se introdujo la versión COUNTER 5, que es la
                                            versión más reciente de esta metodología. Sin embargo, no todos los proveedores han actualizado sus reportes de uso con esta versión y se mantienen en la versión COUNTER 4, por
                                            lo que es necesario considerar esta diferencia en la evaluación del uso de los recursos. Respecto a las diferencias entre COUNTER 4 y 5 consultar <a target="_blank" href="http://www.copyright.com/blog/counter4-vs-counter5"> aquí </a> y <a target="_blank" href="https://www.projectcounter.org/2448-2/"> aquí </a>                                             
                                        </li>
                                        <br>
                                        <li>
                                            En esta tabla se distingue el método COUNTER utilizado por cada recurso de información: <a target="_blank" href="<?php echo base_url();?>/docs/Recursos_por_COUNTER_4y5.docx"> Descargar tabla </a>
                                        </li>
                                        <br>
                                        <li>
                                            En el caso de los recursos de información que aparecen con valores de 0, las causas pueden ser las siguientes:
                                            <ol>
                                                <br>
                                                <li>
                                                    Recursos de información que todo el año tienen "0".
                                                    <ol type="a">
                                                        <br>
                                                        <li>
                                                            Debido a que el editor/proveedor no envió sus reportes de uso a la UNAM.
                                                        </li>
                                                        <br>
                                                        <li>
                                                            El editor/proveedor dejó de reportar el indicador de consultas.
                                                        </li>
                                                        <br>
                                                        <li>
                                                            A la fusión de las editoriales.
                                                        </li>
                                                        <br>
                                                        <li>
                                                            A que cambian de plataforma para los reportes de uso.
                                                        </li>
                                                        <br>
                                                        <li>
                                                            Deshabilitan el área de reportes de uso de recursos que no se suscribieron o renovaron.
                                                        </li>
                                                    </ol>
                                                </li>
                                                <br>
                                                <li>
                                                    Recursos de información que en algún mes o meses tienen "0".
                                                    <ol type="a">
                                                        <br>
                                                        <li>
                                                            Debido a que en ese mes o meses el reporte arrojó cero descargas o consultas.
                                                        </li>
                                                        <br>
                                                        <li>
                                                            Debido a que la plataforma del editor/proveedor presentó fallas.
                                                        </li>
                                                    </ol>
                                                </li>
                                            </ol>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
      </div>

