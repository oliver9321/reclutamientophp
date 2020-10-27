var refreshIntervalId = "";
var Departamento = $("#Departamento").val();
var Puesto = $("#Puesto").val();
var EmpresaCodigo = $("#EmpresaCodigo").val();
var DepartamentoID = $("#DepartamentoID").val();

//Actualizar el estado de los turnos



$(".BtnAcciones").on("click", function() {

    var Estado = this.getAttribute("data-action");

    if ($("#TurnoIDEnAtencion").val() != "") {

        switch (Estado) {

            case 'A':

                if ($("#EstadoTurnoAtencion").val() == "L" || $("#EstadoTurnoAtencion").val() == "P") {
                    $("#TurnoParaAnular").html("");
                    $("#ComentarioAnulacion").html("");
                    $("#ComentarioAnulacion").val("");
                    var TurnoParaAnular = $("#TurnoEnAtencion").val();
                    $("#TurnoParaAnular").html(" [" + TurnoParaAnular + "]");
                    $(".ModalAnularTurno").modal("show");
                } else {
                    swal("Información del Sistema", "Para anular un turno debe estar en Llamada o en Puesto", "warning");
                }

                break;

            case 'L':

                if ($("#EstadoTurnoAtencion").val() == "L") {

                    if ($("#CantReLlamadas").val() < 4) {

                        ActualizarTurno(Estado);
                        toastr.options = { positionClass: 'toast-top-right' };
                        toastr.success('Llamada!');

                    } else {
                        swal("Información del Sistema", "Límite excedido de llamadas", "warning");
                    }

                } else {
                    swal("Información del Sistema", "Opción inválida en estos momentos", "warning");
                }

                break;

            case 'P':

                if ($("#EstadoTurnoAtencion").val() == "L") {

                    if (window.sessionStorage && window.localStorage) {

                        var storage = localStorage;
                        var TiempoUltimoPuesto = storage.getItem("TiempoUltimoPuesto");
                        var TiempoActuarPuesto = moment(new Date()).format('HH:mm:s');

                        if (TiempoUltimoPuesto == null) {

                            storage.setItem("TiempoUltimoPuesto", TiempoActuarPuesto);
                            ActualizarTurno(Estado);
                            toastr.options = { positionClass: 'toast-top-right' };
                            toastr.warning('En Puesto');

                        } else if (TiempoUltimoPuesto != null) {

                            var startTimePuesto = moment(TiempoUltimoPuesto, 'hh:mm:ss');
                            var endTimePuesto = moment(TiempoActuarPuesto, 'hh:mm:ss');
                            var diferenciaTiempoPuesto = endTimePuesto.diff(startTimePuesto, 'seconds');


                            if (diferenciaTiempoPuesto > 5) {
                                storage.setItem("TiempoUltimoPuesto", TiempoActuarPuesto);
                                ActualizarTurno(Estado);
                                toastr.options = { positionClass: 'toast-top-right' };
                                toastr.warning('En Puesto');
                            } else {
                                toastr.warning('Espere 5 segundos y vuelva a intentarlo');
                            }

                        }

                    }

                } else if ($("#EstadoTurnoAtencion").val() == "P") {

                    swal("Información del Sistema", "El turno ya se encuentra en Puesto", "warning");

                } else {

                    swal("Información del Sistema", "Opción inválida en estos momentos", "warning");
                }

                break;

            case 'F':

                if ($("#EstadoTurnoAtencion").val() == "P") {

                    ActualizarTurno(Estado);

                    toastr.options = { positionClass: 'toast-top-right' };
                    toastr.success('Turno Finalizado!');
                    PuestoEnEspera();

                } else {
                    swal("Información del Sistema", "Opción inválida en estos momentos", "warning");
                }
                break;

            default:
                swal("Información del Sistema", "Opción inválida en estos momentos", "warning");
                break;
        }

    } else {
        swal("Información del Sistema", "Opción inválida en estos momentos", "warning");
    }

})

//PuestoEnEspera
function PuestoEnEspera() {

    swal({
        title: 'Turno Finalizado',
        text: "Autollamar el próximo en 5s ",
        type: 'success',
        timer: 5000,
        showConfirmButton: true,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        confirmButtonClass: 'btn btn-primary btn-lg mr-1',
        confirmButtonText: 'Autollamar en 1 minuto',
        cancelButtonText: 'No, Manual!',
        cancelButtonClass: 'btn btn-danger btn-lg mr-1',
        cancelButtonText: 'No, Manual'
    }).then(function(isConfirm) {

        if (isConfirm === undefined) {
            $("#ContadorTurnoEspera").html("");
            $("#ContadorTiempoEspera").val("");
            $("#MostrarTurnoAtencion").html("");

            $("#BloqueBtnIniciar").hide();
            GenerarLlamadaTurno();

        } else if (isConfirm === true) {

            $("#BloqueBtnIniciar").hide();
            toastr.success('El sistema autollamará en 5s');
            setTimeout(function() { GenerarLlamadaTurno(); }, 60000);
            $("#MostrarTurnoAtencion").html("<b class='text-success'>SE AUTOLLAMARA EN 1 MIN</b>");

            var startTimestamp = moment().startOf("day");
            var tiempo = "";

            refreshIntervalId = setInterval(function() {
                startTimestamp.add(1, 'second');
                tiempo = startTimestamp.format('HH:mm:ss');
                $("#ContadorTurnoEspera").html(" | " + tiempo + ' | ');
                $("#ContadorTiempoEspera").val(tiempo);

            }, 1000);

        } else {
            toastr.success('Modo Manual Activado');
            var startTimestamp = moment().startOf("day");
            var tiempo = "";

            refreshIntervalId = setInterval(function() {
                startTimestamp.add(1, 'second');
                tiempo = startTimestamp.format('HH:mm:ss');
                $("#ContadorTurnoEspera").html(" | " + tiempo + ' | ');
                $("#ContadorTiempoEspera").val(tiempo);

            }, 1000);

            $("#MostrarTurnoAtencion").html("<b class='text-danger'>EN ESPERA PARA CONTINUAR</b>");
            $("#BloqueBtnIniciar").show();

        }
    });
}

//EnviarComentario
function EnviarComentarioAnulacion(Estado) {


    if ($("#ComentarioAnulacion").val() != '' && $("#ComentarioAnulacion").val().length > 10) {

        $(".ModalAnularTurno").modal("hide");
        ActualizarTurno(Estado);
        //toastr.options = {positionClass: 'toast-top-right'};
        toastr.error('Turno Anulado!');
        $("#TurnoParaAnular").html("");
        $("#ComentarioAnulacion").val("");

    } else {
        toastr.warning('Favor indicar un comentario válido');
    }
}

//ActualizarTurno
function ActualizarTurno(Estado) {

    var formData = {
        "Action": "ActualizarEstadoTurno",
        "Estado": Estado,
        "TurnoID": $("#TurnoIDEnAtencion").val(),
        "PuestoID": $("#PuestoID").val(),
        "SucursalID": $("#SucursalID").val(),
        "Turno": $("#TurnoEnAtencion").val(),
        "Puesto": $("#Puesto").val(),
        "Comentario": $("#ComentarioAnulacion").val()
    }; //Array

    var Departamento = $("#Departamento").val();
    var Puesto = $("#Puesto").val();
    var EmpresaCodigo = $("#EmpresaCodigo").val();
    var FechaTurno = moment().format('YYYY-MM-DD');

    $.ajax({
        url: "index.php?c=dashboard&a=ActualizarEstadoTurnoController",
        type: "POST",
        data: formData,
        success: function(data, textStatus) {

            if (textStatus == "success") {

                var JsonData = JSON.parse(data);

                var CantReLlamadas = "";

                if (JsonData[0].CantReLlamadas == null) {
                    var CantReLlamadas = $("#CantReLlamadas").val();
                } else {
                    CantReLlamadas = JsonData[0].CantReLlamadas;
                }

                $("#BloqueBtnIniciar").hide();
                $("#TurnoIDEnAtencion").val(JsonData[0].TurnoID);
                $("#EstadoTurnoAtencion").val(JsonData[0].Estado);
                $("#CantReLlamadas").val(CantReLlamadas);
                $("#MostrarTurnoAtencion").html(JsonData[0].Turno);
                $("#TurnoEnAtencion").val(JsonData[0].Turno)
                MarcarEstadoNav(JsonData[0].Estado);



                var DataPuesto = {
                    'TurnoEnAtencion': JsonData[0].Turno,
                    'TurnoIDEnAtencion': JsonData[0].TurnoID,
                    'PuestoID': $("#PuestoID").val(),
                    'Puesto': $("#Puesto").val(),
                    'DepartamentoID': $("#DepartamentoID").val(),
                    'SucursalID': $("#SucursalID").val(),
                    'Estado': JsonData[0].Estado,
                    "CantReLlamadas": CantReLlamadas,
                    "FechaTurno": FechaTurno
                };

                ActualizarPuestoFirebase(EmpresaCodigo, Departamento, Puesto, DataPuesto);

            }

        }
    });

}


//MarcarEstadoNav
function MarcarEstadoNav(Estado) {

    $(".nav-item").removeClass("active");

    if (Estado == "L") {
        $(".nav-estado-rellamar").addClass("active");
    } else if (Estado == "P") {
        $(".nav-estado-atencion").addClass("active");
    } else if (Estado == "A") {
        $(".nav-estado-anulado").addClass("active");

        PuestoEnEspera();
    } else if (Estado == "F") {
        $(".nav-estado-finalizar").addClass("active");
        //swal("Turno Finalizado", "", "success");

    } else if (Estado == "T") {
        $(".nav-estado-transferir").addClass("active");
    }


}

//Obtiene el ultimo turno en antencion en el puesto
function ObtenerTurnoAtencionPuesto() {

    var Departamento = $("#Departamento").val();
    var Puesto = $("#Puesto").val();
    var EmpresaCodigo = $("#EmpresaCodigo").val();
    var FechaTurno = "";
    MarcarEstadoNav("");
    var CantReLlamadasFire = "";
    var DepartamentoIDFire = "";
    var EstadoFire = "";
    var FechaTurnoFire = "";
    var PuestoFire = "";
    var PuestoIDFire = "";
    var SucursalIDFire = "";
    var TurnoEnAtencionFire = "";
    var TurnoIDAtencionFire = "";

    firebase.database().ref('/' + EmpresaCodigo + '/Sucursales/' + Departamento + '/' + Puesto).on('value', function(snapshot) {

        snapshot.forEach(function(e) {

            if (e.key == 'FechaTurno') {
                FechaTurnoFire = e.val();
            }

            if (e.key == 'TurnoEnAtencion') {
                TurnoEnAtencionFire = e.val();
            }

            if (e.key == 'TurnoIDEnAtencion') {
                TurnoIDAtencionFire = e.val();
            }

            if (e.key == 'Estado') {
                EstadoFire = e.val();
            }

            if (e.key == 'SucursalID') {
                SucursalIDFire = e.val();
            }

            if (e.key == 'PuestoID') {
                PuestoIDFire = e.val();
            }

            if (e.key == 'Puesto') {
                PuestoFire = e.val();
            }


            if (e.key == 'DepartamentoID') {
                DepartamentoIDFire = e.val();
            }

            if (e.key == 'CantReLlamadas') {
                CantReLlamadasFire = e.val();
            }

        });

        if (FechaTurnoFire == moment().format('YYYY-MM-DD')) {

            if (EstadoFire != 'F' && EstadoFire != '') {

                $("#BloqueBtnIniciar").hide();
                $("#TurnoIDEnAtencion").val(TurnoIDAtencionFire);
                $("#TurnoEnAtencion").val(TurnoEnAtencionFire);
                $("#EstadoTurnoAtencion").val(EstadoFire);
                $("#CantReLlamadas").val(CantReLlamadasFire);
                $("#MostrarTurnoAtencion").html(TurnoEnAtencionFire);

                MarcarEstadoNav(EstadoFire);

            } else {
                $("#BloqueBtnIniciar").show();
                $("#MostrarTurnoAtencion").html("<b class='text-primary'>PULSE EL BOTON INICIAR</b>");
                MarcarEstadoNav("");

            }

        } else {
            // OLIVER - PRUEBA
            $("#BloqueBtnIniciar").show();
            $("#MostrarTurnoAtencion").html("<b class='text-primary'>PULSE EL BOTON INICIAR</b>");
            MarcarEstadoNav("");
        }

    });


}

ObtenerTurnoAtencionPuesto();

//GenerarLlamadaTurno
function GenerarLlamadaTurno() {

    var formData = { "Action": "GenerarLlamadaTurno", "PuestoID": $("#PuestoID").val(), "Puesto": $("#Puesto").val() }; //Array
    $("#ContadorTiempoEspera").val("");
    clearInterval(refreshIntervalId);

    $.ajax({
        url: "index.php?c=dashboard&a=GenerarLlamadaTurnoController",
        type: "POST",
        data: formData,
        success: function(data) {
            var JsonData = JSON.parse(data);

            if (JsonData[0].Turno != null && JsonData[0].TurnoID != '0') {

                $("#MostrarTurnoAtencion").html(JsonData[0].Turno);
                $("#TurnoEnAtencion").val(JsonData[0].Turno);
                $("#TurnoIDEnAtencion").val(JsonData[0].TurnoID);

                $("#BloqueBtnIniciar").hide();
                $("#ContadorTurnoEspera").html(""); // OLIVER;
                $("#EstadoTurnoAtencion").val("L");
                MarcarEstadoNav("L");
                toastr.success('Llamando turno!');

                var Departamento = $("#Departamento").val();
                var Puesto = $("#Puesto").val();
                var EmpresaCodigo = $("#EmpresaCodigo").val();
                var FechaTurno = moment().format('YYYY-MM-DD');

                var DataPuesto = {
                    'TurnoEnAtencion': JsonData[0].Turno,
                    'TurnoIDEnAtencion': JsonData[0].TurnoID,
                    'PuestoID': $("#PuestoID").val(),
                    'Puesto': $("#Puesto").val(),
                    'DepartamentoID': $("#DepartamentoID").val(),
                    'SucursalID': $("#SucursalID").val(),
                    'Estado': 'L',
                    'CantReLlamadas': 1,
                    "FechaTurno": FechaTurno
                };

                ActualizarPuestoFirebase(EmpresaCodigo, Departamento, Puesto, DataPuesto);

            } else {
                $("#BloqueBtnIniciar").show();
                $("#MostrarTurnoAtencion").html("NO HAY TURNOS EN ESPERA");
                swal("Informacion del Sistema", "No hay turnos en espera.", "warning");
                MarcarEstadoNav("");
                $("#BloqueBtnIniciar").show();
            }

        },
        error: function(jqXHR, textStatus, errorThrown) {
            if (console && console.log) {
                console.log("La solicitud a fallado: " + textStatus);
                $("#BloqueBtnIniciar").show();
            }
        }
    });

}

function ActualizarPuestoFirebase(EmpresaCodigo, Departamento, Puesto, DataPuesto) {

    var updates = {};
    updates['/' + EmpresaCodigo + '/Sucursales/' + Departamento + '/' + Puesto] = DataPuesto;

    return firebase.database().ref().update(updates);

}


$("#BtnIniciar").on('click', function() {

    $("#ContadorTiempoEspera").val('');
    $("#MostrarTurnoAtencion").html("");
    clearInterval(refreshIntervalId);
    $("#ContadorTurnoEspera").html('');

    if (window.sessionStorage && window.localStorage) {

        var storage = localStorage;
        var TiempoUltimaLlamada = storage.getItem("TiempoUltimaLlamada");
        var TiempoActuar = moment(new Date()).format('HH:mm:s');

        if (TiempoUltimaLlamada == null) {

            storage.setItem("TiempoUltimaLlamada", TiempoActuar);
            GenerarLlamadaTurno();

        } else if (TiempoUltimaLlamada != null) {

            var startTime = moment(TiempoUltimaLlamada, 'hh:mm:ss');
            var endTime = moment(TiempoActuar, 'hh:mm:ss');
            var diferenciaTiempo = endTime.diff(startTime, 'seconds');

            if (diferenciaTiempo > 5) {
                storage.setItem("TiempoUltimaLlamada", TiempoActuar);
                GenerarLlamadaTurno();
            } else {
                toastr.warning('Espere 5 segundos y vuelva a intentarlo');
            }

        }

    }

});

//MostrarListadoTurnosEspera
$("#TabTurnosEspera").on('click', function() {
    MostrarListadoTurnosEspera();
});

//MostrarListadoTurnosAnulados
$("#TabTurnosAnulados").on('click', function() {

    MostrarListadoTurnosAnulados();
});

//MostrarListadoTurnosEspera
function MostrarListadoTurnosEspera() {

    $('#ListadoTurnosEspera').DataTable({
        "responsive": true,
        destroy: true,
        "ajax": {
            "url": "index.php?c=dashboard&a=GetListTurnosBySucursal",
        },

        columns: [
            { data: "TurnoConcatenado" },
            { data: "Estado" },
            { data: "Estatus" },
            { data: "FechaHoraSeleccion" }
        ]
    });
}
//MostrarListadoTurnosAnulados
function MostrarListadoTurnosAnulados() {

    $('#ListadoTurnosAnulados').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        "bDestroy": true,
        "ajax": "index.php?c=dashboard&a=GetListTurnosAnulados",
        "columns": [{
                targets: 1,
                data: null,
                defaultContent: '<button type="button" id="btnActivarTurno"  onclick="ShowModalActivarTurno(this)"  title="Activar turno" data-toggle="tooltip" class="btn btn-success"><i class="	fa fa-check-square" aria-hidden="true"></i></button>'
            },
            { "data": "Id" },
            { "data": "TurnoConcatenado" },
            { "data": "Estado" },
            { "data": "Estatus" },
            { "data": "Comentario" },
            { "data": "Puesto" },
            { "data": "FechaHoraAnulacion" }
        ]

    });

}
//ShowModalActivarTurno
function ShowModalActivarTurno(e) {

    var TurnoID = $(e).parents('tr').find('td:eq(1)').html();

    $.ajax({
        url: "index.php?c=dashboard&a=ActivarTurnoAnulado",
        type: "POST",
        data: { 'Action': 'ActivarTurnoAnulado', 'TurnoID': TurnoID },
        success: function(data) {

            if (data) {
                toastr.success('Turno Reactivado!');
            }
        }
    });

    $('#ListadoTurnosAnulados').DataTable().ajax.reload();
}

$("#ActivarLlamadaPorOrdenLlegada").change(function() {

    var Opcion = "DESACTIVAR";

    if (this.checked == true) {
        Opcion = "ACTIVAR";
    }

    $.ajax({
        url: "index.php?c=dashboard&a=CambiarModoLlamadaPuesto",
        type: "POST",
        data: { Action: "CambiarModoLlamadaPuesto", Opcion: Opcion, PuestoID: $("#PuestoID").val(), Departamento: $("#Departamento").val() },
        success: function(data) {

            if (Opcion == "ACTIVAR") {
                toastr.success('Modo de llamada por hora de llegada');
            } else {
                toastr.info('Modo de llamada por prioridad');
            }

            // guardar("MODO LLAMADA POR ORDEN LLEGADA", Opcion);

        }
    });

});

//Intercambiar las prioridades con otro puesto
$("#PuestoIDIntercambiar").change(function() {
    GetListPrioridadesByPuesto("Intercambiar", $("#PuestoIDIntercambiar").val());
});

//Mostrar el listado de las prioridades del puesto
function GetListPrioridadesByPuesto(Modo, PuestoID) {

    var PuestoID = PuestoID;

    if (Modo != "Intercambiar") {
        PuestoID = $("#PuestoID").val();
    }

    $.ajax({
        url: "index.php?c=dashboard&a=GetListPrioridadesBypuesto",
        type: "POST",
        data: { 'Action': 'GetListPrioridadesBypuesto', PuestoID: PuestoID },
        success: function(data) {

            if (data) {

                var json = JSON.parse(data);

                if (Modo == "Intercambiar") {

                    $("#ListPrioridadesPuestoIntercambiar").html("<hr><p>PRIORIDADES DEL PUESTO SELECCIONADO:</p>");

                    json.forEach(function(element) {
                        $("#ListPrioridadesPuestoIntercambiar").append('<li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-circle text-primary mr-0-5"></i>' + element.Nivel + ' - ' + element.Nombre + ' - ' + element.Prioridad + '</a> </li>');
                    });

                } else {

                    $("#ListPrioridadesPuesto").html("");
                    json.forEach(function(element) {
                        $("#ListPrioridadesPuesto").append('<li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-circle text-primary mr-0-5"></i>' + element.Nivel + ' - ' + element.Nombre + ' - ' + element.Prioridad + '</a> </li>');
                    });

                }
            }
        }
    });


}

function IntercambiarPrioridadesPuesto() {

    var NuevoPuestoIntercambiarID = $("#PuestoIDIntercambiar").val();
    var PuestoIDActual = $("#PuestoID").val();

    if (PuestoIDActual != '' && NuevoPuestoIntercambiarID != '') {

        $.ajax({
            url: "index.php?c=dashboard&a=IntercambiarPrioridadesPuesto",
            type: "POST",
            data: { 'Action': 'IntercambiarPrioridadesPuesto', NuevoPuestoIntercambiarID: NuevoPuestoIntercambiarID, PuestoIDActual: PuestoIDActual },
            success: function(data) {

                if (data) {
                    toastr.success('Prioridades intercambiados');
                    GetListPrioridadesByPuesto(null, null);
                    $("#ModalIntercambiarPrioridadesPuesto").modal('hide');
                    $("#ListPrioridadesPuestoIntercambiar").html("");
                }
            }
        });


    } else {
        toastr.error('Error al seleccionar el puesto');
    }


}


// TURNO QUE ESTAN TOMANDO EN EL PUESTO DE PONCHE
firebase.database().ref('/' + EmpresaCodigo + '/Sucursales/' + Departamento + '/PONCHE/').on('value', function(snapshot) {

    var TurnoPonche = "";
    var FechaValida = false;

    snapshot.forEach(function(e) {

        if (e.key == "FechaTurno" && e.val() == moment().format('YYYY-MM-DD')) {
            FechaValida = true;
        }

        if (FechaValida == true) {

            if (e.key == 'TurnoTomadoPonche') {
                TurnoPonche = e.val();
            }
        }

    });

    if (TurnoPonche != '') {
        toastr.info('ULTIMO TURNO TOMADO: ' + TurnoPonche);
        MostrarListadoTurnosEspera();
    }


});


GetListPrioridadesByPuesto(null, null);