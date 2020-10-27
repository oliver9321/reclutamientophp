<a href="?c=puestos&a=Edit" class="btn btn-primary">Crear Puesto <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoPuestos" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>

        <th>#</th>
        <th>Departamento</th>
        <th>Puesto</th>
        <th>Nivel Riesgo</th>
        <th>Nivel Minimo Salario</th>
        <th>Nivel Maximo Salario</th>
        <th>Estado</th>
        <th>Modificar</th>
    </tr>
    </thead>

</table>


<script>
$(document).ready(function() {

    $('#ListadoPuestos').DataTable({
        "responsive": true,
            "ajax": {
                "url": "index.php?c=puestos&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Departamento"},
            {data: "Puesto"},
            {data: "NivelRiesgo"},
            {data: "NivelMinimoSalario"},
            {data: "NivelMaximoSalario"},
            {data: "Estado"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":7,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="index.php?c=puestos&a=Edit&Id='+data+'" aria-label="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
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
