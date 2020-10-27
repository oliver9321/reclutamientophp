<link rel="stylesheet" href="vendor/select2/select2.css">

<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Puestos</a></li>
    <li  class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=puestos&a=index">Listado de Puestos</a></li>
    <li class="breadcrumb-item active"><?php echo  ($Puesto->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">

    <h4 class="text-primary">Gestion de Puestos</h4>
    <hr>

     <form id="frm-puestos" action="?c=puestos&a=Save" method="post" enctype="multipart/form-data" class="form-control">

        <div class="container-fluid">
        <input type="hidden" name="Id" id="Id" value="<?php echo $Puesto->Id; ?>" />
        <input type="hidden" name="Estado" id="Estado" value="<?php echo ($Puesto->Id != null) ? $Puesto->Estado : 1 ?>" >

        <div class="form-group">
            <label for="Nombre"><b>Puesto:</b></label>
            <input type="text" name="Nombre" value="<?php echo $Puesto->Nombre; ?>" class="form-control" placeholder="Asigne un Nombre al puesto"/>
        </div>


        <div class="form-group">
            <label for="cmbDepartamento"><b>Departamentos:</b></label>
            <select id="DepartamentoId" name="DepartamentoId" class="form-control select2" style="width: 100%">
                <option value="">Seleccione el departamento al que pertenece el puesto</option>
                <?php foreach($DepartamentoList as $a): ?>
                    <option value="<?php echo $a->Id; ?>"><?php echo $a->Descripcion; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="NivelRiesgo"><b>Nivel de riesgo:</b></label>
            <select id="NivelRiesgo" name="NivelRiesgo" class="form-control" style="width: 100%">
                <option value="">Seleccione el nivel de riesgo</option>
                <option value="Alto">Alto</option>
                <option value="Medio">Medio</option>
                <option value="Bajo">Bajo</option>
            </select>
        </div>

        <div class="form-group">
            <label for="NivelMinimoSalario"><b>Nivel minimo de salario:</b></label>
            <input type="number" name="NivelMinimoSalario"  id="NivelMinimoSalario" value="<?php echo $Puesto->NivelMinimoSalario; ?>" class="form-control" placeholder="00000" />
        </div>

        <div class="form-group">
            <label for="NivelMaximoSalario"><b>Nivel maximo de salario:</b></label>
            <input type="number" name="NivelMaximoSalario"  id="NivelMaximoSalario" value="<?php echo $Puesto->NivelMaximoSalario; ?>" class="form-control"  placeholder="00000" />
        </div>


        <div class="form-group col-md-12">
            <hr>
            <?php if($Puesto->Id != null){?>
                <button type="submit" class="btn btn-warning">Actualizar <i class="fa fa-refresh"></i> </button>
                <input type="checkbox"  data-toggle="toggle" id="ActivoToogle" data-on="Estado" data-off="Inactivo" data-onstyle="success" data-offstyle="danger" data-onstyle="danger" data-style="ios">
            <?php }else {?>
                <button type="submit"  class="btn btn-success">Guardar <i class="fa fa-save"></i> </button>
            <?php }?>
         </div>
    </div>

    </form>


</div>
<link rel="stylesheet" href="vendor/select2/select2.js">

<script type="text/javascript">

    $(document).ready(function(){

        $('.select2').select2();

        if($("#Id").val() != null) {
            var DepartamentoId = "<?php echo ($Puesto->DepartamentoId != null) ? $Puesto->DepartamentoId : "" ?>";
            $("#DepartamentoId").val(DepartamentoId).trigger('change');

            var NivelRiesgo = "<?php echo ($Puesto->NivelRiesgo != null) ? $Puesto->NivelRiesgo : "" ?>";
            $("#NivelRiesgo").val(NivelRiesgo).trigger('change');
        }

        $("#frm-puestos").submit(function(){
            return $(this).validate();
        });

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

    });
</script>


