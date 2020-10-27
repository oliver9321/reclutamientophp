
<div>
    <div class="content-area py-1">
        <div class="container-fluid">

            <div class="row row-md">

                <div class="box bg-white">
                    <nav class="nav nav-1">
                        <div class="row no-gutter">

                            <div class="col-md-3 BtnAcciones btn-outline-danger" data-action="A" onMouseOver="this.style.cursor='pointer'">
                                <a class="nav-link" href="#"><span>	<i class="ti-direction-alt"></i></span><br><h4 class="text-danger">CANDIDATOS</h4></a>
                            </div>

                            <div class="col-md-3 BtnAcciones btn-outline-success" data-action="L" onMouseOver="this.style.cursor='pointer'">
                                <a class="nav-link" href="#"><span> <i class="ti-user"></i></span><br><h4 class="text-success">EMPLEADOS</h4></a>
                            </div>

                            <div class="col-md-3 BtnAcciones btn-outline-warning" data-action="P" onMouseOver="this.style.cursor='pointer'">
                                <a class="nav-link" href="#"><span><i class="ti-user"></i></span><br><h4 class="text-warning">EN PROCESO</h4></a>
                            </div>

                            <div class="col-md-3 BtnAcciones btn-outline-primary" data-action="F" onMouseOver="this.style.cursor='pointer'">
                                <a class="nav-link b-r-0" href="#"><span>  <i class="ti-files"></i></span><br><h4 class="text-primary">REPORTES</h4></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>


            <div class="box box-block bg-white">
                <h5>RECLUTAMIENTO</h5>
                <p class="font-90 text-muted mb-1"></p>
                <div class="row">

                    <div class="col-md-12">
                        <ul class="nav nav-tabs mb-0-5" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#Atencion" role="tab">EN ATENCION</a>
                            </li>
                            <li class="nav-item" id="TabTurnosEspera">
                                <a class="nav-link" data-toggle="tab" href="#Espera" role="tab">EN ESPERA</a>
                            </li>

                            <li class="nav-item" id="TabTurnosAnulados">
                                <a class="nav-link" data-toggle="tab" href="#Anulados" role="tab">ANULADOS</a>
                            </li>

                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="Atencion" role="tabpanel">

                                <article>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div id="card" class="weater">
                                                <div class="city-selected">
                                                    <br></br>
                                                    <center>
                                                        <div class="temp" id="MostrarTurnoAtencion"></div>
                                                    </center>
                                                </div>

                                                <div class="days" id="BloqueBtnIniciar">
                                                    <div class="row row-no-gutter">

                                                        <div class="col-md-12" id="BtnIniciar">
                                                            <div class="day" onMouseOver="this.style.cursor='pointer'">
                                                                <h1>INICIAR</h1>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </article>
                                <!--CANTIDAD DE TURNOS TRABAJOS O EN ESPERA -->

                                <!--CANTIDAD DE TURNOS TRABAJOS -->

                            </div>
                            <div class="tab-pane" id="Espera" role="tabpanel">

                                <table id="ListadoTurnosEspera" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>
                                            <th>Turno</th>
                                            <th>Estado</th>
                                            <th>Estatus</th>
                                            <th>Fecha/Hora Selección</th>
                                    </thead>
                                </table>
                            </div>

                            <!--ListadoTurnosAnulados-->
                            <div class="tab-pane" id="Anulados" role="tabpanel">

                                <table id="ListadoTurnosAnulados" class="table table-striped table-bordered dataTable" cellspacing="0" width="100%">
                                    <thead>
                                        <tr>

                                            <th></th>
                                            <th>Id</th>
                                            <th>Turno</th>
                                            <th>Estado</th>
                                            <th>Estatus</th>
                                            <th>Comentario</th>
                                            <th>Puesto</th>
                                            <th>Fecha Hora Anulacion</th>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>


        </div>
    </div>
</div>


