
<a href="?c=nivelcapacitaciones&a=Edit" class="btn btn-primary">Crear Nivel <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoNivelCapacitacion" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
        <tr>
            <th>#</th>
            <th>Nivel</th>
            <th>Estado</th>
            <th>Modificar</th>
        </tr>
    </thead>
</table>

<script>
$(document).ready(function() {

    $('#ListadoNivelCapacitacion').DataTable({
        "responsive": true,
            "ajax": {
                "url": "index.php?c=nivelcapacitaciones&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Descripcion"},
            {data: "Estado"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":3,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="index.php?c=nivelcapacitaciones&a=Edit&Id='+data+'" aria-label="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        },{
                "targets": 2,
                "data": "Estado",
                "render": function (data) {
                    return (data) == 1 ? '<button type="button" class="btn btn-sm btn-success btn-circle waves-effect waves-light"> <i class="ti-check"></i> </button>': '<button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button>';
         }}]
    });

});
</script>
