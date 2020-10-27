
<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Estados Turnos</a></li>
    <li  class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=mant_estados_turnos&a=index">Listado de Estados</a></li>
    <li class="breadcrumb-item active"><?php echo  ($EstadoTurnos->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">

    <h4 class="text-primary">Mantenimiento de Estados (Turnos)</h4>
    <p class="font-90 text-muted mb-1 text-bold">Administracion de Sistema</p>

    <hr>

     <form id="frm-estados-turnos" action="?c=mant_estados_turnos&a=Save" method="post" enctype="multipart/form-data" class="form-control">

        <div class="container-fluid">

        <input type="hidden" name="Id" id="Id" value="<?php echo $EstadoTurnos->Id; ?>" />
        <input type="hidden" name="Activo" id="Activo" value="<?php echo ($EstadoTurnos->Id != null) ? $EstadoTurnos->Activo : 1 ?>" >


        <div class="form-group">
            <label for="Estado"><b>Estado (LETRA):</b></label>
            <input type="text" name="Estado" value="<?php echo $EstadoTurnos->Estado; ?>" class="form-control" placeholder="Crear estado. Ej. E -> ESPERA, P -> EN PUESTO, A -> ANULADO, etc.." data-validacion-tipo="requerido|min:1" />
        </div>


        <div class="form-group">
            <label for="Descripcion"><b>Descripción:</b></label>
            <textarea name="Descripcion" class="form-control"><?php echo htmlspecialchars($EstadoTurnos->Descripcion); ?></textarea>
        </div>


        <div class="form-group col-md-12">
            <hr>
            <?php if($EstadoTurnos->Id != null){?>
                <button type="submit" class="btn btn-warning">Actualizar <i class="fa fa-refresh"></i> </button>
                <input type="checkbox"  data-toggle="toggle" id="ActivoToogle" data-on="Activo" data-off="Inactivo" data-onstyle="success" data-offstyle="danger" data-onstyle="danger" data-style="ios">
            <?php }else {?>
                <button type="submit"  class="btn btn-success">Guardar <i class="fa fa-save"></i> </button>
            <?php }?>
         </div>
    </div>

    </form>

</div>

<script>
    $(document).ready(function(){
        $("#frm-estados-turnos").submit(function(){
            return $(this).validate();
        });

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

