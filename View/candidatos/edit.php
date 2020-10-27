<link rel="stylesheet" href="vendor/select2/select2.min.css">

<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Departamentos</a></li>
    <li  class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=mant_departamentos&a=index">Listado de Departamentos</a></li>
    <li class="breadcrumb-item active"><?php echo  ($Departamento->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">
    <h4 class="text-primary">Mantenimiento de Departamentos</h4>
    <p class="font-90 text-muted mb-1 text-bold">Administracion de Sistema</p>

     <form id="frm-departamentos" action="?c=mant_departamentos&a=Save" method="post" enctype="multipart/form-data" class="form-control">

    <div class="container-fluid">

        <input type="hidden" name="Id" id="Id" value="<?php echo $Departamento->Id; ?>" />
        <input type="hidden" name="Activo" id="Activo" value="<?php echo ($Departamento->Id != null) ? $Departamento->Activo : 1 ?>" >

        <div class="form-group">
            <label for="cmbSucursal"><b>Sucursal:</b></label>
            <select id="SucursalID" name="SucursalID" class="form-control select2">
                <option value="" selected>Seleccione la sucursal a la que pertenece el departamento</option>
                <?php foreach($Sucursal as $a): ?>
                    <option value="<?php echo $a->Id; ?>"><?php echo $a->Nombre; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="Codigo"><b>Código:</b></label>
            <input type="text" name="Codigo" value="<?php echo $Departamento->Codigo; ?>" class="form-control" placeholder="Ingrese el código del departamento" data-validacion-tipo="requerido|min:3" />
        </div>


        <div class="form-group">
            <label for="Nombre"><b>Nombre (Departamento):</b></label>
            <input type="text" name="Nombre" value="<?php echo $Departamento->Nombre; ?>" class="form-control" placeholder="Ingrese el nombre del departamento" data-validacion-tipo="requerido|min:5" />
        </div>


        <div class="form-group">
            <label for="Descripcion"><b>Descripción:</b></label>
            <textarea name="Descripcion" class="form-control"><?php echo htmlspecialchars($Departamento->Descripcion); ?></textarea>
        </div>


        <div class="form-group col-md-12">
            <?php if($Departamento->Id != null){?>
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

