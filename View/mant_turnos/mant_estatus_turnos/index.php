<a href="?c=mant_estatus_turnos&a=Edit" class="btn btn-primary">Crear Estatus (Turno) <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoEstatusTurnos" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>

        <th>#</th>
        <th>Estatus</th>
        <th>Descripción</th>
        <th>Activo</th>
        <th>Modificar</th>
    </tr>
    </thead>

</table>

<script>
$(document).ready(function() {

    $('#ListadoEstatusTurnos').DataTable({
        "responsive": true,
            "ajax": {
                "url": "index.php?c=mant_estatus_turnos&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Estatus"},
            {data: "Descripcion"},
            {data: "Activo"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":4,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="index.php?c=mant_estatus_turnos&a=Edit&Id='+data+'" aria-label="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        },{
                "targets": 3,
                "data": "Activo",
                "render": function (data) {
                    return (data) == 1 ? '<button type="button" class="btn btn-sm btn-success btn-circle waves-effect waves-light"> <i class="ti-check"></i> </button>': '<button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button>';
         }}]
    });

});
</script>
