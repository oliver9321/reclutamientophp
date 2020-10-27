<!DOCTYPE html>
<html lang="es">
<head>
    <!-- Meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?=NOMBRE_APLICATION.VERSION ?></title>

    <!-- Vendor CSS -->
    <link rel="stylesheet" href="vendor/bootstrap4/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.css">
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/select2/select2.min.css">
    <!-- Neptune CSS -->
    <link rel="stylesheet" href="vendor/css/core.css">

    <style>
        body{
            background: url(img/back.png) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
        }

    </style>

</head>

<br><br><br><br><br><br>
<body class="auth-bg" id="loginModule">

<div class="auth">

    <div class="container-fluid">
        <div class="row">

            <!--<div class="auth-header">
                <div class="mb-2"><img src="img/log.png" title=""></div>
            </div>-->

            <center>
                <div class="mb-2"><img src="img/log3.png"  class="img-responsive" title="Logo"></div>
            </center>

            <br>
            <div class="col-md-4 offset-md-4">
                <form id="frm-login" action="?c=login&a=ValidateUser" method="post">
                    <div class="form-group">
                        <div class="input-group">
                            <input type="text" class="form-control" id="Correo" name="Correo" placeholder="Correo" >
                            <div class="input-group-addon"><i class="ti-user"></i></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <input type="password" class="form-control" id="Clave"  name="Clave" placeholder="Clave">
                            <div class="input-group-addon"><i class="ti-key"></i></div>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block" id="BtnIniciarSesion">Iniciar Sesion</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>

<!-- Vendor JS -->
<script type="text/javascript" src="vendor/jquery/jquery-1.12.3.min.js"></script>
<script type="text/javascript" src="vendor/tether/js/tether.min.js"></script>
<script type="text/javascript" src="vendor/bootstrap4/js/bootstrap.min.js"></script>
<script type="text/javascript" src="vendor/js/select2.full.min.js"></script>
<script type="text/javascript" src="vendor/sweetalert2/sweetalert2.min.js"></script>
</body>
</html>


<script>

    $('.select2').select2();

    $(document).ready(function(){
        $("#frm-login").submit(function(){
            return $(this).validate();
        });
    });

    var body = document.querySelector('body');

    body.onkeydown = function (e) {
        if (!e.metaKey) {

            if(e.keyCode == 13){
                $("#frm-login").submit(function(){
                    return $(this).validate();
                });
            }
        }
    };
</script>
