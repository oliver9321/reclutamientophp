<a href="?c=mant_botones_turnos&a=Edit" class="btn btn-primary">Crear Botón (Turno) <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoBotonesTurnos" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>

        <th>#</th>
        <th>Boton</th>
        <th>Icono</th>
        <th>Color</th>
        <th>Texto Grande</th>
        <th>Texto Pequeño</th>
        <th>Valor</th>
        <th>Tipo</th>
        <th>Logo</th>
        <th>Activo</th>
        <th>Modificar</th>
    </tr>
    </thead>

</table>

<script>
$(document).ready(function() {

    $('#ListadoBotonesTurnos').DataTable({
        "responsive": true,
            "ajax": {
                "url": "index.php?c=mant_botones_turnos&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Nombre"},
            {data: "Icono"},
            {data: "Color"},
            {data: "TextoGraMostrar"},
            {data: "TextoPeqMostrar"},
            {data: "ValorBoton"},
            {data: "TipoBoton"},
            {data: "Logo"},
            {data: "Activo"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":10,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="index.php?c=mant_botones_turnos&a=Edit&Id='+data+'" aria-label="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        },{
            "targets": 2,
            "data": "Icono",
            "render": function (data) {
                return (data) != null ? '<i class="'+data+'"></i>' : 'No Icon';
            }},
            {
                "targets": 3,
                "data": "Color",
                "render": function (data) {
                    return (data) != null ? '<div class="bg-'+data+' mb-0-5" style="height: 20px;"></div>' : 'No Color';
             }},{
            "targets": 8,
            "data": "Logo",
            "render": function (data) {
                return (data) != null ? '<img src="uploads/'+data+'" style="width:50px;" />' : 'No Image';
            }},{
                "targets": 9,
                "data": "Activo",
                "render": function (data) {
                    return (data) == 1 ? '<button type="button" class="btn btn-sm btn-success btn-circle waves-effect waves-light"> <i class="ti-check"></i> </button>': '<button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button>';
         }}]
    });

});
</script>
