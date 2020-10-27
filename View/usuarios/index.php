<a href="?c=usuarios&a=Edit" class="btn btn-primary">Crear Usuario <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoUsuarios" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>

        <th>#</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Telefono</th>
        <th>Correo</th>
        <th>Rol</th>
        <th>Estado</th>
        <th></th>
    </tr>
    </thead>

</table>

<script>

$(document).ready(function() {

    $('#ListadoUsuarios').DataTable({
        "responsive": true,
            "ajax": {
                "url": "index.php?c=usuarios&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Nombre"},
            {data: "Apellido"},
            {data: "Telefono"},
            {data: "Correo"},
            {data: "Rol"},
            {data: "Estado"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":7,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="index.php?c=usuarios&a=Edit&Id='+data+'"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        },{
                "targets": 6,
                "data": "Estado",
                "render": function (data) {
                    return (data) == 1 ? '<button type="button" class="btn btn-sm btn-success btn-circle waves-effect waves-light"> <i class="ti-check"></i> </button>': '<button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button>';
         }}]
    });

});
</script>
