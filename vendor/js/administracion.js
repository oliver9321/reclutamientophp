//OpcionTruncateTable
$("#OpcionTruncateTable").on('click', function() {

    var updates = {};
    var DataPuesto = {};

    updates['/' + $("#EmpresaCodigo").val() + '/Sucursales/'] = DataPuesto;
    firebase.database().ref().update(updates);

    $.ajax({
        url: "index.php?c=administracion&a=TruncateTableTurnos",
        type: "POST",
        data: { Action: "TruncateTableTurnos" },
        success: function(data) {
            //  toastr.error('La data ha sido borrada!');
        }
    });



});

//OpcionFinalizarTurnos
$("#OpcionFinalizarTurnos").on('click', function() {

    $.ajax({
        url: "index.php?c=administracion&a=FinalizarTurnos",
        type: "POST",
        data: { Action: "FinalizarTurnos" },
        success: function(data) {

            //   toastr.error('Turnos Finalizados');
        }
    });

    var updates = {};
    var DataPuesto = {};

    updates['/' + $("#EmpresaCodigo").val() + '/Sucursales/'] = DataPuesto;
    firebase.database().ref().update(updates);

});



$(function() {
    $('.select2').select2();
    $('.scroll-pane').jScrollPane();


    $("#DepartamentoID").on("change", function() {
        GetTotalTurnosByUsers();
    });

    $("#GetTotalTurnosByUsers").on('click', function() {
        GetTotalTurnosByUsers();
    });

    function GetTotalTurnosByUsers() {

        var DepartamentID = $(".select2 option:selected").val();
        var TotalTurnosHoy = 0;


        if (DepartamentID != '') {

            var formData = { DepartamentID: DepartamentID }; //Array


            $.ajax({
                url: "index.php?c=administracion&a=GetTotalTurnosByUsers",
                type: "POST",
                data: formData,
                success: function(data) {

                    // toastr.options = {positionClass: 'toast-top-right'};
                    // toastr.success('Información Actualizada!');

                    var JsonData = JSON.parse(data);
                    var dataChart = [];

                    $('#ListadoCantidadTurnosUsuarios').html("");

                    $("#TotalTurnos").html(JsonData.TotalTurnosDepartamento);
                    TotalTurnosHoy = JsonData.TotalTurnosDepartamento;


                    $("#TotalTurnosEspera").html(JsonData.TotalTurnosEspera);
                    $("#TotalTurnosEnPuesto").html(JsonData.TotalTurnosEnPuesto);
                    $("#TotalTurnosFinalizados").html(JsonData.TotalTurnosFinalizados);

                    $.each(JsonData['TurnosUsuarios'], function(key, value) {

                        if (value.Usuario != null) {
                            $('#ListadoCantidadTurnosUsuarios').append('<p class="mb-0-4">' + value.Usuario + '<span class="float-xs-right">' + value.Total + '</span></p><progress class="progress progress-primary progress-sm" value="' + value.Total + '" max="100">100%</progress>');
                        }

                    });


                    $('#ListadoCantidadTurnosTipoTurno').html("");
                    var ExisteDataCantidadTipoTurno = 'false';

                    $.each(JsonData['CantidadPorTipoTurno'], function(key, value) {

                        var Color = dame_color_aleatorio();

                        if (value.BotonTurno != null) {

                            ExisteDataCantidadTipoTurno = 'true';
                            $('#ListadoCantidadTurnosTipoTurno').append('<p class="mb-0-5">' + value.BotonTurno + '<span class="float-xs-right">' + value.Cantidad + '/' + TotalTurnosHoy + '</span></p><progress class="progress progress-success progress-sm" value="' + value.Cantidad + '" max="100">100%</progress>');

                            dataChart.push({
                                label: value.BotonTurno + "( " + value.Cantidad + " )",
                                data: value.Cantidad,
                                color: Color
                            });
                        }

                    });

                    if (ExisteDataCantidadTipoTurno == 'true') {

                        $.plot($("#chart-3"), dataChart, {
                            series: {
                                pie: { innerRadius: 0.5, show: true }
                            },
                            grid: { hoverable: true },
                            legend: {
                                show: false,
                            },
                            color: null,
                            tooltip: false

                        });

                    } else {
                        $.plot($("#chart-3"), dataChart);
                    }
                    /*-----------------------------------------------------------*/

                    /*------------------------------------------------------------*/

                    var dataSemana = new Array();
                    dataSemana[0] = new Array();
                    var ticks = [
                        [1, "Lunes"],
                        [2, "Martes"],
                        [3, "Miercoles"],
                        [4, "Jueves"],
                        [5, "Viernes"]
                    ];
                    var ExisteCantidadUltimosCincoDias = 'false';

                    $.each(JsonData['CantidadTurnosUltimosCincoDias'], function(key, value) {


                        if (value.DIA_SEMANA != null) {

                            ExisteCantidadUltimosCincoDias = 'true';
                            var dia = value.Dia;
                            var cantidad = value.Cantidad;
                            dataSemana[0].push([dia, cantidad]);
                        }

                    });

                    if (ExisteCantidadUltimosCincoDias == 'true') {

                        $.plot($("#chart-2"), dataSemana, {
                            bars: {
                                show: true,
                                barWidth: 0.2
                            },
                            series: {
                                stack: 0
                            },
                            xaxis: {
                                axisLabel: "Dias de la Semana",
                                axisLabelUseCanvas: true,
                                axisLabelFontSizePixels: 12,
                                axisLabelFontFamily: 'Verdana, Arial',
                                axisLabelPadding: 10,
                                ticks: ticks
                            },
                            yaxis: {
                                axisLabel: "Cantidad",
                                axisLabelUseCanvas: true,
                                axisLabelFontSizePixels: 12,
                                axisLabelFontFamily: 'Verdana, Arial',
                                axisLabelPadding: 3,
                                tickFormatter: function(v, axis) {
                                    return v;
                                }
                            },
                            grid: {
                                color: "#aaa",
                                hoverable: true,
                                borderWidth: 0,
                                labelMargin: 5,
                                backgroundColor: "#fff",
                            },
                            legend: {
                                show: true,
                            },
                            colors: ["#2E86C1", "#D2B4DE"],
                            tooltip: false
                        });

                    } else {
                        $.plot($("#chart-2"), dataSemana);
                    }


                }

            });


        } else {
            swal("Informacion de Sistema", "Seleccione un departamento", "error")
        }
    }

    function dame_color_aleatorio() {
        hexadecimal = new Array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F")
        color_aleatorio = "#";
        for (i = 0; i < 6; i++) {
            posarray = aleatorio(0, hexadecimal.length)
            color_aleatorio += hexadecimal[posarray]
        }
        return color_aleatorio
    }

    function aleatorio(inferior, superior) {
        numPosibilidades = superior - inferior
        aleat = Math.random() * numPosibilidades
        aleat = Math.floor(aleat)
        return parseInt(inferior) + aleat
    }

});