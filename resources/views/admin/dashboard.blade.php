@extends ('admin.layout')

@section('content')

<section class="content">
    
    <div class="row">

        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon btn-outline-primary"><i class="fas fa-map-marked-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Lugares</span>
                    <span class="info-box-number">{{ $posts->count() }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon btn-outline-danger"><i class="fas fa-comments"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Comentarios</span>
                    <span class="info-box-number">{{ $comments->count() }}</span>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon btn-outline-success"><i class="fas fa-running"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Actividades</span>
                    <span class="info-box-number">{{ $tags->count() }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon btn-outline-warning"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Usuarios</span>
                    <span class="info-box-number">{{ $users->count() }}</span>
                </div>
            </div>
        </div>
    </div>
</section>    



@stop