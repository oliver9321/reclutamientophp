<link rel="stylesheet" href="vendor/select2/select2.min.css">
<link rel="stylesheet" type="text/css" href="vendor/select2/multi-select.css">

<ul class="breadcrumb no-bg mb-1">
    <li class="breadcrumb-item"><i class="fa fa-home"></i> <a href="#">Candidatos</a></li>
    <li  class="breadcrumb-item"><i class="fa fa-list-ul"></i> <a href="?c=candidatos&a=index">Listado de candidatos</a></li>
    <li class="breadcrumb-item active"><?php echo  ($Candidatos->Id != null)  ? "Modificar Registro" : "Nuevo Registro" ?></li>
</ul>

<div class="box box-block bg-white">

    <h4 class="text-primary">Gestion de candidatos</h4>
    <hr>

    <form id="frm-candidatos" name="frm-candidatos"  method="post" action="?c=candidatos&a=Save" class="form-control">

        <div class="container-fluid">

            <input type="hidden" name="Id" id="Id" value="<?php echo $Candidatos->Id; ?>" />
            <input type="hidden" name="Estado" id="Estado" value="<?php echo ($Candidatos->Id != null) ? $Candidatos->Estado : 1 ?>" >
            <br>

            <div class="form-group col-md-6">
                <label for="Nombre"><b>Nombre:</b></label>
                <input type="text" name="Nombre" id="Nombre" value="<?php echo $Candidatos->Nombre; ?>" class="form-control"/>
            </div>

            <div class="form-group col-md-6">
                <label for="Cedula"><b>Cedula:</b></label>
                <input type="text" name="Cedula" id="Cedula" value="<?php echo $Candidatos->Cedula; ?>" class="form-control"/>
            </div>

            <div class="form-group col-md-6">
                <label for="PuestoId"><b>Puesto:</b></label>
                <select id="PuestoId" name="PuestoId" class="form-control select2" style="width: 100%">
                    <option value="" selected>Seleccione el puesto</option>
                    <?php foreach($PuestosArray as $a): ?>
                        <option value="<?php echo $a->Id; ?>"><?php echo $a->Puesto; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group col-md-6">
                <label for="SalarioAspira"><b>Salario aspira:</b></label>
                <input type="number" name="SalarioAspira" id="SalarioAspira" value="<?php echo $Candidatos->SalarioAspira; ?>" class="form-control"/>
            </div>

            <div class="form-group col-md-6">
                <label for="RecomendadoPor"><b>Recomendado Por:</b></label>
                <input type="text" name="RecomendadoPor" id="RecomendadoPor" value="<?php echo $Candidatos->RecomendadoPor; ?>" class="form-control"/>
            </div>


        <div class="form-group col-md-12">
            <hr>
            <?php if($Candidatos->Id != null){?>
                <button type="submit"   class="btn btn-warning">Actualizar <i class="fa fa-refresh"></i> </button>
                <input type="checkbox"  data-toggle="toggle" id="ActivoToogle" data-on="Estado" data-off="Inactivo" data-onstyle="success" data-offstyle="danger" data-onstyle="danger" data-style="ios">
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

<script>

    $('.select2').select2();

    if($("#Id").val() != null){
        var PuestoId = "<?php echo ($Candidatos->PuestoId != null) ? $Candidatos->PuestoId : "" ?>";
        $("#PuestoId").val(PuestoId).trigger("change");
    }
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
        })
    })


</script>

