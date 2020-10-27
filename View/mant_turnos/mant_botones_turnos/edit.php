
<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Estados Turnos</a></li>
    <li  class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=mant_botones_turnos&a=index">Listado</a></li>
    <li class="breadcrumb-item active"><?php echo  ($this->model->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">

        <h4 class="text-primary">Mantenimiento de Botones (Turnos)</h4>
        <p class="font-90 text-muted mb-1 text-bold">Administracion de Sistema</p>

        <hr>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-tabs mb-0-5" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#Botones" role="tab" aria-expanded="false">Botones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#iconos" role="tab" aria-expanded="true">Iconos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#TiposBotones" role="tab" aria-expanded="true">Tipos Botones</a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="Botones" role="tabpanel" aria-expanded="true">
                        <br>
                        <form id="frm-botones-turnos" action="?c=mant_botones_turnos&a=Save" method="post" enctype="multipart/form-data" >

                            <div class="container-fluid">

                                <input type="hidden" name="Id" value="<?php echo $this->model->Id; ?>" />
                                <input type="hidden" name="Activo" id="Activo" value="<?php echo ($this->model->Id != null) ? $this->model->Activo : 1 ?>" >


                                <div class="form-group col-md-6">
                                    <label for="Nombre"><b>*Nombre (Boton):</b></label>
                                    <input type="text" name="Nombre" value="<?php echo $this->model->Nombre; ?>" class="form-control" placeholder="Nombre del Boton" data-validacion-tipo="requerido|min:2" />
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="ValorBoton"><b>*Valor (Boton):</b></label>
                                    <input type="text" name="ValorBoton" value="<?php echo $this->model->ValorBoton; ?>" class="form-control" placeholder="Valor del boton" data-validacion-tipo="requerido|min:1" />
                                </div>


                                <div class="form-group col-md-6">
                                    <label for="TextoPeqMostrar"><b>Texto Pequeno (Botón):</b></label>
                                    <input type="text" name="TextoPeqMostrar" value="<?php echo $this->model->TextoPeqMostrar; ?>" class="form-control" placeholder="Texto Pequeno" data-validacion-tipo="max:50" />
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="TextoGraMostrar"><b>Texto Grande (Boton):</b></label>
                                    <input type="text" name="TextoGraMostrar" value="<?php echo $this->model->TextoGraMostrar; ?>" class="form-control" placeholder="Texto grande" data-validacion-tipo="max:20" />
                                </div>

                                <div class="form-group  col-md-6">
                                    <label for="cmbTipoBoton"><b>*Tipo (Botón):</b></label>
                                    <select id="TipoBoton" name="TipoBoton" class="form-control">
                                        <option value="" selected>Seleccione el tipo de boton. Ver listado de tipos botones</option>
                                        <option value="BloqueA">Bloque A</option>
                                        <option value="BloqueB">Bloque B</option>
                                        <option value="BloqueC">Bloque C</option>
                                        <option value="BloqueD">Bloque D</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="cmbColor"><b>*Color (Botón):</b></label>
                                    <select id="Color" name="Color" class="form-control">
                                        <option value="" selected>Seleccione el color de las letras del boton</option>
                                        <option value="default">Gris (Default)</option>
                                        <option value="primary">Azul marino</option>
                                        <option value="info">Azul cielo</option>
                                        <option value="success">Verde</option>
                                        <option value="danger">Rojo</option>
                                        <option value="warning">Amarillo</option>
                                    </select>
                                </div>


                                <div class="form-group col-md-6" id="IconoBoton">
                                    <label for="Icono"><b>Icono (Boton):</b></label>
                                    <input type="text" name="Icono" value="<?php echo $this->model->Icono; ?>" class="form-control" placeholder="Ver listado de iconos y copiar el texto"/>
                                </div>

                                <div class="form-group col-md-6" id="ImagenBloqueA">
                                    <label for="Logo"><b>Imagen 150px x 150px (<b class="text-danger">Solo Bloque A</b>):</b></label>
                                    <input type="file" name="Logo" id="input-file-now-custom-2" class="dropify" data-height="80" data-default-file="uploads/<?php echo  $this->model->Logo?>"/>
                                    <input type="hidden" name="Logo" value="<?php echo $this->model->Logo; ?>"/>
                                </div>


                                <div class="form-group col-md-12">
                                    <hr>
                                    <?php if($this->model->Id != null){?>
                                        <button type="submit" class="btn btn-warning">Actualizar <i class="fa fa-refresh"></i> </button>
                                        <input type="checkbox"  data-toggle="toggle" id="ActivoToogle" data-on="Activo" data-off="Inactivo" data-onstyle="success" data-offstyle="danger" data-onstyle="danger" data-style="ios">
                                    <?php }else {?>
                                        <button type="submit"  class="btn btn-success">Guardar <i class="fa fa-save"></i> </button>
                                    <?php }?>
                                </div>


                            </div>

                        </form>

                    </div>


                    <div class="tab-pane" id="iconos" role="tabpanel" aria-expanded="false">
                        <div class="container-fluid">
                            <br>
                            <div class="box box-block bg-white">
                                <h5>Direcciones</h5>
                                <div class="row icon-area">
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-arrow-up"></span> ti-arrow-up
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-arrow-right"></span> ti-arrow-right
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-arrow-left"></span> ti-arrow-left
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-arrow-down"></span> ti-arrow-down
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-arrows-vertical"></span> ti-arrows-vertical
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-arrows-horizontal"></span> ti-arrows-horizontal
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-angle-up"></span> ti-angle-up
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-angle-right"></span> ti-angle-right
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-angle-left"></span> ti-angle-left
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-angle-down"></span> ti-angle-down
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-angle-double-up"></span> ti-angle-double-up
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-angle-double-right"></span> ti-angle-double-right
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-angle-double-left"></span> ti-angle-double-left
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-angle-double-down"></span> ti-angle-double-down
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-move"></span> ti-move
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-fullscreen"></span> ti-fullscreen
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-arrow-top-right"></span> ti-arrow-top-right
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-arrow-top-left"></span> ti-arrow-top-left
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-arrow-circle-up"></span> ti-arrow-circle-up
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-arrow-circle-right"></span> ti-arrow-circle-right
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-arrow-circle-left"></span> ti-arrow-circle-left
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-arrow-circle-down"></span> ti-arrow-circle-down
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-arrows-corner"></span> ti-arrows-corner
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-split-v"></span> ti-split-v
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-split-v-alt"></span> ti-split-v-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-split-h"></span> ti-split-h
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-hand-point-up"></span> ti-hand-point-up
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-hand-point-right"></span> ti-hand-point-right
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-hand-point-left"></span> ti-hand-point-left
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-hand-point-down"></span> ti-hand-point-down
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-back-right"></span> ti-back-right
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-back-left"></span> ti-back-left
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-exchange-vertical"></span> ti-exchange-vertical
                                    </div>
                                </div>
                            </div>
                            <div class="box box-block bg-white">
                                <h5>Aplicaciones</h5>
                                <div class="row icon-area">
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-wand"></span> ti-wand
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-save"></span> ti-save
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-save-alt"></span> ti-save-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-direction"></span> ti-direction
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-direction-alt"></span> ti-direction-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-user"></span> ti-user
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-link"></span> ti-link
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-unlink"></span> ti-unlink
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-trash"></span> ti-trash
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-target"></span> ti-target
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-tag"></span> ti-tag
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-desktop"></span> ti-desktop
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-tablet"></span> ti-tablet
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-mobile"></span> ti-mobile
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-email"></span> ti-email
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-star"></span> ti-star
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-spray"></span> ti-spray
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-signal"></span> ti-signal
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-shopping-cart"></span> ti-shopping-cart
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-shopping-cart-full"></span> ti-shopping-cart-full
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-settings"></span> ti-settings
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-search"></span> ti-search
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-zoom-in"></span> ti-zoom-in
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-zoom-out"></span> ti-zoom-out
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-cut"></span> ti-cut
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-ruler"></span> ti-ruler
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-ruler-alt-2"></span> ti-ruler-alt-2
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-ruler-pencil"></span> ti-ruler-pencil
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-ruler-alt"></span> ti-ruler-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-bookmark"></span> ti-bookmark
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-bookmark-alt"></span> ti-bookmark-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-reload"></span> ti-reload
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-plus"></span> ti-plus
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-minus"></span> ti-minus
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-close"></span> ti-close
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-pin"></span> ti-pin
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-pencil"></span> ti-pencil
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-pencil-alt"></span> ti-pencil-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-paint-roller"></span> ti-paint-roller
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-paint-bucket"></span> ti-paint-bucket
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-na"></span> ti-na
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-medall"></span> ti-medall
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-medall-alt"></span> ti-medall-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-marker"></span> ti-marker
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-marker-alt"></span> ti-marker-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-lock"></span> ti-lock
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-unlock"></span> ti-unlock
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-location-arrow"></span> ti-location-arrow
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-layout"></span> ti-layout
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-layers"></span> ti-layers
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-layers-alt"></span> ti-layers-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-key"></span> ti-key
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-image"></span> ti-image
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-heart"></span> ti-heart
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-heart-broken"></span> ti-heart-broken
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-hand-stop"></span> ti-hand-stop
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-hand-open"></span> ti-hand-open
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-hand-drag"></span> ti-hand-drag
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-flag"></span> ti-flag
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-flag-alt"></span> ti-flag-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-flag-alt-2"></span> ti-flag-alt-2
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-eye"></span> ti-eye
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-import"></span> ti-import
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-export"></span> ti-export
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-cup"></span> ti-cup
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-crown"></span> ti-crown
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-comments"></span> ti-comments
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-comment"></span> ti-comment
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-comment-alt"></span> ti-comment-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-thought"></span> ti-thought
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-clip"></span> ti-clip
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-check"></span> ti-check
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-check-box"></span> ti-check-box
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-camera"></span> ti-camera
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-announcement"></span> ti-announcement
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-brush"></span> ti-brush
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-brush-alt"></span> ti-brush-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-palette"></span> ti-palette
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-briefcase"></span> ti-briefcase
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-bolt"></span> ti-bolt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-bolt-alt"></span> ti-bolt-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-blackboard"></span> ti-blackboard
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-bag"></span> ti-bag
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-world"></span> ti-world
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-wheelchair"></span> ti-wheelchair
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-car"></span> ti-car
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-truck"></span> ti-truck
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-timer"></span> ti-timer
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-ticket"></span> ti-ticket
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-thumb-up"></span> ti-thumb-up
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-thumb-down"></span> ti-thumb-down
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-stats-up"></span> ti-stats-up
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-stats-down"></span> ti-stats-down
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-shine"></span> ti-shine
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-shift-right"></span> ti-shift-right
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-shift-left"></span> ti-shift-left
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-shift-right-alt"></span> ti-shift-right-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-shift-left-alt"></span> ti-shift-left-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-shield"></span> ti-shield
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-notepad"></span> ti-notepad
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-server"></span> ti-server
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-pulse"></span> ti-pulse
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-printer"></span> ti-printer
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-power-off"></span> ti-power-off
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-plug"></span> ti-plug
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-pie-chart"></span> ti-pie-chart
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-panel"></span> ti-panel
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-package"></span> ti-package
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-music"></span> ti-music
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-music-alt"></span> ti-music-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-mouse"></span> ti-mouse
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-mouse-alt"></span> ti-mouse-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-money"></span> ti-money
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-microphone"></span> ti-microphone
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-menu"></span> ti-menu
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-menu-alt"></span> ti-menu-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-map"></span> ti-map
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-map-alt"></span> ti-map-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-location-pin"></span> ti-location-pin
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-light-bulb"></span> ti-light-bulb
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-info"></span> ti-info
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-infinite"></span> ti-infinite
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-id-badge"></span> ti-id-badge
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-hummer"></span> ti-hummer
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-home"></span> ti-home
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-help"></span> ti-help
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-headphone"></span> ti-headphone
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-harddrives"></span> ti-harddrives
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-harddrive"></span> ti-harddrive
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-gift"></span> ti-gift
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-game"></span> ti-game
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-filter"></span> ti-filter
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-files"></span> ti-files
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-file"></span> ti-file
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-zip"></span> ti-zip
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-folder"></span> ti-folder
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-envelope"></span> ti-envelope
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-dashboard"></span> ti-dashboard
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-cloud"></span> ti-cloud
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-cloud-up"></span> ti-cloud-up
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-cloud-down"></span> ti-cloud-down
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-clipboard"></span> ti-clipboard
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-calendar"></span> ti-calendar
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-book"></span> ti-book
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-bell"></span> ti-bell
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-basketball"></span> ti-basketball
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-bar-chart"></span> ti-bar-chart
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-bar-chart-alt"></span> ti-bar-chart-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-archive"></span> ti-archive
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-anchor"></span> ti-anchor
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-alert"></span> ti-alert
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-alarm-clock"></span> ti-alarm-clock
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-agenda"></span> ti-agenda
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-write"></span> ti-write
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-wallet"></span> ti-wallet
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-video-clapper"></span> ti-video-clapper
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-video-camera"></span> ti-video-camera
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-vector"></span> ti-vector
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-support"></span> ti-support
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-stamp"></span> ti-stamp
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-slice"></span> ti-slice
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-shortcode"></span> ti-shortcode
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-receipt"></span> ti-receipt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-pin2"></span> ti-pin2
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-pin-alt"></span> ti-pin-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-pencil-alt2"></span> ti-pencil-alt2
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-eraser"></span> ti-eraser
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-more"></span> ti-more
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-more-alt"></span> ti-more-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-microphone-alt"></span> ti-microphone-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-magnet"></span> ti-magnet
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-line-double"></span> ti-line-double
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-line-dotted"></span> ti-line-dotted
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-line-dashed"></span> ti-line-dashed
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-ink-pen"></span> ti-ink-pen
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-info-alt"></span> ti-info-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-help-alt"></span> ti-help-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-headphone-alt"></span> ti-headphone-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-gallery"></span> ti-gallery
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-face-smile"></span> ti-face-smile
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-face-sad"></span> ti-face-sad
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-credit-card"></span> ti-credit-card
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-comments-smiley"></span> ti-comments-smiley
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-time"></span> ti-time
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-share"></span> ti-share
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-share-alt"></span> ti-share-alt
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-rocket"></span> ti-rocket
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-new-window"></span> ti-new-window
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-rss"></span> ti-rss
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-rss-alt"></span> ti-rss-alt
                                    </div>
                                </div>
                            </div>
                            <div class="box box-block bg-white">
                                <h5>Controles</h5>
                                <div class="row icon-area">
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-control-stop"></span> ti-control-stop
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-control-shuffle"></span> ti-control-shuffle
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-control-play"></span> ti-control-play
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-control-pause"></span> ti-control-pause
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-control-forward"></span> ti-control-forward
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-control-backward"></span> ti-control-backward
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-volume"></span> ti-volume
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-control-skip-forward"></span> ti-control-skip-forward
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-control-skip-backward"></span> ti-control-skip-backward
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-control-record"></span> ti-control-record
                                    </div>
                                    <div class="col-md-3 col-sm-4 col-xs-6">
                                        <span class="ti-control-eject"></span> ti-control-eject
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="tab-pane" id="TiposBotones" role="tabpanel" aria-expanded="false">

                        <div class="container-fluid">

                             <br>
                            <span class="text-primary">BLOQUE A</span>
                            <hr>
                            <div class="row row-sm">
                                <div class="col-md-4">
                                    <div class="box box-block bg-white">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 text-center">
                                                <img class="img-fluid b-a-radius-circle" src="img/ArsSemma.png" alt="">
                                            </div>
                                            <div class="col-md-8 col-sm-8">
                                                <br>
                                                <p><h2>Texto Pequeño</h2><h1 class="text-primary">Texto Grande</h1></p>
                                                <b>Presione para imprimir turno</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="box box-block bg-white">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 text-center">
                                                <img class="img-fluid b-a-radius-circle" src="img/ArsSemma.png" alt="">
                                            </div>
                                            <div class="col-md-8 col-sm-8">
                                                <br>
                                                <p><h2>Texto Pequeño</h2><h1 class="text-danger">Texto Grande</h1></p>
                                                <b>Presione para imprimir turno</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="box box-block bg-white">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4 text-center">
                                                <img class="img-fluid b-a-radius-circle" src="img/ArsSemma.png" alt="">
                                            </div>
                                            <div class="col-md-8 col-sm-8">
                                                <br>
                                                <p><h2>Texto Pequeño</h2><h1 class="text-success">Texto Grande</h1></p>
                                                <b>Presione para imprimir turno</b>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <br>
                            <span class="text-primary">BLOQUE B</span>
                            <hr>
                            <div class="row">
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="box box-block tile tile-2 bg-danger mb-2">
                                        <div class="t-icon right"><i class="ti-hand-point-up"></i></div>
                                        <div class="t-content">
                                            <h1 class="mb-1">Texto Grande</h1>
                                            <h6 class="text-uppercase">Texto Pequeño</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="box box-block tile tile-2 bg-success mb-2">
                                        <div class="t-icon right"><i class="ti-hand-point-up"></i></div>
                                        <div class="t-content">
                                            <h1 class="mb-1">Texto Grande</h1>
                                            <h6 class="text-uppercase">Texto Pequeño</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="box box-block tile tile-2 bg-primary mb-2">
                                        <div class="t-icon right"><i class="ti-hand-point-up"></i></div>
                                        <div class="t-content">
                                            <h1 class="mb-1">Texto Grande</h1>
                                            <h6 class="text-uppercase">Texto Pequeño</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="box box-block tile tile-2 bg-info mb-2">
                                        <div class="t-icon right"><i class="ti-hand-point-up"></i></div>
                                        <div class="t-content">
                                            <h1 class="mb-1">Texto Grande</h1>
                                            <h6 class="text-uppercase">Texto Pequeño</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br>
                            <span class="text-primary">BLOQUE C</span>
                            <hr>
                            <div class="row">

                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="box box-block bg-white tile tile-3 mb-2">
                                        <div class="t-icon right"><i class="ti-hand-point-up"></i></div>
                                        <div class="t-content">
                                            <h6 class="text-uppercase">Texto Pequeño</h6>
                                            <h2 class="mb-0 text-danger">Texto Grande</h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="box box-block bg-white tile tile-3 mb-2">
                                        <div class="t-icon right"><i class="ti-hand-point-up"></i></div>
                                        <div class="t-content">
                                            <h6 class="text-uppercase">Texto Pequeño</h6>
                                            <h2 class="mb-0 text-success">Texto Grande</h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="box box-block bg-white tile tile-3 mb-2">
                                        <div class="t-icon right"><i class="ti-hand-point-up"></i></div>
                                        <div class="t-content">
                                            <h6 class="text-uppercase">Texto Pequeño</h6>
                                            <h2 class="mb-0 text-primary">Texto Grande</h2>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="box box-block bg-white tile tile-3 mb-2">
                                        <div class="t-icon right"><i class="ti-hand-point-up"></i></div>
                                        <div class="t-content">
                                            <h6 class="text-uppercase">Texto Pequeño</h6>
                                            <h2 class="mb-0 text-info">Texto Grande</h2>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <br>
                            <span class="text-primary">BLOQUE D</span>
                            <hr>
                            <div class="row">

                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="box box-block bg-white tile tile-4 mb-2">
                                        <div class="t-icon left bg-info"><i class="ti-hand-point-up"></i></div>
                                        <div class="t-content text-xs-right">
                                            <h6 class="text-uppercase"><b>Texto Pequeño</b></h6>
                                            <h3 class="mb-0 text-danger">Texto Grande</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="box box-block bg-white tile tile-4 mb-2">
                                        <div class="t-icon left bg-info"><i class="ti-hand-point-up"></i></div>
                                        <div class="t-content text-xs-right">
                                            <h6 class="text-uppercase"><b>Texto Pequeño</b></h6>
                                            <h3 class="mb-0 text-success">Texto Grande</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="box box-block bg-white tile tile-4 mb-2">
                                        <div class="t-icon left bg-info"><i class="ti-hand-point-up"></i></div>
                                        <div class="t-content text-xs-right">
                                            <h6 class="text-uppercase"><b>Texto Pequeño</b></h6>
                                            <h3 class="mb-0 text-primary">Texto Grande</h3>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                                    <div class="box box-block bg-white tile tile-4 mb-2">
                                        <div class="t-icon left bg-info"><i class="ti-hand-point-up"></i></div>
                                        <div class="t-content text-xs-right">
                                            <h6 class="text-uppercase"><b>Texto Pequeño</b></h6>
                                            <h3 class="mb-0 text-info">Texto Grande</h3>
                                        </div>
                                    </div>
                                </div>


                            </div>


                        </div>
                </div>
            </div>
        </div>

</div>
<script type="text/javascript" src="vendor/js/forms-upload.js"></script>

<script>
    $(document).ready(function(){

        $("#ImagenBloqueA").hide(1000);

        $("#TipoBoton").change(function(){

            if($('#TipoBoton option:selected').val() == "BloqueA"){
                $("#IconoBoton").hide(1000);
                $("#ImagenBloqueA").show(1000);

            }else{
                $("#IconoBoton").show(1000);
                $("#ImagenBloqueA").hide(1000);
            }

        });

    });

</script>

<script>

    $(document).ready(function(){

        $("#frm-botones-turnos").submit(function(){
            return $(this).validate();
        });

        var Color = "<?php echo ($this->model->Color != null) ? $this->model->Color : "" ?>";
        $("#Color").val(Color).change();

        var TipoBoton = "<?php echo ($this->model->TipoBoton != null) ? $this->model->TipoBoton : "" ?>";
        $("#TipoBoton").val(TipoBoton).change();

    })
</script>

<script>

    $(function() {

        if($("#Activo").val() > 0){

            $('#ActivoToogle').bootstrapToggle('on');

        }else{

            $('#ActivoToogle').bootstrapToggle('off');
        }


        $('#ActivoToogle').change(function() {

            if($(this).prop('checked') == false){

                swal({
                    title: 'Registro Eliminado',
                    text: 'Presione Actualizar para eliminar el registro',
                    type: 'error',
                    timer: 5000,
                    buttonsStyling: true
                });
            }
            $("#Activo").val(($(this).prop('checked')) == false ? 0 : 1);
        })
    })


</script>

