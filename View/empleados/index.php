<a href="?c=empleados&a=Edit" class="btn btn-primary">Crear Empleado <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="Listadoempleados" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>
        <th>#</th>
        <th>Puesto</th>
        <th>Departamento</th>
        <th>Candidato</th>
        <th>Cedula</th>
        <th>Estado</th>
        <th></th>
    </tr>
    </thead>

</table>

<script>

$(document).ready(function() {

    $('#Listadoempleados').DataTable({
        "responsive": true,
            "ajax": {
                "url": "index.php?c=empleados&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Puesto"},
            {data: "Departamento"},
            {data: "Candidato"},
            {data: "Cedula"},
            {data: "Estado"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":6,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="index.php?c=empleados&a=Edit&Id='+data+'"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        },{
                "targets": 5,
                "data": "Estado",
                "render": function (data) {
                    return (data) == 1 ? '<button type="button" class="btn btn-sm btn-success btn-circle waves-effect waves-light"> <i class="ti-check"></i> </button>': '<button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button>';
         }}]
    });

});
</script>
