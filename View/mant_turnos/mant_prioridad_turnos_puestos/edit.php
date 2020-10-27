<link rel="stylesheet" href="vendor/select2/select2.min.css">

<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Asignar Prioridad Turno  Puesto</a></li>
    <li  class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=mant_prioridad_turnos_puestos&a=index">Listado</a></li>
    <li class="breadcrumb-item active"><?php echo  ($this->model->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">

    <h4 class="text-primary">Mantenimiento de Prioridades Turnos a Puestos</h4>
    <p class="font-90 text-muted mb-1 text-bold">Administración de Sistema</p>

    <hr>

     <form id="frm-prioridad-turno-puesto" action="?c=mant_prioridad_turnos_puestos&a=Save" method="post" enctype="multipart/form-data" class="form-control">

        <div class="container-fluid">

        <input type="hidden" name="Id" id="Id" value="<?php echo $this->model->Id; ?>" />
        <input type="hidden" name="Activo" id="Activo" value="<?php echo ($this->model->Id != null) ? $this->model->Activo : 1 ?>" >

            <div class="form-group">
                <label for="cmbBotones"><b>Botones:</b></label>
                <select id="BotonTurnoID" name="BotonTurnoID" class="form-control select2">
                    <option value="" selected>Seleccione el botón (turno)</option>
                    <option value="0" selected>TODOS - Por orden de atención</option>
                    <?php foreach($Botones as $a): ?>
                        <option value="<?php echo $a->Id; ?>"><?php echo $a->Nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="cmbPrioridad"><b>Prioridad del Turno:</b></label>
                <select id="PrioridadID" name="PrioridadID" class="form-control select2">
                    <option value="" selected>Seleccione la prioridad del turno en el puesto</option>
                    <?php foreach($Prioridades as $a): ?>
                        <option value="<?php echo $a->Id; ?>"><?php echo $a->Prioridad; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


            <div class="form-group">
                <label for="cmbPuestos"><b>Puestos:</b></label>
                <select id="PuestoID" name="PuestoID" class="form-control select2">
                    <option value="" selected>Seleccione el puesto al que asignará el botón y prioridad</option>
                    <?php foreach($Puestos as $a): ?>
                        <option value="<?php echo $a->Id; ?>"><?php echo $a->Nombre; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>


        <div class="form-group col-md-12">
            <hr>
            <?php if($this->model->Id != null){?>
                <button type="submit" class="btn btn-warning">Actualizar <i class="fa fa-refresh"></i> </button>
                <input type="checkbox"  data-toggle="toggle" id="ActivoToogle" data-on="Activo" data-off="Inactivo" data-onstyle="success" data-offstyle="danger" data-onstyle="danger" data-style="ios">
            <?php }else {?>
                <button type="button" onclick="Submit()"  class="btn btn-success">Guardar <i class="fa fa-save"></i> </button>
            <?php }?>
         </div>
    </div>

    </form>
</div>
<br></br>
<script type="text/javascript" src="vendor/jquery/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="vendor/switchery/dist/switchery.min.js"></script>
<script type="text/javascript" src="vendor/js/select2.full.min.js"></script>

<script>

    $(".select2").select2();

    function Submit () {

        if($("#PuestoID").val() != '' && $("#PrioridadID").val() != '' && $("#BotonTurnoID").val() != ''){
            alert("campo obligaotio");
        }else{
            $("#frm-prioridad-turno-puesto").submit();
        }

    }

    $(document).ready(function(){

      /*  $("#frm-prioridad-turno-puesto").submit(function(){
            return $(this).validate();
        });*/

        var PrioridadID = "<?php echo ($this->model->PrioridadID != null) ? $this->model->PrioridadID : "" ?>";
        $("#PrioridadID").val(PrioridadID).change();

        var BotonTurnoID = "<?php echo ($this->model->BotonTurnoID != null) ? $this->model->BotonTurnoID : "" ?>";
        $("#BotonTurnoID").val(BotonTurnoID).change();

        var PuestoID = "<?php echo ($this->model->PuestoID != null) ? $this->model->PuestoID : "" ?>";
        $("#PuestoID").val(PuestoID).change();

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

