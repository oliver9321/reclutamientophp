<a href="?c=mant_prioridad_turnos&a=Edit" class="btn btn-primary">Crear Prioridad <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoPrioridadesTurnos" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>

        <th>#</th>
        <th>Nivel</th>
        <th>Prioridad</th>
        <th>Activo</th>
        <th>Modificar</th>
    </tr>
    </thead>

</table>

<script>
$(document).ready(function() {

    $('#ListadoPrioridadesTurnos').DataTable({
        "responsive": true,
            "ajax": {
                "url": "index.php?c=mant_prioridad_turnos&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Nivel"},
            {data: "Prioridad"},
            {data: "Activo"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":4,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="?c=mant_prioridad_turnos&a=Edit&Id='+data+'" aria-label="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
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
