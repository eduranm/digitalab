<div class="main-panel">
    <div class="content-wrapper">
<!--        <div class="row">
            <div class="col-12 stretch-card grid-margin">
                <div class="card card-secondary">
                    <div class="card-body d-lg-flex">
                        <div class="row">
                            <div class="col-xs-1"><img src="<?php echo base_url();?>images/unam.png" height="125px"></div>
                            <div class="col-xs-10 encabezado">Dirección General de Bibliotecas y Servicios Digitales de Información - UNAM</div>
                            <div class="col-xs-1 logo-dgbsdi"><img src="<?php echo base_url();?>images/dgbsdi.png" height="90px"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->
	<?php if(isset($mensaje)): ?>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 subtitulo" style="color:#38ce3c">
                                <?php echo $mensaje ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 subtitulo">
                                Guías de consulta básica de recursos electrónicos de la BiDi UNAM
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <a target="_blank" href="<?php echo base_url();?>/docs/Guia_acceso_remoto.docx">Guía para la obtención de clave de acceso remoto y planteamiento de estrategias de búsqueda</a>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>	
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 subtitulo">
                                Guías por áreas del conocimiento
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <a id="area-1" class="area" href="javascript:void(0)">Área 1 Ciencias, Físico, Matemáticas e Ingeniería</a>
                                <br>
                                <a id="area-2" class="area" href="javascript:void(0)">Área 2 Ciencias Biológicas, Químicas y de la Salud</a>
                                <br>
                                <a id="area-3" class="area" href="javascript:void(0)">Área 3 Ciencias Sociales</a>
                                <br>
                                <a id="area-4" class="area" href="javascript:void(0)">Área 4 Ciencias y Humanidades</a>
								<br>
                                <a id="area-5" class="area" href="javascript:void(0)">Área 5 Multidisciplinaria</a>
                            </div>    
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="card_guias" class="row" style="display:none">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div id="div_area" class="col-sm-12 col-md-12 subtitulo">
                                Guías del Área
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12" id="div_tabla">
                                <table id="tabla_guias" class="display responsive nowrap" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th class="all">Recurso</th>
                                            <th class="none">Descripción</th>
                                            <th class="none">Guía</th>
                                            <th class="none">Enlace</th>
                                        </tr>
                                    </thead>
                                    <tbody id='body_tabla'>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>