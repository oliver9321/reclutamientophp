<a href="?c=mant_sucursales&a=Edit" class="btn btn-primary">Crear Sucursal <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoSucursales" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>

        <th>#</th>
        <th>Código</th>
        <th>Sucursal</th>
        <th>Descripción</th>
        <th>Teléfono</th>
        <th>Dirección</th>
        <th>Empresa</th>
        <th>Activo</th>
        <th>Modificar</th>
    </tr>
    </thead>

</table>

<script>

$(document).ready(function() {

    $('#ListadoSucursales').DataTable({
        "responsive": true,
        "ajax": {
                "url": "index.php?c=mant_sucursales&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Codigo"},
            {data: "Nombre"},
            {data: "Descripcion"},
            {data: "Telefono"},
            {data: "Direccion"},
            {data: "Empresa"},
            {data: "Activo"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":8,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="index.php?c=mant_sucursales&a=Edit&Id='+data+'" aria-label="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        },{
            "targets": 7,
            "data": "Activo",
            "render": function (data) {
                    return (data) == 1 ? '<button type="button"  class="activo btn btn-sm btn-success btn-circle waves-effect waves-light"> <i class="ti-check"></i> </button>': '<button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button>';
         }}]
    });

});

</script>
