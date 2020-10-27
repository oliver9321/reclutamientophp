
<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Empresa</a></li>
    <li class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=mant_empresa&a=index">Listado</a></li>
    <li class="breadcrumb-item"><?php echo  ($Empresa->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">
    <h4 class="text-primary">Mantenimiento de Empresa</h4>
    <p class="font-90 text-muted mb-1">Administracion de Sistema</p>
    <hr>

     <form id="frm-empresa" action="?c=mant_empresa&a=Save" method="post" enctype="multipart/form-data" class="form-horizontal">

         <div class="container-fluid">
            <input type="hidden" name="Id" id="Id" value="<?php echo $Empresa->Id; ?>" />
             <input type="hidden" name="Activo" id="Activo" value="<?php echo ($Empresa->Id != null) ? $Empresa->Activo : 1 ?>" >

             <div class="form-group col-md-6">
            <label for="Codigo"><b>Código:</b></label>
            <input type="text" name="Codigo" value="<?php echo $Empresa->Codigo; ?>" class="form-control" placeholder="Ingrese el código de la empresa" data-validacion-tipo="requerido|min:3" />
        </div>

        <div class="form-group col-md-6">
            <label for="Rnc"><b>RNC:</b></label>
            <input type="text" name="Rnc" value="<?php echo $Empresa->Rnc; ?>" class="form-control" placeholder="Ingrese el Rnc de la empresa" data-validacion-tipo="requerido|min:3" />
        </div>

        <div class="form-group col-md-6">
            <label for="Nombre"><b>Nombre (Empresa):</b></label>
            <input type="text" name="Nombre" value="<?php echo $Empresa->Nombre; ?>" class="form-control" placeholder="Ingrese el nombre de la empresa" data-validacion-tipo="requerido|min:3" />
        </div>

        <div class="form-group col-md-6">
            <label for="Telefono"><b>Teléfono:</b></label>
            <input type="text" name="Telefono" data-mask="(999) 999-9999" value="<?php echo $Empresa->Telefono; ?>" class="form-control" placeholder="Ingrese el Telefono de la empresa" data-validacion-tipo="requerido|min:3" />
        </div>

        <div class="form-group col-md-6">
            <label for="Direccion"><b>Dirección:</b></label>
            <textarea name="Direccion" class="form-control"><?php echo htmlspecialchars($Empresa->Direccion); ?></textarea>
        </div>


        <div class="form-group col-md-6">
            <label for="Descripcion"><b>Descripción:</b></label>
            <textarea name="Descripcion" class="form-control"><?php echo htmlspecialchars($Empresa->Descripcion); ?></textarea>
        </div>


        <div class="form-group col-md-6">
            <label for="LogoGrande"><b>Logo Grande:</b></label>
            <input type="file"  name="LogoGrande" id="input-file-now-custom-2" class="dropify" data-height="80" value="<?php echo $Empresa->LogoGrande; ?>" data-default-file="uploads/<?php echo  $Empresa->LogoGrande?>"/>
            <input type="hidden" name="LogoGrande" value="<?php echo $Empresa->LogoGrande; ?>"/>
        </div>


        <div class="form-group col-md-6">
            <label for="LogoPeq"><b>Logo Pequeño:</b></label>
            <input type="file"  name="LogoPeq" id="input-file-now-custom-2" class="dropify" data-height="80" value="<?php echo $Empresa->LogoPeq; ?>"   data-default-file="uploads/<?php echo  $Empresa->LogoPeq?>"/>
            <input type="hidden" name="LogoPeq" value="<?php echo $Empresa->LogoPeq; ?>"/>
        </div>


        <div class="form-group col-md-12">
            <hr>
            <?php if($Empresa->Id != null){?>
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
<script type="text/javascript" src="vendor/js/forms-upload.js"></script>
<script type="text/javascript" src="vendor/switchery/dist/switchery.min.js"></script>

<script>
    $(document).ready(function(){
        $("#frm-empresa").submit(function(){
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

