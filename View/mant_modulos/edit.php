<style>
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }
</style>

<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Modulos</a></li>
    <li  class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=mant_modulos&a=Index">Listado de Modulos</a></li>
    <li class="breadcrumb-item active"><?php echo  ($Modulo->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">

    <h4 class="text-primary">Mantenimiento de Modulos</h4>
    <p class="font-90 text-muted mb-1 text-bold">Administración de Sistema</p>
    <hr>
     <form id="frm-modulos" action="?c=mant_modulos&a=Save" method="post" enctype="multipart/form-data" class="form-control">

     <div class="container-fluid">

        <input type="hidden" name="Id" id="Id" value="<?php echo $Modulo->Id; ?>" />
        <input type="hidden" name="Activo" id="Activo" value="<?php echo ($Modulo->Id != null) ? $Modulo->Activo : 1 ?>" >


        <div class="form-group">
            <label for="Codigo"><b>Código:</b></label>
            <input type="text" name="Codigo" value="<?php echo $Modulo->Codigo; ?>" class="form-control" placeholder="Asignar un código a la sucursal" data-validacion-tipo="requerido|min:3" />
        </div>


        <div class="form-group">
            <label for="Nombre"><b>Nombre (Modulo):</b></label>
            <input type="text" name="Nombre" value="<?php echo $Modulo->Nombre; ?>" class="form-control" placeholder="Nombre del modulo" data-validacion-tipo="requerido|min:6" />
        </div>

        <div class="form-group">
            <label for="Descripcion"><b>Descripción:</b></label>
            <textarea name="Descripcion" class="form-control"><?php echo htmlspecialchars($Modulo->Descripcion); ?></textarea>
        </div>


        <div class="form-group col-md-12">
            <?php if($Modulo->Id != null){?>
                <button type="submit" class="btn btn-warning">Actualizar <i class="fa fa-refresh"></i> </button>
                <input type="checkbox"  data-toggle="toggle" id="ActivoToogle" data-on="Activo" data-off="Inactivo" data-onstyle="success" data-offstyle="danger" data-onstyle="danger" data-style="ios">
            <?php }else {?>
                <button type="submit"  class="btn btn-success">Guardar <i class="fa fa-save"></i> </button>
            <?php }?>
         </div>
    </div>

    </form>

</div>


<script type="text/javascript" src="vendor/jquery/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="vendor/switchery/dist/switchery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#frm-modulos").submit(function(){
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

