<link rel="stylesheet" href="vendor/select2/select2.css">

<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Usuarios</a></li>
    <li  class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=usuarios&a=index">Listado de Usuarios</a></li>
    <li class="breadcrumb-item active"><?php echo  ($Usuario->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">

    <h4 class="text-primary">Mantenimiento de Usuarios</h4>
    <p class="font-90 text-muted mb-1 text-bold">Administracion de Sistema</p>
    <hr>
    <form id="frm-usuarios" name="frm-usuario"  method="post" action="?c=usuarios&a=Save" class="form-control">

        <div class="container-fluid">

            <input type="hidden" name="Id" id="Id" value="<?php echo $Usuario->Id; ?>" />
            <input type="hidden" name="Estado" id="Estado" value="<?php echo ($Usuario->Id != null) ? $Usuario->Estado : 1 ?>" >
            <br>
            <div class="form-group col-md-6">
                <label for="Nombre"><b>Nombre:</b></label>
                <input type="text" name="Nombre" value="<?php echo $Usuario->Nombre; ?>" class="form-control" placeholder="Nombre de la persona" data-validacion-tipo="requerido|min:3" />
            </div>

            <div class="form-group col-md-6">
                <label for="Apellido"><b>Apellido:</b></label>
                <input type="text" name="Apellido" value="<?php echo $Usuario->Apellido; ?>" class="form-control" placeholder="Apellido de la persona" data-validacion-tipo="requerido|min:3" />
            </div>

            <div class="form-group col-md-6">
                <label for="Correo"><b>Correo:</b></label>
                <input type="Correo" name="Correo" value="<?php echo $Usuario->Correo; ?>" class="form-control" placeholder="Correo@dominio.com"/>
            </div>

            <div class="form-group col-md-6">
                <label for="Telefono"><b>Telefono:</b></label>
                <input type="text" name="Telefono" value="<?php echo $Usuario->Telefono; ?>" class="form-control" placeholder="000-000-0000"/>
            </div>

            <div class="form-group col-md-3">
                <label  class="text-danger" for="Clave"><b>Clave (login):</b></label>
                <input type="Clave" name="Clave" id="Clave" value="<?php echo $Usuario->Clave; ?>" class="form-control" placeholder="Clave (login)" data-validacion-tipo="requerido|min:5" />
                <span class="glyphicon glyphicon-eye-open"></span>
            </div>

            <div class="form-group col-md-3">
                <label class="text-danger"><b>Confirmar Clave (login):</b></label>
                <input type="Clave"  id="ConfirmClave" class="form-control" placeholder="Confirmar Clave (login)" data-validacion-tipo="requerido|min:5" />
            </div>

            <div class="form-group col-md-6">
                <label for="Rol"><b>Roles:</b></label>
                <select id="Rol" name="Rol" class="form-control">
                    <option value="">Seleccione el rol del usuario</option>
                    <option value="Admin">Admin</option>
                    <option value="Candidato">Candidato</option>
                    <option value="Empleado">Empleado</option>
                </select>
            </div>

        <div class="form-group col-md-12">
            <hr>
            <?php if($Usuario->Id != null){?>
                <button type="submit"   class="btn btn-warning">Actualizar <i class="fa fa-refresh"></i> </button>
                <input type="checkbox"  data-toggle="toggle" id="EstadoToogle" data-on="Estado" data-off="InEstado" data-onstyle="success" data-offstyle="danger" data-onstyle="danger" data-style="ios">
            <?php }else {?>
                <button type="submit"   class="btn btn-success">Guardar <i class="fa fa-save"></i> </button>
            <?php }?>
         </div>
        </div>

    </form>

    </div>

<script type="text/javascript" src="vendor/js/forms-upload.js"></script>
<script type="text/javascript" src="vendor/switchery/dist/switchery.min.js"></script>
<script type="text/javascript" src="vendor/js/select2.full.min.js"></script>
<script type="text/javascript" src="vendor/js/jquery.multi-select.js"></script>
<script>

    $('.select2').select2();

    if($("#Id").val() != null){

        var Rol = "<?php echo ($Usuario->Rol != null) ? $Usuario->Rol : "" ?>";
        $("#Rol").val(Rol).trigger("change");

        $("#ConfirmClave").val($("#Clave").val());
    }

</script>

<script>

    $(document).ready(function(){

            if($("#Id").val() != null){
                $("#ConfirmClave").val($("#Clave").val())
            }

            $("#frm-usuarios").submit(function(){
                return $(this).validate();
            });

        $("#Clave").focus(function(){
            this.type = "text";
        }).blur(function(){
            this.type = "Clave";
        });

        $("#ConfirmClave").focus(function(){
            this.type = "text";
        }).blur(function(){
            this.type = "Clave";
        });

        });

</script>

<script>
    $(function() {

        if($("#Estado").val() > 0){
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
            $("#Estado").val(($(this).prop('checked')) == false ? 0 : 1);
        });
    })
</script>

