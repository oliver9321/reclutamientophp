<style>
    .toggle.ios, .toggle-on.ios, .toggle-off.ios { border-radius: 20px; }
    .toggle.ios .toggle-handle { border-radius: 20px; }
</style>

<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Sucursales</a></li>
    <li  class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=mant_sucursales&a=index">Listado</a></li>
    <li class="breadcrumb-item active"><?php echo  ($Sucursal->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">

    <h4 class="text-primary">Mantenimiento de Sucursales</h4>
    <p class="font-90 text-muted mb-1 text-bold">Administración de Sistema</p>
    <hr>
     <form id="frm-sucursales" action="?c=mant_sucursales&a=Save" method="post" enctype="multipart/form-data" class="form-control">

     <div class="container-fluid">

        <input type="hidden" name="Id" id="Id" value="<?php echo $Sucursal->Id; ?>" />
        <input type="hidden" name="Activo" id="Activo" value="<?php echo ($Sucursal->Id != null) ? $Sucursal->Activo : 1 ?>" >


        <div class="form-group">
            <label for="cmbEmpresa"><b>Empresa:</b></label>
        <select id="EmpresaID" name="EmpresaID" class="form-control">
            <option value="" selected>Seleccione la empresa a la que pertenece la sucursal</option>
            <?php foreach($Empresa as $a): ?>
                  <option value="<?php echo $a->Id; ?>"><?php echo $a->Nombre; ?></option>
            <?php endforeach; ?>
        </select>
        </div>


        <div class="form-group">
            <label for="Codigo"><b>Código:</b></label>
            <input type="text" name="Codigo" value="<?php echo $Sucursal->Codigo; ?>" class="form-control" placeholder="Asignar un código a la sucursal" data-validacion-tipo="requerido|min:3" />
        </div>


        <div class="form-group">
            <label for="Nombre"><b>Nombre (Sucursal):</b></label>
            <input type="text" name="Nombre" value="<?php echo $Sucursal->Nombre; ?>" class="form-control" placeholder="Nombre de la sucursal" data-validacion-tipo="requerido|min:6" />
        </div>

         <div class="form-group">
             <label for="Telefono"><b>Teléfono:</b></label>
             <input type="text" name="Telefono" data-mask="(999) 999-9999" value="<?php echo $Sucursal->Telefono; ?>" class="form-control" placeholder="Ingrese el Telefono de la empresa" data-validacion-tipo="requerido|min:3" />
         </div>

         <div class="form-group">
            <label for="Direccion"><b>Dirección:</b></label>
            <textarea name="Direccion" class="form-control"><?php echo htmlspecialchars($Sucursal->Direccion); ?></textarea>
        </div>


        <div class="form-group">
            <label for="Descripcion"><b>Descripción:</b></label>
            <textarea name="Descripcion" class="form-control"><?php echo htmlspecialchars($Sucursal->Descripcion); ?></textarea>
        </div>


        <div class="form-group col-md-12">
            <?php if($Sucursal->Id != null){?>
                <button type="submit" class="btn btn-warning">Actualizar <i class="fa fa-refresh"></i> </button>
                <input type="checkbox"  data-toggle="toggle" id="ActivoToogle" data-on="Activo" data-off="Inactivo" data-onstyle="success" data-offstyle="danger" data-onstyle="danger" data-style="ios">
            <?php }else {?>
                <button type="submit"  class="btn btn-success">Guardar <i class="fa fa-save"></i> </button>
            <?php }?>
         </div>
    </div>

    </form>

</div>


<script type="text/javascript" src="vendor/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script type="text/javascript" src="vendor/autoNumeric/autoNumeric-min.js"></script>
<script type="text/javascript" src="vendor/js/forms-masks.js"></script>


<script>
    $(document).ready(function(){
        $("#frm-sucursales").submit(function(){
            return $(this).validate();
        });

        var EmpresaID = "<?php echo ($Sucursal->EmpresaID != null) ? $Sucursal->EmpresaID : "" ?>";
        $("#EmpresaID").prop("selectedIndex",EmpresaID);
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

