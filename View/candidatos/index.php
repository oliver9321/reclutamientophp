<a href="?c=candidatos&a=Edit" class="btn btn-primary">Crear Candidato <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoCandidatos" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>
        <th>#</th>
        <th>Candidato</th>
        <th>Cedula</th>
        <th>Puesto</th>
        <th>Departamento</th>
        <th>Salario Aspira</th>
        <th>Recomendado Por</th>
        <th>Usuario Login</th>
        <th>Estado</th>
        <th></th>
    </tr>
    </thead>

</table>

<script>

$(document).ready(function() {

    $('#ListadoCandidatos').DataTable({
        "responsive": true,
            "ajax": {
                "url": "index.php?c=candidatos&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Nombre"},
            {data: "Cedula"},
            {data: "Puesto"},
            {data: "Departamento"},
            {data: "SalarioAspira"},
            {data: "RecomendadoPor"},
            {data: "UsuarioId"},
            {data: "Estado"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":8,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="index.php?c=candidatos&a=Edit&Id='+data+'"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        },{
                "targets": 7,
                "data": "Estado",
                "render": function (data) {
                    return (data) == 1 ? '<button type="button" class="btn btn-sm btn-success btn-circle waves-effect waves-light"> <i class="ti-check"></i> </button>': '<button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button>';
         }}]
    });

});
</script>
