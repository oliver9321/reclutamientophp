

var player;
var tag = document.createElement('script');
tag.src = "http://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

var ModoDebug = "<?php echo $ModoDebug ?>";
var DepartamentoID = "<?php echo $_SESSION['DataUserOnline']['Usuario']->DepartamentoID ?>";
var Departamento = $("#Departamento").val();
var Puesto = $("#Puesto").val();
var EmpresaCodigo = $("#EmpresaCodigo").val();

function onYouTubePlayerAPIReady() {

    setTimeout(function(){

        if(ModoPlayListYoutube == 'Listado'){


            player = new YT.Player('player',
                {
                    height: '600',
                    width: '600',
                    playerVars: {listType:'playlist', list: $("#PlayListYoutube").val(), vq:'hd720', loop:1, controls: 0, showinfo: 0, theme: 'white', rel: 0
                    },events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
                });

        }else{

            player = new YT.Player('player', {
                height: '600',
                width: '600',
                videoId: $("#PlayListYoutube").val(),
                playerVars :{loop: 1, 'vq':'hd720', controls: 0,showinfo: 0,theme: 'dark',rel: 0
                },events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }

            });

        }

    }, 3000);


}

function onPlayerReady(event) {
    PlayVideo();
    event.target.setVolume(10);
}

function onPlayerStateChange(event) {

    if(event.data === -1) {
        PlayVideo();
    }

    if(event.data === 1) {
        event.target.setVolume(10);
        console.log("reproduciendo");
    }

    if(event.data === 2) {
        console.log("En pausa");
    }
}


function StopVideo() {
    player.pauseVideo();
}

function PlayVideo() {
    player.playVideo();
}

function voiceStartCallback() {
    StopVideo();
    $('.flipInX').modal('show');
}

function voiceEndCallback() {
    PlayVideo();
    $('.flipInX').modal('hide');
}

var parameters = {
    onstart: voiceStartCallback,
    onend: voiceEndCallback
}

$(function(){


    firebase.database().ref('/'+EmpresaCodigo+'/Sucursales/' + Departamento + '/').on('value', function (snapshot) {

        snapshot.forEach(function (e) {

            var json = e.val();
            var retrievedObject = localStorage.getItem(json.Puesto); //FireBase
            var JsonPuestoData = JSON.parse(retrievedObject); //LocalStorage
            // console.log(json);

            if(json.FechaTurno == moment().format('YYYY-MM-DD') && json.DepartamentoID == DepartamentoID){

                if(json.TurnoEnAtencion != 0 && json.TurnoEnAtencion != null) {

                    if(JsonPuestoData != null && JsonPuestoData.Puesto  == json.Puesto){

                        switch (json.Estado) {

                            case 'L':

                                //   console.log(JsonPuestoData.Estado + "<--->"+json.Estado+" |Re: "+JsonPuestoData.CantReLlamadas+"<-->"+json.CantReLlamadas+"|"+JsonPuestoData.TurnoEnAtencion+"<-->"+json.TurnoEnAtencion);

                                if(JsonPuestoData.TurnoEnAtencion == json.TurnoEnAtencion && JsonPuestoData.Estado ==  json.Estado && JsonPuestoData.CantReLlamadas != json.CantReLlamadas) {

                                    ReLlamarTurno(json.TurnoEnAtencion, json.Puesto);
                                    var PuestoJson = { 'PuestoID': json.PuestoID, 'Puesto': json.Puesto, 'TurnoEnAtencion': json.TurnoEnAtencion, "CantReLlamadas": json.CantReLlamadas , "Estado":json.Estado};
                                    localStorage.setItem(json.Puesto, JSON.stringify(PuestoJson));

                                }else if(JsonPuestoData.TurnoEnAtencion != json.TurnoEnAtencion && json.Estado == "L"){

                                    ReLlamarTurno(json.TurnoEnAtencion, json.Puesto);
                                    var PuestoJson = { 'PuestoID': json.PuestoID, 'Puesto': json.Puesto, 'TurnoEnAtencion': json.TurnoEnAtencion, "CantReLlamadas": json.CantReLlamadas , "Estado":json.Estado};
                                    localStorage.setItem(json.Puesto, JSON.stringify(PuestoJson));

                                }else if(JsonPuestoData.TurnoEnAtencion == json.TurnoEnAtencion && JsonPuestoData.Estado !=  json.Estado && JsonPuestoData.CantReLlamadas != json.CantReLlamadas){

                                    ReLlamarTurno(json.TurnoEnAtencion, json.Puesto);
                                    var PuestoJson = { 'PuestoID': json.PuestoID, 'Puesto': json.Puesto, 'TurnoEnAtencion': json.TurnoEnAtencion, "CantReLlamadas": json.CantReLlamadas , "Estado":json.Estado};
                                    localStorage.setItem(json.Puesto, JSON.stringify(PuestoJson));

                                }


                                break;

                            case 'P':

                                MarcarEnPuestoTurno(json.TurnoEnAtencion,json.Puesto);
                                var PuestoJson = { 'PuestoID': json.PuestoID, 'Puesto': json.Puesto, 'TurnoEnAtencion': json.TurnoEnAtencion, "CantReLlamadas": json.CantReLlamadas , "Estado":json.Estado};
                                localStorage.setItem(json.Puesto, JSON.stringify(PuestoJson));

                                break;
                            case 'F':

                                FinalizarTurno(json.TurnoEnAtencion, json.PuestoID);
                                removerItem(json.Puesto);
                                var PuestoJson = { 'PuestoID': json.PuestoID, 'Puesto': json.Puesto, 'TurnoEnAtencion': json.TurnoEnAtencion, "CantReLlamadas": json.CantReLlamadas , "Estado":json.Estado};
                                localStorage.setItem(json.Puesto, JSON.stringify(PuestoJson));

                                break;

                            default:
                                console.log("Condicion desconocida: "+json.Estado);
                        }


                    }else{


                        var PuestoJson = { 'PuestoID': json.PuestoID, 'Puesto': json.Puesto, 'TurnoEnAtencion': json.TurnoEnAtencion, "CantReLlamadas": json.CantReLlamadas , "Estado":json.Estado};
                        localStorage.setItem(json.Puesto, JSON.stringify(PuestoJson));

                        var retrievedObject = localStorage.getItem(json.Puesto);
                        var JsonPuestoData = JSON.parse(retrievedObject);

                        switch (json.Estado) {

                            case 'L':


                                //  if(JsonPuestoData.PuestoID != '' && JsonPuestoData.Estado != json.Estado){
                                ReLlamarTurno(json.TurnoEnAtencion, json.Puesto);
                                // }

                                break;

                            case 'P':

                                MarcarEnPuestoTurno(json.TurnoEnAtencion,json.Puesto);
                                PuestoJson = { 'PuestoID': json.PuestoID, 'Puesto': json.Puesto, 'TurnoEnAtencion': json.TurnoEnAtencion, "CantReLlamadas": json.CantReLlamadas , "Estado":json.Estado};
                                localStorage.setItem(json.Puesto, JSON.stringify(PuestoJson));

                                break;

                            case 'F':

                                FinalizarTurno(json.TurnoEnAtencion, json.PuestoID);
                                removerItem(json.Puesto);
                                var PuestoJson = { 'PuestoID': json.PuestoID, 'Puesto': json.Puesto, 'TurnoEnAtencion': json.TurnoEnAtencion, "CantReLlamadas": json.CantReLlamadas , "Estado":json.Estado};
                                localStorage.setItem(json.Puesto, JSON.stringify(PuestoJson));

                                break;

                            default:
                                console.log("Condicion desconocida: "+json.Estado);
                        }

                    } // Aqui

                } else{
                    console.log("Diferencia en puestos");
                }

            }

        });

    });

});



function FinalizarTurno(Turno, PuestoID){

    $("."+Turno).remove();
    $("."+PuestoID).remove();

}

function ReLlamarTurno(TurnoEnAtencion, Puesto) {


    $("#audio").html('<audio src="vendor/audio/tonoturno.mp3" volume="5" type="audio/x-mp3" controls autoplay="autoplay"> <source src="vendor/audio/tonoturno.mp3"/> </audio>');

    setTimeout(function () {

        $("#TurnoMostrar").html(TurnoEnAtencion);
        $("#PuestoMostrar").html(Puesto);
        $('.flipInX').modal('show');

        if (LlamadaPorVoz == 'true') {
            responsiveVoice.speak(TurnoEnAtencion + ".. A " + Puesto, "Spanish Female", parameters);
        }

        setTimeout(function () {
            $('.flipInX').modal('hide');
        }, 8000);

    }, 2000);
}



function MarcarEnPuestoTurno(TurnoEnAtencion,Puesto){

    $("."+TurnoEnAtencion).remove();

    $("#ListadoTurnosAtencion").append('<div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ' + TurnoEnAtencion + '">' +
        '<div class="box box-block tile tile-2 bg-primary mb-2">' +
        ' <div class="t-content"><h1 class="mb-1">' + TurnoEnAtencion + '</h1></div> ' +
        ' </div> </div> ' +
        '<div class="col-lg-8 col-md-4 col-sm-6 col-xs-12 ' + TurnoEnAtencion + '">' +
        ' <div class="box box-block tile tile-2 bg-primary mb-2"> ' +
        '<div class="t-content"><h1 class="mb-1">' + Puesto + '</h1></div></div></div>');
    $("#TurnoEnPuesto").val(TurnoEnAtencion);

}

function GetListMarquesina(HoraActual){

    $.ajax({
        url: "Index.php?c=mant_marquesina&a=GetListMarquesina",
        type: "POST",
        data: {Action: "GetListMarquesina", Hora: HoraActual},
        success: function (data) {

            if(ModoDebug == true){
                // console.log(data);
            }

            if(data != '0'){

                var Json = JSON.parse(data);
                $.each(Json, function( key, value ) {
                    $('#Marquesina').html(value);
                });
            }

        }
    });
}

function ShowMarquesina() {
    GetListMarquesina(moment().format('hh:mm'))
}
setInterval(ShowMarquesina, 300000);

var ctrlPressed = false;
// Alt + o para cerrar session
$(document).keydown(function(e){

    if (e.keyCode == 18)
        ctrlPressed = true;

    if (ctrlPressed && (e.keyCode == 79))
        window.location.href = 'index.php';
});