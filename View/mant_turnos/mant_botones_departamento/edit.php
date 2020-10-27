<link rel="stylesheet" href="vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="vendor/select2/multi-select.css">


<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Botones por Departamento</a></li>
    <li  class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=mant_botones_departamento&a=index">Listado de Botones por Departamento</a></li>
    <li class="breadcrumb-item active"><?php echo  ($BotonDept->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">

    <h4 class="text-primary">Mantenimiento de Botones (Turnos) por Departamento</h4>
    <p class="font-90 text-muted mb-1 text-bold">Administracion de Sistema</p>

    <hr>

    <form id="frm-botones-departamento" name="frm-botones-departamento"  method="post" action="?c=mant_botones_departamento&a=Save" class="form-control"  enctype="multipart/form-data">

        <div class="container-fluid">

            <input type="hidden" name="Id" id="Id" value="<?php echo $BotonDept->Id; ?>" />
            <input type="hidden" name="Activo" id="Activo" value="<?php echo ($BotonDept->Id != null) ? $BotonDept->Activo : 1 ?>" >
            <br>

            <div class="form-group col-md-12">
                <label for="cmbPuestoID"><b>Botones (Turnos):</b></label>
                <select id="BotonTurnoID" name="BotonTurnoID" class="form-control select2">
                    <option value="">Seleccione un boton (turno)</option>
                    <?php foreach($BotonesArray as $a): ?>
                        <option value="<?php echo $a->Id; ?>"><?php echo $a->Nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-12">
                <label for="cmbPuestoID"><b>Departamentos:</b></label>
                <select id="DepartamentoID" name="DepartamentoID[]" class="form-control multiple" multiple="multiple">
                    <?php foreach($DepartamentosArray as $a): ?>
                        <option value="<?php echo $a->Id; ?>"><?php echo $a->Nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


        <div class="form-group col-md-12">
            <hr>
            <?php if($BotonDept->Id != null){?>
                <button type="submit"   class="btn btn-warning">Actualizar <i class="fa fa-refresh"></i> </button>
                <input type="checkbox"  data-toggle="toggle" id="ActivoToogle" data-on="Activo" data-off="Inactivo" data-onstyle="success" data-offstyle="danger" data-onstyle="danger" data-style="ios">
            <?php }else {?>
                <button type="submit"   class="btn btn-success">Guardar <i class="fa fa-save"></i> </button>
            <?php }?>
         </div>
        </div>

    </form>

    </div>

<script type="text/javascript" src="vendor/js/select2.full.min.js"></script>
<script type="text/javascript" src="vendor/js/jquery.multi-select.js"></script>

<script>

    $('.select2').select2();
    $('.multiple').multiSelect();

    if($("#Id").val() != null){

        var BotonTurnoID = "<?php echo ($BotonDept->BotonTurnoID != null) ? $BotonDept->BotonTurnoID : "" ?>";
        $("#BotonTurnoID").val(BotonTurnoID).trigger("change");

        var ar = <?php echo json_encode($DepartamentosByBoton) ?>;
        $(".multiple").val(ar);
        $(".multiple").multiSelect("refresh");



    }

</script>


<script>

    $(document).ready(function(){

            $("#frm-usuarios").submit(function(){
                return $(this).validate();
            });

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

