<a href="?c=mant_prioridad_turnos_puestos&a=Edit" class="btn btn-primary">Asignar Prioridad a Puesto <i class="fa fa-plus" aria-hidden="true"></i></a>
<hr>
<table id="ListadoPrioridadTurnosPuestos" width="100%" class="table table-striped table-bordered dataTable">
    <thead>
    <tr>

        <th>#</th>
        <th>Nivel</th>
        <th>Prioridad</th>
        <th>Boton (Turno)</th>
        <th>Puesto/Deptartamento/Sucursal</th>
        <th>Activo</th>
        <th>Modificar</th>
    </tr>
    </thead>
    <tfoot>
    <tr>
        <th></th>
        <th>Nivel</th>
        <th>Prioridad</th>
        <th>Boton (Turno)</th>
        <th>Puesto/Deptartamento/Sucursal</th>
        <th></th>
        <th></th>
    </tr>
    </tfoot>
</table>

<script>
$(document).ready(function() {

    var table = $('#ListadoPrioridadTurnosPuestos').DataTable({
        "responsive": true,
            "ajax": {
                "url": "index.php?c=mant_prioridad_turnos_puestos&a=View",
            },
        columns:[
            {data: "Id"},
            {data: "Nivel"},
            {data: "Prioridad"},
            {data: "BotonTurno"},
            {data: "PuestoCon"},
            {data: "Activo"},
            {data: "Id"}
        ],"columnDefs": [ {
            "targets":6,
            "data": "Editar",
            "render": function ( data) {
                return '<a class="btn btn-warning" href="?c=mant_prioridad_turnos_puestos&a=Edit&Id='+data+'" aria-label="Editar"> <i class="fa fa-pencil" aria-hidden="true"></i> </a>';
            }
        },{
                "targets": 5,
                "data": "Activo",
                "render": function (data) {
                    return (data) == 1 ? '<button type="button" class="btn btn-sm btn-success btn-circle waves-effect waves-light"> <i class="ti-check"></i> </button>': '<button type="button" class="btn btn-sm btn-danger btn-circle waves-effect waves-light"> <i class="ti-close"></i> </button>';
         }}]
    });

    $('#ListadoPrioridadTurnosPuestos tfoot th').each(function () {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Buscar ' + title + '" />');

    });

    table.columns().every(function () {
        var that = this;

        $('input', this.footer()).on('keyup change', function () {

            if (that.search() !== this.value) {
                that.search(this.value).draw();
            }

        });

    });

});
</script>
