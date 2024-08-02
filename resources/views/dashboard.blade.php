<div class="row">
    <div class="col-sm-6 col-lg-3 alertas">
        <div class="card mb-4 text-white bg-primary">
            <div class="card-body">
                <div class="fs-4 fw-semibold">Total de Reportes</div>
                <div>2000</div>
                <div class="progress progress-white progress-thin my-2">
                    <div class="progress-bar" role="progressbar" style="width: 100%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis-inverse">Cantidad Total de Reportes...</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3 alertas">
        <div class="card mb-4 text-white bg-warning">
            <div class="card-body">
                <div class="fs-4 fw-semibold">Reportes Pendientes</div>
                <div>1000</div>
                <div class="progress progress-white progress-thin my-2">
                    <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis-inverse">Cantidad de Reportes Pedientes</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3 alertas">
        <div class="card mb-4 text-white bg-danger">
            <div class="card-body">
                <div class="fs-4 fw-semibold">Reportes + 3 días</div>
                <div>500</div>
                <div class="progress progress-white progress-thin my-2">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis-inverse">Cantidad de Reportes con más de 3 días</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-3 alertas">
        <div class="card mb-4 text-white bg-success">
            <div class="card-body">
                <div class="fs-4 fw-semibold">Reportes Resueltos</div>
                <div>500</div>
                <div class="progress progress-white progress-thin my-2">
                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis-inverse">Cantidad de Reportes Resueltos</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
</div>
<div class="row">
    <div class="col-sm-3 col-lg-5">
        <div class="card mb-4 alertas">
            <div class="card-body">
                <div class="fs-4 fw-semibold">Clientes</div>
                <div>10</div>
                <div class="progress progress-thin my-2">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">Cantidad de Clientes</small>
            </div>
        </div>

        <div class="card mb-4 alertas">
            <div class="card-body">
                <div class="fs-4 fw-semibold">Establecimientos</div>
                <div>30</div>
                <div class="progress progress-thin my-2">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">Cantidad de Establecimientos registrados</small>
            </div>
        </div>

        <div class="card mb-4 alertas">
            <div class="card-body">
                <div class="fs-4 fw-semibold">Técnicos</div>
                <div>7</div>
                <div class="progress progress-thin my-2">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">Cantidad de Técnicos registrados</small>
            </div>
        </div>

        <div class="card mb-4 alertas">
            <div class="card-body">
                <div class="fs-4 fw-semibold">Usuarios</div>
                <div>7</div>
                <div class="progress progress-thin my-2">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">Cantidad de Usuarios registrados</small>
            </div>
        </div>
    </div>
    <div class="col-sm-3 col-lg-7">
        <div class="card">
            <div class="card-header text-bg-dark">
                <h5>Panel de Generador de Graficos</h5>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-4">
                        <h6>Selector de Gráfico</h6>
                        <div>
                            <select id="selectorGrafico1" class="form-control">
                                <option value="polarArea">Area Polar</option>
                                <option value="bar">Barra</option>
                                <option value="doughnut">Dona</option>                                
                                <option value="radar">Radar</option>
                                <option value="line">Linea</option>
                                <option value="pie">Pastel</option>    
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <canvas style="max-width: 700px; max-height: 500px;" id="grafico"></canvas>
                    </div>
                </div>
                
            </div>
            <div class="card-footer">
                <button class="btn btn-success">Exportar a PNG</button>
            </div>
        </div>
        
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 col-lg-4 alertas">
        <div class="card mb-4">
            <div class="card-body">
                <div class="fs-4 fw-semibold">Establecimientos en Linea</div>
                <div>10</div>
                <div class="progress progress-thin my-2">
                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">Cantidad de Establecimientos en linea</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-4 alertas">
        <div class="card mb-4">
            <div class="card-body">
                <div class="fs-4 fw-semibold">Establecimientos desconectados</div>
                <div>20</div>
                <div class="progress progress-thin my-2">
                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">Cantidad de Establecimientos desconectados</small>
            </div>
        </div>
    </div>
    <!-- /.col-->
    <div class="col-sm-6 col-lg-4 alertas">
        <div class="card mb-4">
            <div class="card-body">
                <div class="fs-4 fw-semibold">Establecimientos sin comunicación</div>
                <div>25</div>
                <div class="progress progress-thin my-2">
                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div><small class="text-medium-emphasis">Cantidad de Establecimientos sin comunicación</small>
            </div>
        </div>
    </div>
    
</div>
