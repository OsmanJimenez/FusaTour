@extends ('admin.layout')

@section('header')

<div class="row mb-2">
    <div class="col-sm-6">
        <h1 class="m-0 text-dark">Configuración</h1>
    </div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Menu</a></li>
            <li class="breadcrumb-item active">Configuración</li>
        </ol>
    </div>
</div>

@stop

@section('content')

<section class="content">
    <div class="row">
        <div class="col-12">
            <div class="card shadow p-3 mb-5 bg-white rounded border-top border-primary">
                <div class="card-header ">
                    <h3 class="card-title">Base de Datos</h3>
                </div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
                            <form method="POST" action="../../adminlts/Backup.php" class="display-inline">
                                <button type="button" class="btn btn-sm btn-outline-primary btn-lg btn-block" data-toggle="modal"
                                    data-target="#exampleModal">
                                    <i class="fas fa-server"></i>  Generar Copia de Seguridad
                                </button>

                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Generar</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estas seguro de generar la copia de Seguridad?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cancelar</button>
                                                <button class="btn btn-primary" type="submit">Generar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <form method="POST" action="../../adminlts/Restore.php" class="display-inline">
                                <button type="button" class="btn btn-sm btn-outline-success btn-lg btn-block" data-toggle="modal"
                                    data-target="#exampleModal2">
                                    <i class="fas fa-server"></i>  Restablecer Copia de Seguridad
                                </button>

                                <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Restablecer</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                ¿Estas seguro de restablecer la copia de Seguridad?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cancelar</button>
                                                <button class="btn btn-primary" type="submit">Restablecer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>


@stop
