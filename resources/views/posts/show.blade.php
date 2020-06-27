@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')

<img class="img_presentation" src="/images/{{ $post->urlimg }}">

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
          <iframe src="{{ $post->ubicacion }}" frameborder="0" class="iframe" allowvr="yes" allow="vr; xr; accelerometer; magnetometer; gyroscope; autoplay; encrypted-media; picture-in-picture;" allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel="" allowfullscreen>
          </iframe>
        </div>

        @if($post->escena_vr =='1_Escena')
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
        @elseif($post->escena_vr =='2_Escena')
        <div class="col s12 pad-0">
          <h5 class="bot-20 sec-tit  ">Realidad Virtual </h5>
          <a-scene light="defaultLightsEnabled: false" shadow="type=pcfsoft" style="height: 300px; width: 100%;" embedded>
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

            <a-entity position="0 6 -9.5" text="width: 30; align:center; color: white; value: 
              {{ $post->title }}  ">
            </a-entity>

            <a-entity position="0 3.7 -9.5" text="width: 15; align:center; color: white; value: 
              Autor:{{ $post->pintor_vr}}  ">
            </a-entity>


            <!--East Wall-->
            <a-entity geometry="primitive: box; depth: 17.5; height: 1.25; width: 0.2" position="15 9.375 0" material="src: url(/images/images/wall_2.jpg); repeat: 17.5 1.25; metalness: 0; roughness: 1">
            </a-entity>

            <a-entity geometry="primitive: box; depth: 17.5; height: 1.25; width: 0.2" position="15 0.625 0" material="src: url(/images/images/wall_2.jpg); repeat: 17.5 1.25; metalness: 0; roughness: 1">
            </a-entity>

            <a-entity geometry="primitive: box; depth: 1.25; height: 10; width: 0.2" position="15 5 9.375" material="src:url(/images/images/wall_2.jpg); repeat: 1.25 10; metalness: 0; roughness: 1">
            </a-entity>

            <a-entity geometry="primitive: box; depth: 1.25; height: 10; width: 0.2" position="15 5 -9.375" material="src:url(/images/images/wall_2.jpg); repeat: 1.25 10; metalness: 0; roughness: 1">
            </a-entity>

            <a-entity geometry="primitive: box; depth: 7; height: 0.1; width: 6.6" position="-14.9 5.8 0" material="src: url(/images/images/icon.png)" scale="0.7 0.7 0.7" rotation="-90 -90 180 ">
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
            <a-entity geometry="primitive: box; depth: 7; height: 0.1; width: 6.6" position="7 5 9.9" material="src: url(/images/{{ $post->vrimg_2 }})" rotation="270 180 0">
            </a-entity>

            <a-entity rotation="0 180 0" position="-2 3.5 5.8" text="width: 4.5; color: black; value: 
              {{ $post->excerpt }}">
            </a-entity>
          </a-scene>
        </div>
        @elseif($post->escena_vr =='3_Escena')
        <div class="col s12 pad-0">
          <h5 class="bot-20 sec-tit  ">Realidad Virtual </h5>
          <a-scene background="color: #ECECEC" embedded>
            <a-assets>
              <img id="point1" src="img/1.jpg" />
              <img id="point2" src="img/2.jpg" />
              <img id="point3" src="img/3.jpg" />
              <img id="point4" src="img/4.jpg" />

              <img id="hotspot" src="https://cdn.glitch.com/2087dfa6-bd02-4451-a189-36095a66f386%2Fup-arrow.png?1545397127546" />
            </a-assets>

            <a-entity id="spots" hotspots>
              <a-entity id="group-point1">
                <a-image spot="linkto:#point2;spotgroup:group-point2" position="-10.5 1.2 -1.7" rotation="-8.5 92 0"></a-image>
              </a-entity>
              <a-entity id="group-point2" scale="0 0 0">
                <a-image spot="linkto:#point3;spotgroup:group-point3" position="10 0 -8"></a-image>
                <a-image spot="linkto:#point1;spotgroup:group-point1" position="0 0 10"></a-image>
              </a-entity>
              <a-entity id="group-point3" scale="0 0 0">
                <a-image spot="linkto:#point2;spotgroup:group-point2" position="10 0 3"></a-image>
                <a-image spot="linkto:#point4;spotgroup:group-point4" position="-10 0 -3"></a-image>
              </a-entity>
              <a-entity id="group-point4" scale="0 0 0">
                <a-image spot="linkto:#point3;spotgroup:group-point3" position="0 0 -10"></a-image>
              </a-entity>
            </a-entity>

            <a-sky id="skybox" src="#point1"></a-sky>

            <a-entity id="cam" camera position="0 1.6 0" look-controls>
              <a-entity cursor="fuse:true;fuseTimeout:2000" geometry="primitive:ring;radiusInner:0.01;radiusOuter:0.02" position="0 0 -1.8" material="shader:flat;color:#badc58" animation__mouseenter="property:scale;to:3 3 3;startEvents:mouseenter;endEvents:mouseleave;dir:reverse;dur:2000;loop:1">
              </a-entity>
            </a-entity>

          </a-scene>
        </div>
        @endif

        @elseif($post->escena_vr =='4_Escena')
        <div class="col s12 pad-0">
          <h5 class="bot-20 sec-tit  ">Realidad Virtual </h5>
          <a-scene background="color: #ECECEC" embedded>
            <a-assets>
              <img id="point1" src="img/1.jpg" />
              <img id="point2" src="img/2.jpg" />
              <img id="point3" src="img/3.jpg" />
              <img id="point4" src="img/4.jpg" />
              <img id="point5" src="img/5.jpg" />
              <img id="point6" src="img/6.jpg" />

              <img id="hotspot" src="https://cdn.glitch.com/2087dfa6-bd02-4451-a189-36095a66f386%2Fup-arrow.png?1545397127546" />
            </a-assets>

            <a-entity id="spots" hotspots>
              <a-entity id="group-point1">
                <a-image spot="linkto:#point2;spotgroup:group-point2" position="0 1 -10" rotation="0 0 0"></a-image>
              </a-entity>
              <a-entity id="group-point2" scale="0 0 0">
                <a-image spot="linkto:#point3;spotgroup:group-point3" position="2.2 2.1 -11" rotation="0 0 0"></a-image>
                <a-image spot="linkto:#point1;spotgroup:group-point1" position="0 0 10"></a-image>
              </a-entity>
              <a-entity id="group-point3" scale="0 0 0">
                <a-image spot="linkto:#point2;spotgroup:group-point2" position="10 0 -10"></a-image>
                <a-image spot="linkto:#point4;spotgroup:group-point4" position="5 0 10" rotation="19 11 0"></a-image>
              </a-entity>
              <a-entity id="group-point4" scale="0 0 0">
                <a-image spot="linkto:#point3;spotgroup:group-point3" position="10 0 3"></a-image>
                <a-image spot="linkto:#point5;spotgroup:group-point5" position="0 0 -10"></a-image>
              </a-entity>
              <a-entity id="group-point5" scale="0 0 0">
                <a-image spot="linkto:#point4;spotgroup:group-point4" position="10 0 -6.5"></a-image>
                <a-image spot="linkto:#point6;spotgroup:group-point6" position="-10 1 0" rotation="18.8 88.2 0.4"></a-image>
              </a-entity>
              <a-entity id="group-point6" scale="0 0 0">
                <a-image spot="linkto:#point5;spotgroup:group-point5" position="10 0 0" rotation="-96 -80 -96"></a-image>
              </a-entity>
            </a-entity>

            <a-sky id="skybox" src="#point1"></a-sky>

            <a-entity id="cam" camera position="0 1.6 0" look-controls>
              <a-entity cursor="fuse:true;fuseTimeout:2000" geometry="primitive:ring;radiusInner:0.01;radiusOuter:0.02" position="0 0 -1.8" material="shader:flat;color:#badc58" animation__mouseenter="property:scale;to:3 3 3;startEvents:mouseenter;endEvents:mouseleave;dir:reverse;dur:2000;loop:1">
              </a-entity>
            </a-entity>

          </a-scene>
        </div>
        @endif

      </div>
      <div class="divider"></div>

    </div>
  </div>

  @if (Auth::guest())
  <h5 class="bot-20 sec-tit  ">Califica este Lugar </h5>
  <div class="col s12 center-align">
    <a href="{{ route('register') }}" class="waves-effect waves-light btn-large button-blue"><i class="mdi mdi-bookmark-plus mdi-transition1"></i>Registrarse</a>
    <a href="{{ route('login') }}" class="waves-effect waves-light btn-large button-red"><i class="mdi mdi-account-circle mdi-transition1"></i>Ingresar</a>
  </div>
  @else
  <div class="row ">
    <div class="col s12 pad-0">
      <h5 class="bot-20 sec-tit  ">Califica este Lugar </h5>
      <div class="row">

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
          <textarea class="ocultar" name="id_post" for="textarea-normal">{{$post->id}}</textarea>

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