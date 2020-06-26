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
          <iframe width="100%" height="180px" src="{{ $post->ubicacion }}" frameborder="0" style="border:none;" allowvr="yes" allow="vr; xr; accelerometer; magnetometer; gyroscope; autoplay; encrypted-media; picture-in-picture;" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel="" allowfullscreen>
          </iframe>
        </div>

        @if($post->category->name =='Murales')
        <div class="col s12 pad-0">
          <h5 class="bot-20 sec-tit  ">Realidad Virtual </h5>
          <a-scene light="defaultLightsEnabled: false" shadow="type=pcfsoft" style="height: 300px;
                                width: 100%;" embedded>
            <a-entity light="type: ambient; intensity: 0.1"></a-entity>

            <a-sky color="#87CEEB"></a-sky>

            <a-entity position="0 0 0">
              <a-camera universal-controls>
                <a-entity raycaster="far: 150; objects: .intersectable" cursor geometry="primitive: ring; radiusOuter: 0.015;
                        radiusInner: 0.01; segmentsTheta: 32" material="color: #283644; shader: flat" position="0 0 -0.75"></a-entity>
              </a-camera>
            </a-entity>

            <!--x y z -->
            <!--Floor -->
            <a-entity geometry="primitive:box; depth: 20; height:0.1; width: 30" position="0 0 0" material="src: url(/images/images/floor.jpg); repeat: 30 20; metalness: 0; roughness: 1 ">
            </a-entity>

            <!--Ceiling -->
            <a-entity geometry="primitive:box; depth: 20; height:0.1; width: 30" position="0 10 0" material="src: url(/images/images/wall_2.jpg); repeat: 10 15; metalness: 0; roughness: 1">
            </a-entity>

            <!--North Wall Pictures-->
            <a-entity geometry="primitive: box; depth: 0.2; height:10; width: 30" position="0 5 10" material="color : {{ $post->color_vr }}; repeat: 30 10; metalness: 0; roughness: 1">
            </a-entity>

            <a-text value="{{ $post->title }}" aling="center" color="#fff" position="-3.9 6 -9.5" scale="6.4 9.3 8.9">
            </a-text>

            <a-text value="Autor:{{ $post->pintor_vr }}" aling="center" color="#fff" position="-2.2 3.7 -9.5" scale="2.6 2.4 4.1">
            </a-text>

            <!--East Wall-->
            <a-entity geometry="primitive: box; depth: 17.5; height: 1.25; width: 0.2" position="15 9.375 0" material="src: url(/images/images/wall_2.jpg); repeat: 17.5 1.25; metalness: 0; roughness: 1">
            </a-entity>

            <a-entity geometry="primitive: box; depth: 17.5; height: 1.25; width: 0.2" position="15 0.625 0" material="src: url(/images/images/wall_2.jpg); repeat: 17.5 1.25; metalness: 0; roughness: 1">
            </a-entity>

            <a-entity geometry="primitive: box; depth: 1.25; height: 10; width: 0.2" position="15 5 9.375" material="src:url(/images/images/wall_2.jpg); repeat: 1.25 10; metalness: 0; roughness: 1">
            </a-entity>

            <a-entity geometry="primitive: box; depth: 1.25; height: 10; width: 0.2" position="15 5 -9.375" material="src:url(/images/images/wall_2.jpg); repeat: 1.25 10; metalness: 0; roughness: 1">
            </a-entity>

            <a-entity geometry="primitive: box; depth: 7; height: 0.1; width: 6.6" position="-14.9 5.8 0" material="src: url(/images/images/icon.png)" ) scale="0.7 0.7 0.7" rotation="-90 -90 180 ">
            </a-entity>

            <a-text value="FusaTour" aling="center" color="#000" position="-14.9 2.7 1.4" scale="2.6 2.4 4.1" rotation="0 90 0 ">
            </a-text>

            <!--Window in East Wall -->
            <a-entity geometry="primitive: box; depth: 17.5; height: 7.5; width: 0.1" position="15 5 0" material="src: url(/images/{{ $post->vrimg_1 }})">
            </a-entity>

            <a-entity geometry="primitive: box; depth: 15; height: 10; width: 0.2" position="-15 5 -2.5" material="src: url(/images/images/wall_2.jpg); repeat: 15 10; metalness: 0; roughness: 1">
            </a-entity>

            <a-entity geometry="primitive: box; depth: 2; height: 10; width: 0.2" position="-15 5 9" material="src: url(/images/images/wall_2.jpg); repeat: 2 10; metalness: 0; roughness: 1">
            </a-entity>

            <a-entity geometry="primitive: box; depth: 3; height: 5; width: 0.2" position="-15 7.5 6.5" material="src: url(/images/images/wall_2.jpg); repeat: 3 5; metalness: 0; roughness: 1">
            </a-entity>

            <a-entity geometry="primitive: box; depth: 15; height:10; width: 0.2" position="-15 5 10" material="src: url(/images/images/wall_2.jpg); repeat: 30 10; metalness: 0; roughness: 1">
            </a-entity>

            <!--South Wall-->
            <a-entity geometry="primitive: box; depth: 0.2; height:10; width: 30" position="0 5 -10" material="color : {{ $post->color_vr }}; repeat: 30 10; metalness: 0; roughness: 1">
            </a-entity>

            <!-- Grass Outside-->
            <a-entity geometry="primitive: box; depth: 500; height: 0.05; width: 500" position="0 0 0" material="src: url(/images/images/grass.jpg); repeat: 500 500; metalness: 0; roughness: 1">
            </a-entity>

            <!-- Ceiling Lights -->
            <a-entity position="-5 3 0">
              <a-entity class="MainLighting" light="type: point; intensity: 0.75; distance: 50; castShadow:true;" position="0 2 0">
              </a-entity>

              <a-gltf-model src="#ceiling_light" scale="25 25 25"> </a-gltf-model>
            </a-entity>

            <a-entity position="5 3 0">
              <a-entity class="MainLighting" light="type: point; intensity: 0.75; distance: 50; castShadow:true;" position="0 2 0">
              </a-entity>

              <a-gltf-model src="#ceiling_light" scale="25 25 25"> </a-gltf-model>
            </a-entity>

            <!--Picture -->
            <a-entity geometry="primitive: box; depth: 7; height: 0.1; width: 6.6" position="7 5 9.9" material="src: url(/images/{{ $post->vrimg_2 }})" ) rotation="270 180 0">
            </a-entity>

            <a-entity geometry="primitive: box; depth: 7; height: 0.1; width: 6.6" position="-3 5 9.9" material="src: url(/images/{{ $post->vrimg_3 }})" ) rotation="270 180 0">
            </a-entity>
          </a-scene>
        </div>
                @elseif($post->category->name =='Monumentos')
        <h3>Monumentos</h3>
        @elseif($post->category->name =='EcoTurismo')
        <h3>EcoTurismo</h3>
        @endif


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