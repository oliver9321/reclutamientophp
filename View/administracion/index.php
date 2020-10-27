    <link rel="stylesheet" href="vendor/morris/morris.css">
    <link rel="stylesheet" href="vendor/jvectormap/jquery-jvectormap-2.0.3.css">


    	<div class="float-xs-right">
    		<button class="btn btn-link btn-sm text-muted" title="Refrescar Dashboard" type="button" id="GetTotalTurnosByUsers" >Refrescar Dashboard <i class="ti-reload"></i></button>
    	</div>
    		<div class="form-group">
    			<label for="cmbDepartamento"><b>DEPARTAMENTOS:</b></label>
    			<select id="DepartamentoID" name="DepartamentoID" class="form-control select2" style="width: 100%">
    				<option value="" selected>Seleccione un departamento para cargar la informacion</option>
    				<?php foreach($Departamentos as $a): ?>
    					<option value="<?php echo $a->Id; ?>"><?php echo $a->Nombre; ?></option>
    				<?php endforeach; ?>
    			</select>
    		</div>

    	<div class="row">
    		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    			<div class="box box-block bg-white tile tile-4 mb-2">
    				<div class="t-icon left bg-warning"><i class="fa fa-users"></i></div>
    				<div class="t-content text-xs-right">
    					<h6 class="text-uppercase">Total Turnos (Hoy)</h6>
    					<h1 class="mb-0" id="TotalTurnos">0</h1>
    				</div>
    			</div>
    		</div>
    		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    			<div class="box box-block bg-white tile tile-4 mb-2">
    				<div class="t-icon left bg-danger"><i class="fa fa-hourglass-start"></i></div>
    				<div class="t-content text-xs-right">
    					<h6 class="text-uppercase">Total en Espera (Hoy)</h6>
    					<h1 class="mb-0" id="TotalTurnosEspera">0</h1>
    				</div>
    			</div>
    		</div>
    		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    			<div class="box box-block bg-white tile tile-4 mb-2">
    				<div class="t-icon left bg-primary"><i class="ti-receipt"></i></div>
    				<div class="t-content text-xs-right">
    					<h6 class="text-uppercase">Total en Puesto</h6>
    					<h1 class="mb-0" id="TotalTurnosEnPuesto">0</h1>
    				</div>
    			</div>
    		</div>
    		<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
    			<div class="box box-block bg-white tile tile-4 mb-2">
    				<div class="t-icon left bg-success"><i class="fa fa-check"></i></div>
    				<div class="t-content text-xs-right">
    					<h6 class="text-uppercase">Total Finalizados</h6>
    					<h1 class="mb-0" id="TotalTurnosFinalizados">0</h1>
    				</div>
    			</div>
    		</div>
    	</div>

        <div class="row row-md mb-2">

            <div class="col-md-6">
                <div class="box box-block bg-white">
                    <div class="clearfix mb-1">
                        <h5 class="float-xs-left">TOTAL DE TURNOS EN LA SEMANA</h5>
                        <div class="float-xs-right">
                        </div>
                    </div>
                    <div class="text-xs-center">
                        <div class="btn-group mb-1">
                          <!-- <button type="button" class="btn btn-secondary btn-sm waves-effect waves-light">Today</button>
                            <button type="button" class="btn btn-secondary btn-sm active waves-effect waves-light">Week</button>
                            <button type="button" class="btn btn-secondary btn-sm active waves-effect waves-light">Month</button>-->
                        </div>
                    </div>
                    <div class="chart-container" style="height: 350px;">
                        <div id="chart-2" class="chart-placeholder"></div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-block bg-white">
                    <div class="clearfix mb-1">
                        <h5 class="float-xs-left">PORCENTAJE X TIPO TURNO (<?= DATE('d-m-Y') ?>)</h5>
                        <div class="float-xs-right">
                        </div>
                    </div>

                    <div class="chart-container" style="height: 350px;">
                        <div id="chart-3" class="chart-placeholder"></div>
                    </div>
                </div>
            </div>

        </div>

    <div class="row row-md mb-2">

    <div class="col-md-6">
        <div class="box box-block bg-white"  style="overflow: auto;  max-height: 500px">
            <h5 class="mb-2 text-primary">CANTIDAD DE TURNOS ATENDIDOS POR USUARIO (<?= DATE('d-m-Y') ?>)</h5>
            <div id="ListadoCantidadTurnosUsuarios"></div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="box box-block bg-white"  style="overflow: auto;  max-height: 500px">
            <h5 class="mb-2 text-success">CANTIDAD DE TURNOS POR TIPO TURNO (<?= DATE('d-m-Y') ?>)</h5>
            <div id="ListadoCantidadTurnosTipoTurno"></div>
        </div>
    </div>




    </div>


    </div>
    </div>
    </div>
    <!-- Footer -->


    <footer class="footer" >
    <div class="container-fluid">
        <div class="row text-xs-center">
            <div class="col-sm-4 text-sm-left mb-0-5 mb-sm-0">
                <?=date("Y") ?> © <?=NOMBRE_APLICATION.VERSION ?>
            </div>
            <div class="col-sm-8 text-sm-right">
                <ul class="nav nav-inline l-h-2">
                    <li class="nav-item"><a class="nav-link text-black" href="#">Ayuda</a></li>
                </ul>
            </div>
        </div>
    </div>
    </footer>

    </div> <!-- BODY -->

    </div>

    <input type="text" id="DateTime" hidden>
    <input type="hidden" value="<?= $_SESSION['DataUserOnline']['Usuario']->Departamento ?>" name="Departamento" id="Departamento">
    <input type="hidden" value="<?= $_SESSION['DataUserOnline']['Usuario']->DepartamentoID ?>" name="DepartamentoID" id="DepartamentoID">
    <input type="hidden" id="SucursalID" name="SucursalID"  value="<?= $_SESSION['DataUserOnline']['Usuario']->SucursalID ?>"><br>
    <input type="hidden" id="EmpresaCodigo" name="EmpresaCodigo"  value="<?= $_SESSION['DataUserOnline']['Usuario']->EmpresaCodigo ?>">
            

    <script type="text/javascript" src="vendor/detectmobilebrowser/detectmobilebrowser.js"></script>
    <!---<script type="text/javascript" src="vendor/jscrollpane/jquery.mousewheel.js"></script>-->
    <script type="text/javascript" src="vendor/jscrollpane/mwheelIntent.js"></script>
    <script type="text/javascript" src="vendor/jscrollpane/jquery.jscrollpane.min.js"></script>
    <script type="text/javascript" src="vendor/jquery-fullscreen-plugin/jquery.fullscreen-min.js"></script>
    <script type="text/javascript" src="vendor/switchery/dist/switchery.min.js"></script>
    <script type="text/javascript" src="vendor/toastr/toastr.min.js"></script>

    <script type="text/javascript" src="vendor/DataTables/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="vendor/DataTables/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="vendor/DataTables/Responsive/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="vendor/DataTables/Responsive/js/responsive.bootstrap4.min.js"></script>


    <script type="text/javascript" src="vendor/waves/waves.min.js"></script>
    <script type="text/javascript" src="vendor/switchery/dist/switchery.min.js"></script>
    <script type="text/javascript" src="vendor/flot/jquery.flot.min.js"></script>
    <script type="text/javascript" src="vendor/flot/jquery.flot.pie.js"></script>
    <script type="text/javascript" src="vendor/flot/jquery.flot.stack.js"></script>
    <script type="text/javascript" src="vendor/flot/jquery.flot.resize.min.js"></script>
    <script type="text/javascript" src="vendor/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>

    <!-- Neptune JS -->
    <script type="text/javascript" src="vendor/js/app.js"></script>
    <script type="text/javascript" src="vendor/js/administracion.js"></script>


