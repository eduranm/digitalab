<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 subtitulo">
                                Actualización de guía: <b><?php echo $nombre_recurso ?></b>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="<?php echo base_url() ?>guias/actualiza" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nombre">Nombre: </label>
                                    <input type="hidden" class="form-control" id="id_recurso" name="id_recurso" value="<?php echo $id_recurso ?>">
                                    <input type="text" class="form-control" id="nombre" name="nombre_recurso" value="<?php echo $nombre_recurso ?>">
                                </div>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="descripcion">Descripción: </label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" rows="10"><?php echo $descripcion ?></textarea>
                                </div>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_guia">Nombre de la guía: </label>
                                    <input type="text" class="form-control" id="nombre_guia" name="nombre_guia" value="<?php echo $nombre_guia ?>">
                                </div>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="nombre_archivo">Archivo actual: </label>
                                    <input type="text" class="form-control" id="nombre_archivo" name="nombre_archivo" value="<?php echo $enlace_guia ?>" readonly="">
                                </div>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="archivo">Archivo nuevo:</label><br>
                                    <input type="file" class="file-upload-default" name="archivo" id="archivo"/>
                                    <div class="input-group col-xs-12">
                                        <div class="col-xs-12 col-sm-8">
                                            <input id="nombre_archivo_sel" name="nombre_archivo_sel" type="text" class="form-control file-upload-info" readonly="" placeholder="">
                                            <br>
                                        </div>
                                        <div class="col-xs-12 col-sm-4" style="text-align: center;">
                                            <span class="input-group-append" style="display: inline-block;">
                                                <button class="file-upload-browse btn btn-primary" type="button" id="archivo_sel">Buscar</button>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="enlace_recurso">Enlace al recurso: </label>
                                    <input type="text" class="form-control" id="enlace_recurso" name="enlace_recurso" width="100%" value="<?php echo $enlace_recurso ?>">
                                </div>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <center><button class="btn btn-light" id="btn_regresar">Regresar</button>&nbsp;<input type="submit" class="btn btn-primary mr-2" id="enviar" name="Actualizar" value="Guardar"></center>
                            </div>    
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>