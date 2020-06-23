@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')

<img style="height:250px; width: 100%;" src="/images/{{ $post->urlimg }}">

<div class="container">

    <div class="section">
        <div class="row ui-mediabox blogs bot-0">


            <div class="col s12">

                <h5 class="title">{{ $post->title }}</h5>
                <span class="small date">{{ $post->published_at->format('M d') }}</span>
                <span class="small tags">
                    <a class="small" href="#!">{{ $post->category->name }}</a>,
                    <a class="small" href="#!">
                        @foreach ($post->tags as $tag )
                        <a class="small" href="#!">#{{ $tag->name }}</a>
                        @endforeach
                    </a>
                </span>
                <p class="bot-0 text">
                    {!! $post->body !!}
                </p>

            </div>
            <div class="col s12">
                <div class="col s12 pad-0">
                    <h5 class="bot-20 sec-tit  ">Ubicación </h5>
                    <iframe 
                        width="100%" 
                        height="180px" 
                        src="{{ $post->ubicacion }}" 
                        frameborder="0" 
                        style="border:none;" 
                        allowvr="yes" 
                        allow="vr; xr; accelerometer; magnetometer; gyroscope; autoplay; encrypted-media; picture-in-picture;" 
                        allowfullscreen mozallowfullscreen="true" 
                        webkitallowfullscreen="true" 
                        onmousewheel="" 
                        allowfullscreen>
                    </iframe>
                </div>
                <div class="col s12 pad-0">
                    <h5 class="bot-20 sec-tit  ">Realidad Virtual </h5>
                    <iframe 
                        width="100%" 
                        height="280px" 
                        src="{{ $post->urlvr }}" 
                        frameborder="0" 
                        style="border:none;" 
                        allowvr="yes" 
                        allow="vr; xr; accelerometer; magnetometer; gyroscope; autoplay; encrypted-media; picture-in-picture;" 
                        allowfullscreen mozallowfullscreen="true" 
                        webkitallowfullscreen="true" 
                        onmousewheel="" 
                        allowfullscreen>
                    </iframe>
                </div>
            </div>
            <div class="divider"></div>

        </div>
    </div>

    @if (Auth::guest())
    <h5 class="bot-20 sec-tit  ">Califica este Lugar </h5>
    <div class="col s12 center-align">
        <a href="{{ route('register') }}" class="waves-effect waves-light btn-large" style="background-color: #0abde3"><i class="mdi mdi-bookmark-plus mdi-transition1"></i>Registrarse</a>
        <a href="{{ route('login') }}" class="waves-effect waves-light btn-large" style="background-color: #eb4d4b"><i class="mdi mdi-account-circle mdi-transition1"></i>Ingresar</a>
    </div>
    @else
    <div class="row ">
        <div class="col s12 pad-0">
            <h5 class="bot-20 sec-tit  ">Califica este Lugar </h5>
            <div class="row">
                <style>
                    input[type="radio"] {
                        display: none;
                        /*position: absolute;top: -1000em;*/
                    }

                    label {
                        color: grey;
                    }

                    .clasificacion {
                        direction: rtl;
                        unicode-bidi: bidi-override;
                    }

                    label:hover,
                    label:hover~label {
                        color: orange;
                    }

                    input[type="radio"]:checked~label {
                        color: orange;
                    }

                    .estrella label {
                        font-size: 16vw;
                        /*Tamaño de fuente cambia de acuerdo al view port*/
                    }
                </style>

                <form action="{{ route('create_comment', ['post' => $post->url ]) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="input-field col s12 estrella center-align">
                        <p class="clasificacion">
                            <input name="point" id="radio5" type="radio" name="estrellas" value="5">
                            <label for="radio5">&#9733;</label>
                            <input name="point" id="radio4" type="radio" name="estrellas" value="4">
                            <label for="radio4">&#9733;</label>
                            <input name="point" id="radio3" type="radio" name="estrellas" value="3">
                            <label for="radio3">&#9733;</label>
                            <input name="point" id="radio2" type="radio" name="estrellas" value="2">
                            <label for="radio2">&#9733;</label>
                            <input name="point" id="radio1" type="radio" name="estrellas" value="1">
                            <label for="radio1">&#9733;</label>
                        </p>
                    </div>

                    <div class="input-field col s12">
                        <textarea name="comment" id="textarea-normal" class="materialize-textarea validate"></textarea>
                        <label for="textarea-normal">Comentario</label>
                        <span class="helper-text" data-error="Please enter text" data-success=""></span>
                    </div>
                    <textarea style="display:none;" name="id_post" for="textarea-normal">{{$post->id}}</textarea>

                    <button class="waves-effect waves-light btn bg-primary right">Enviar</button>
                </form>

            </div>


        </div>
    </div>
    @endif
    <div class="row ">
        <div class="col s12 pad-0">
            <h5 class="bot-20 sec-tit  ">Calificaciones y Reseñas </h5>

            <div class="row">
                <style>
                    input[type="radio"] {
                        display: none;
                        /*position: absolute;top: -1000em;*/
                    }

                    .clasificacion2 label {
                        color: #ffd32a;
                    }

                    .clasificacion {
                        direction: rtl;
                        unicode-bidi: bidi-override;
                    }


                    .estrella2 label {
                        font-size: 25vw;
                    }
                </style>
                <div class="input-field col s12 estrella2 center-align">
                    <p class="clasificacion2">
                        <label>{{$post->point}}&#9733;</label>
                    </p>
                </div>


                <ul class="collection contacts z-depth-1">
                    @foreach ($post->comments as $comment)


                    <li class="collection-item avatar">

                        <a href="#" class='chatlink waves-effect'>
                            <img src="/images/{{ $comment->user->avatar }}" alt="Simona Gotto" title="Simona Gotto" class="circle">
                            <span class="title">{{ $comment->user->name }}</span>
                            <p>{{ $comment->text }}</p>
                        </a>

                        <div class="secondary-content">
                            <p>{{ $comment->point }} <label for="radio1">&#9733;</label></p>
                        </div>

                        <div class="secondary-content">
                            <p>{{ $comment->point }} <label for="radio1">&#9733;</label></p>
                        </div>
                    </li>

                    @endforeach



                </ul>
            </div>
        </div>
    </div>

    <div class="spacer"></div>

</div>
@endsection