<link rel="stylesheet" href="vendor/select2/select2.min.css">

<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Departamentos</a></li>
    <li  class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=departamentos&a=index">Listado de Departamentos</a></li>
    <li class="breadcrumb-item active"><?php echo  ($Departamento->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">
    <h4 class="text-primary">Mantenimiento de Departamentos</h4>
    
    <form id="frm-departamentos" action="?c=departamentos&a=Save" method="post" enctype="multipart/form-data" class="form-control">

    <div class="container-fluid">

        <input type="hidden" name="Id" id="Id" value="<?php echo $Departamento->Id; ?>" />
        <input type="hidden" name="Estado" id="Estado" value="<?php echo ($Departamento->Id != null) ? $Departamento->Estado : 1 ?>" >

        <div class="form-group">
            <label for="Descripcion"><b>Nombre:</b></label>
            <input type="text" name="Descripcion" value="<?php echo $Departamento->Descripcion; ?>" class="form-control" placeholder="Ingrese el nombre" data-validacion-tipo="requerido|min:3" />
        </div>

        <div class="form-group col-md-12">
            <?php if($Departamento->Id != null){?>
                <button type="submit" class="btn btn-warning">Actualizar <i class="fa fa-refresh"></i> </button>
                <input type="checkbox"  data-toggle="toggle" id="EstadoToogle" data-on="Estado" data-off="InEstado" data-onstyle="success" data-offstyle="danger" data-onstyle="danger" data-style="ios">
            <?php }else {?>
                <button type="submit"  class="btn btn-success">Guardar <i class="fa fa-save"></i> </button>
            <?php }?>
         </div>
    </div>

    </form>

</div>


<script>
    $(".select2").select2();

    $(document).ready(function(){
        $("#frm-departamentos").submit(function(){
            return $(this).validate();
        });

        var SucursalID = "<?php echo ($Departamento->SucursalID != null) ? $Departamento->SucursalID : "" ?>";
        $("#SucursalID").val(SucursalID).trigger('change');

    });
</script>

<script>


    $(function() {

        if($("#Estado").val() > 0){
            $('#EstadoToogle').bootstrapToggle('on');
        }else{
            $('#EstadoToogle').bootstrapToggle('off');
        }


        $('#EstadoToogle').change(function() {

            if($(this).prop('checked') == false){

                swal({
                    title: 'Registro Eliminado',
                    text: 'Presione Actualizar para eliminar el registro',
                    type: 'error',
                    timer: 5000,
                    buttonsStyling: true
                });
            }
            $("#Estado").val(($(this).prop('checked')) == false ? 0 : 1);
        })
    })


</script>

