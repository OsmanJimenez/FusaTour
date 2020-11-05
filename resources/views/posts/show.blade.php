@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')

<!-- AFRAME - START -->
<script src="/assets/js/aframe.js"></script>
<script src="/assets/js/aframe-extras.min.js"></script>
<!-- AFRAME - END -->

<script type="text/javascript">
    // A-Frame Buttons
    AFRAME.registerComponent('hotspots', {
        init: function () {
            this.el.addEventListener('reloadspots', function (evt) {

                //get the entire current spot group and scale it to 0
                var currspotgroup = document.getElementById(evt.detail.currspots);
                currspotgroup.setAttribute("scale", "0 0 0");

                //get the entire new spot group and scale it to 1
                var newspotgroup = document.getElementById(evt.detail.newspots);
                newspotgroup.setAttribute("scale", "1 1 1");
            });
        }
    });
    AFRAME.registerComponent('spot', {
        schema: {
            linkto: {
                type: "string",
                default: ""
            },
            spotgroup: {
                type: "string",
                default: ""
            },
        },
        init: function () {

            //add image source of hotspot icon
            this.el.setAttribute("src", "#hotspot");
            //make the icon look at the camera all the time
            this.el.setAttribute("look-at", "#cam");

            var data = this.data;

            this.el.addEventListener('click', function () {
                //set the skybox source to the new image as per the spot
                var sky = document.getElementById("skybox");
                sky.setAttribute("src", data.linkto);

                var spotcomp = document.getElementById("spots");
                var currspots = this.parentElement.getAttribute("id");
                //create event for spots component to change the spots data
                spotcomp.emit('reloadspots', {
                    newspots: data.spotgroup,
                    currspots: currspots
                });
            });
        }
    });

</script>

<img class="img_presentation" src="/images/{{ $post->urlimg }}" alt="FusaTour {{ $post->urlimg }}">

<div class="redondeado"></div>

<div class="container">
    <div class="section">
        <div class="row ui-mediabox blogs bot-0">
            <div class="col s12">
                <h5 class="title">{{ $post->title }}</h5>
                <a id="aumentar" class="title waves-effect waves-circle navicon right  show-on-large pulse"><i
                        class="mdi mdi-code-greater-than"></i></a>
                <a id="disminuir" class="title waves-effect waves-circle navicon right  show-on-large pulse"><i
                        class="mdi mdi-code-less-than"></i></a>
                <a id="reset" class="title waves-effect waves-circle navicon right  show-on-large pulse"><i
                        class="mdi mdi-code-equal"></i></a>
                <span class="small date">{{ $post->published_at->format('M d') }}</span>
                <span class="small tags">
                    <a class="small" href="#!">{{ $post->category->name }}</a>
                </span>

                <div class="contenedor">
                    <p>{!! $post->body !!}</p>
                </div>
                <div class="col s12">
                    <h7 class="right">No olvides Compartir:
                        <a id="shareButton" class=" btn-floating pulse green lighten-2 ">
                            <i class="mdi mdi-share-variant"></i>
                        </a>
                    </h7>
                </div>
                <h5 class="title">Actividades a practicar:</h5>
                @foreach ($post->tags as $tag )
                <a class="small" href="/actividades/{{ $tag->name }}">
                    <img src="/images/{{ $tag->urlimg }}" alt="FusaTour FusaTour {{ $tag->name }}"
                        title="FusaTour {{ $tag->name }}" class="circle responsive-img min">
                </a>
                @endforeach
            </div>
            <div class="col s12">
                <div class="col s12 pad-0">
                    <h5 class="bot-20 sec-tit  ">Ubicación </h5>
                    <iframe src="{{ $post->ubicacion }}" frameborder="0" class="iframe" allowvr="yes"
                        allow="vr; xr; accelerometer; magnetometer; gyroscope; autoplay; encrypted-media; picture-in-picture;"
                        allowfullscreen mozallowfullscreen="true" webkitallowfullscreen="true" onmousewheel=""
                        style="height: 300px; width: 100%;">
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
                        radiusInner: 0.01; segmentsTheta: 32" material="color: #283644; shader: flat"
                                    position="0 0 -0.75"></a-entity>
                            </a-camera>
                        </a-entity>

                        <!--x y z -->
                        <!--Floor -->
                        <a-entity geometry="primitive:box; depth: 20; height:0.1; width: 30" position="0 0 0"
                            material="src: url(/images/images/floor.jpg); repeat: 30 20; metalness: 0; roughness: 1 ">
                        </a-entity>

                        <!--Ceiling -->
                        <a-entity geometry="primitive:box; depth: 20; height:0.1; width: 30" position="0 10 0"
                            material="src: url(/images/images/wall_2.jpg); repeat: 10 15; metalness: 0; roughness: 1">
                        </a-entity>

                        <!--North Wall Pictures-->
                        <a-entity geometry="primitive: box; depth: 0.2; height:10; width: 30" position="0 5 10"
                            material="color : {{ $post->color_vr }}; repeat: 30 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity position="0 6 -9.5" text="width: 30; negate:false; font:/font/Roboto-Bold-msdf.json; align:center; color: black; value: 
              {{ $post->title }}  ">
                        </a-entity>

                        <a-entity position="0 3.7 -9.5" text="width: 15; negate:false; font:/font/Roboto-Bold-msdf.json; align:center; color: black; value: 
              Autor: {{ $post->pintor_vr}}  ">
                        </a-entity>


                        <!--East Wall-->
                        <a-entity geometry="primitive: box; depth: 17.5; height: 1.25; width: 0.2" position="15 9.375 0"
                            material="src: url(/images/images/wall_2.jpg); repeat: 17.5 1.25; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 17.5; height: 1.25; width: 0.2" position="15 0.625 0"
                            material="src: url(/images/images/wall_2.jpg); repeat: 17.5 1.25; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 1.25; height: 10; width: 0.2" position="15 5 9.375"
                            material="src:url(/images/images/wall_2.jpg); repeat: 1.25 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 1.25; height: 10; width: 0.2" position="15 5 -9.375"
                            material="src:url(/images/images/wall_2.jpg); repeat: 1.25 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 7; height: 0.1; width: 6.6" position="-14.9 5.8 0"
                            material="src: url(/images/images/icon.png)" ) scale="0.7 0.7 0.7" rotation="-90 -90 180 ">
                        </a-entity>

                        <a-text value="FusaTour" aling="center" color="#000" position="-14.9 2.7 1.4"
                            scale="2.6 2.4 4.1" rotation="0 90 0 ">
                        </a-text>

                        <!--Window in East Wall -->
                        <a-entity geometry="primitive: box; depth: 17.5; height: 7.5; width: 0.1" position="15 5 0"
                            material="src: url(/images/{{ $post->vrimg_1 }})">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 15; height: 10; width: 0.2" position="-15 5 -2.5"
                            material="src: url(/images/images/wall_2.jpg); repeat: 15 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 2; height: 10; width: 0.2" position="-15 5 9"
                            material="src: url(/images/images/wall_2.jpg); repeat: 2 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 3; height: 5; width: 0.2" position="-15 7.5 6.5"
                            material="src: url(/images/images/wall_2.jpg); repeat: 3 5; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 15; height:10; width: 0.2" position="-15 5 10"
                            material="src: url(/images/images/wall_2.jpg); repeat: 30 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <!--South Wall-->
                        <a-entity geometry="primitive: box; depth: 0.2; height:10; width: 30" position="0 5 -10"
                            material="color : {{ $post->color_vr }}; repeat: 30 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <!-- Grass Outside-->
                        <a-entity geometry="primitive: box; depth: 500; height: 0.05; width: 500" position="0 0 0"
                            material="src: url(/images/images/grass.jpg); repeat: 500 500; metalness: 0; roughness: 1">
                        </a-entity>

                        <!-- Ceiling Lights -->
                        <a-entity position="-5 3 0">
                            <a-entity class="MainLighting"
                                light="type: point; intensity: 0.75; distance: 50; castShadow:true;" position="0 2 0">
                            </a-entity>

                            <a-gltf-model src="#ceiling_light" scale="25 25 25"> </a-gltf-model>
                        </a-entity>

                        <a-entity position="5 3 0">
                            <a-entity class="MainLighting"
                                light="type: point; intensity: 0.75; distance: 50; castShadow:true;" position="0 2 0">
                            </a-entity>

                            <a-gltf-model src="#ceiling_light" scale="25 25 25"> </a-gltf-model>
                        </a-entity>

                        <!--Picture -->
                        <a-entity geometry="primitive: box; depth: 7; height: 0.1; width: 6.6" position="7 5 9.9"
                            material="src: url(/images/{{ $post->vrimg_2 }})" ) rotation="270 180 0">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 7; height: 0.1; width: 6.6" position="-3 5 9.9"
                            material="src: url(/images/{{ $post->vrimg_3 }})" ) rotation="270 180 0">
                        </a-entity>
                    </a-scene>
                </div>
                @elseif($post->escena_vr =='2_Escena')
                <div class="col s12 pad-0">
                    <h5 class="bot-20 sec-tit  ">Realidad Virtual </h5>
                    <a-scene light="defaultLightsEnabled: false" shadow="type=pcfsoft"
                        style="height: 300px; width: 100%;" embedded>
                        <a-entity light="type: ambient; intensity: 0.1"></a-entity>

                        <a-sky color="#87CEEB"></a-sky>

                        <a-entity position="0 0 0">
                            <a-camera universal-controls>
                                <a-entity raycaster="far: 150; objects: .intersectable" cursor geometry="primitive: ring; radiusOuter: 0.015;
                                    radiusInner: 0.01; segmentsTheta: 32" material="color: #283644; shader: flat"
                                    position="0 0 -0.75"></a-entity>
                            </a-camera>
                        </a-entity>

                        <!--x y z -->
                        <!--Floor -->
                        <a-entity geometry="primitive:box; depth: 20; height:0.1; width: 30" position="0 0 0"
                            material="src: url(/images/images/floor.jpg); repeat: 30 20; metalness: 0; roughness: 1 ">
                        </a-entity>

                        <!--Ceiling -->
                        <a-entity geometry="primitive:box; depth: 20; height:0.1; width: 30" position="0 10 0"
                            material="src: url(/images/images/wall_2.jpg); repeat: 10 15; metalness: 0; roughness: 1">
                        </a-entity>

                        <!--North Wall Pictures-->
                        <a-entity geometry="primitive: box; depth: 0.2; height:10; width: 30" position="0 5 10"
                            material="color : {{ $post->color_vr }}; repeat: 30 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity position="0 6 -9.5" text="width: 30; negate:false; font:/font/Roboto-Bold-msdf.json; align:center; color: black; value: 
              {{ $post->title }}  ">
                        </a-entity>

                        <a-entity position="0 3.7 -9.5" text="width: 15; negate:false; font:/font/Roboto-Bold-msdf.json; align:center; color: black; value: 
              Autor: {{ $post->pintor_vr}}  ">
                        </a-entity>


                        <!--East Wall-->
                        <a-entity geometry="primitive: box; depth: 17.5; height: 1.25; width: 0.2" position="15 9.375 0"
                            material="src: url(/images/images/wall_2.jpg); repeat: 17.5 1.25; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 17.5; height: 1.25; width: 0.2" position="15 0.625 0"
                            material="src: url(/images/images/wall_2.jpg); repeat: 17.5 1.25; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 1.25; height: 10; width: 0.2" position="15 5 9.375"
                            material="src:url(/images/images/wall_2.jpg); repeat: 1.25 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 1.25; height: 10; width: 0.2" position="15 5 -9.375"
                            material="src:url(/images/images/wall_2.jpg); repeat: 1.25 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 7; height: 0.1; width: 6.6" position="-14.9 5.8 0"
                            material="src: url(/images/images/icon.png)" scale="0.7 0.7 0.7" rotation="-90 -90 180 ">
                        </a-entity>

                        <a-text value="FusaTour" aling="center" color="#000" position="-14.9 2.7 1.4"
                            scale="2.6 2.4 4.1" rotation="0 90 0 ">
                        </a-text>

                        <!--Window in East Wall -->
                        <a-entity geometry="primitive: box; depth: 17.5; height: 7.5; width: 0.1" position="15 5 0"
                            material="src: url(/images/{{ $post->vrimg_1 }})">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 15; height: 10; width: 0.2" position="-15 5 -2.5"
                            material="src: url(/images/images/wall_2.jpg); repeat: 15 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 2; height: 10; width: 0.2" position="-15 5 9"
                            material="src: url(/images/images/wall_2.jpg); repeat: 2 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 3; height: 5; width: 0.2" position="-15 7.5 6.5"
                            material="src: url(/images/images/wall_2.jpg); repeat: 3 5; metalness: 0; roughness: 1">
                        </a-entity>

                        <a-entity geometry="primitive: box; depth: 15; height:10; width: 0.2" position="-15 5 10"
                            material="src: url(/images/images/wall_2.jpg); repeat: 30 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <!--South Wall-->
                        <a-entity geometry="primitive: box; depth: 0.2; height:10; width: 30" position="0 5 -10"
                            material="color : {{ $post->color_vr }}; repeat: 30 10; metalness: 0; roughness: 1">
                        </a-entity>

                        <!-- Grass Outside-->
                        <a-entity geometry="primitive: box; depth: 500; height: 0.05; width: 500" position="0 0 0"
                            material="src: url(/images/images/grass.jpg); repeat: 500 500; metalness: 0; roughness: 1">
                        </a-entity>

                        <!-- Ceiling Lights -->
                        <a-entity position="-5 3 0">
                            <a-entity class="MainLighting"
                                light="type: point; intensity: 0.75; distance: 50; castShadow:true;" position="0 2 0">
                            </a-entity>

                            <a-gltf-model src="#ceiling_light" scale="25 25 25"> </a-gltf-model>
                        </a-entity>

                        <a-entity position="5 3 0">
                            <a-entity class="MainLighting"
                                light="type: point; intensity: 0.75; distance: 50; castShadow:true;" position="0 2 0">
                            </a-entity>

                            <a-gltf-model src="#ceiling_light" scale="25 25 25"> </a-gltf-model>
                        </a-entity>

                        <!--Picture -->
                        <a-entity geometry="primitive: box; depth: 7; height: 0.1; width: 6.6" position="7 5 9.9"
                            material="src: url(/images/{{ $post->vrimg_2 }})" rotation="270 180 0">
                        </a-entity>

                        <a-entity rotation="0 180 0" position="-2 3.5 5.8" text="width: 4.5; negate:false; font:/font/Roboto-Bold-msdf.json; color: black; value: 
              {{ $post->content }}">
                        </a-entity>
                    </a-scene>
                </div>
                @elseif($post->escena_vr =='3_Escena')
                <div class="col s12 pad-0">
                    <h5 class="bot-20 sec-tit  ">Realidad Virtual </h5>
                    <a-scene background="color: #ECECEC" style="height: 300px; width: 100%;" embedded>
                        <a-assets>
                            <img id="point1" src="/images/{{ $post->vrimg_1 }}" alt="FusaTour {{ $post->vrimg_1 }}" />
                            <img id="point2" src="/images/{{ $post->vrimg_2 }}" alt="FusaTour {{ $post->vrimg_2 }}" />
                            <img id="point3" src="/images/{{ $post->vrimg_3 }}" alt="FusaTour {{ $post->vrimg_3 }}" />
                            <img id="point4" src="/images/{{ $post->vrimg_4 }}" alt="FusaTour {{ $post->vrimg_4 }}" />
                            <img id="hotspot" src="/images/flecha.png" alt="FusaTour Flecha" />

                        </a-assets>

                        <a-entity id="spots" hotspots>
                            <a-entity id="group-point1">
                                <a-image spot="linkto:#point2;spotgroup:group-point2" scale="2 2 2" color="#130f40"
                                    position="-10.5 1.2 -1.7" rotation="-8.5 92 0">
                                </a-image>
                            </a-entity>
                            <a-entity id="group-point2" scale="0 0 0">
                                <a-image spot="linkto:#point3;spotgroup:group-point3" scale="2 2 2" color="#130f40"
                                    position="10 0 -8"></a-image>
                                <a-image spot="linkto:#point1;spotgroup:group-point1" scale="2 2 2" color="#eb4d4b"
                                    position="0 0 10"></a-image>
                            </a-entity>
                            <a-entity id="group-point3" scale="0 0 0">
                                <a-image spot="linkto:#point2;spotgroup:group-point2" scale="2 2 2" color="#eb4d4b"
                                    position="10 0 3"></a-image>
                                <a-image spot="linkto:#point4;spotgroup:group-point4" scale="2 2 2" color="#130f40"
                                    position="-10 0 -3"></a-image>
                            </a-entity>
                            <a-entity id="group-point4" scale="0 0 0">
                                <a-image spot="linkto:#point3;spotgroup:group-point3" scale="2 2 2" color="#eb4d4b"
                                    position="0 0 -10"></a-image>
                            </a-entity>
                        </a-entity>

                        <a-sky id="skybox" src="#point1"></a-sky>

                        <a-entity id="cam" camera position="0 1.6 0" look-controls>
                            <a-entity cursor="fuse:true;fuseTimeout:2000"
                                geometry="primitive:ring;radiusInner:0.01;radiusOuter:0.02" position="0 0 -1.8"
                                material="shader:flat;color:#6ab04c"
                                animation__mouseenter="property:scale;to:3 3 3;startEvents:mouseenter;endEvents:mouseleave;dir:reverse;dur:2000;loop:1">
                            </a-entity>
                        </a-entity>

                    </a-scene>
                </div>

                @elseif($post->escena_vr =='5_Escena')
                <div class="col s12 pad-0">
                    <h5 class="bot-20 sec-tit  ">Realidad Virtual </h5>
                    <a-scene background="color: #ECECEC" style="height: 300px; width: 100%;" embedded>
                        <a-sky src="/images/{{ $post->vrimg_1 }}" rotation="0 -130 0"></a-sky>
                    </a-scene>
                </div>

                @elseif($post->escena_vr =='4_Escena')
                <div class="col s12 pad-0">
                    <h5 class="bot-20 sec-tit  ">Realidad Virtual </h5>
                    <a-scene background="color: #ECECEC" style="height: 300px; width: 100%;" embedded>
                        <a-assets>
                            <img id="point1" src="/images/{{ $post->vrimg_1 }}" alt="FusaTour {{ $post->vrimg_1 }}" />
                            <img id="point2" src="/images/{{ $post->vrimg_2 }}" alt="FusaTour {{ $post->vrimg_2 }}" />
                            <img id="point3" src="/images/{{ $post->vrimg_3 }}" alt="FusaTour {{ $post->vrimg_3 }}" />
                            <img id="point4" src="/images/{{ $post->vrimg_4 }}" alt="FusaTour {{ $post->vrimg_4 }}" />
                            <img id="point5" src="/images/{{ $post->vrimg_5 }}" alt="FusaTour {{ $post->vrimg_5 }}" />
                            <img id="point6" src="/images/{{ $post->vrimg_6 }}" alt="FusaTour {{ $post->vrimg_6 }}" />

                            <img id="hotspot" src="/images/flecha.png" alt="FusaTour Flecha" />
                        </a-assets>

                        <a-entity id="spots" hotspots>
                            <a-entity id="group-point1">
                                <a-image spot="linkto:#point2;spotgroup:group-point2" scale="2 2 2" color="#130f40"
                                    position="0 1 -10" rotation="0 0 0"></a-image>
                            </a-entity>
                            <a-entity id="group-point2" scale="0 0 0">
                                <a-image spot="linkto:#point3;spotgroup:group-point3" scale="2 2 2" color="#130f40"
                                    position="2.2 2.1 -11" rotation="0 0 0"></a-image>
                                <a-image spot="linkto:#point1;spotgroup:group-point1" scale="2 2 2" color="#eb4d4b"
                                    position="0 0 10"></a-image>
                            </a-entity>
                            <a-entity id="group-point3" scale="0 0 0">
                                <a-image spot="linkto:#point2;spotgroup:group-point2" scale="2 2 2" color="#eb4d4b"
                                    position="10 0 -10"></a-image>
                                <a-image spot="linkto:#point4;spotgroup:group-point4" scale="2 2 2" color="#130f40"
                                    position="5 0 10" rotation="19 11 0"></a-image>
                            </a-entity>
                            <a-entity id="group-point4" scale="0 0 0">
                                <a-image spot="linkto:#point3;spotgroup:group-point3" scale="2 2 2" color="#eb4d4b"
                                    position="10 0 3"></a-image>
                                <a-image spot="linkto:#point5;spotgroup:group-point5" scale="2 2 2" color="#130f40"
                                    position="0 0 -10"></a-image>
                            </a-entity>
                            <a-entity id="group-point5" scale="0 0 0">
                                <a-image spot="linkto:#point4;spotgroup:group-point4" scale="2 2 2" color="#eb4d4b"
                                    position="10 0 -6.5"></a-image>
                                <a-image spot="linkto:#point6;spotgroup:group-point6" scale="2 2 2" color="#130f40"
                                    position="-10 1 0" rotation="18.8 88.2 0.4"></a-image>
                            </a-entity>
                            <a-entity id="group-point6" scale="0 0 0">
                                <a-image spot="linkto:#point5;spotgroup:group-point5" scale="2 2 2" color="#eb4d4b"
                                    position="10 0 -6.5"></a-image>
                            </a-entity>
                        </a-entity>

                        <a-sky id="skybox" src="#point1"></a-sky>

                        <a-entity id="cam" camera position="0 1.6 0" look-controls>
                            <a-entity cursor="fuse:true;fuseTimeout:2000"
                                geometry="primitive:ring;radiusInner:0.01;radiusOuter:0.02" position="0 0 -1.8"
                                material="shader:flat;color:#6ab04c"
                                animation__mouseenter="property:scale;to:3 3 3;startEvents:mouseenter;endEvents:mouseleave;dir:reverse;dur:2000;loop:1">
                            </a-entity>
                        </a-entity>

                    </a-scene>
                </div>
                @endif
            </div>
            <div class="divider"></div>
        </div>
    </div>


    @if (Auth::user())
    <div class="row ">
        <div class="col s12 pad-0">
            <h5 class="bot-20 sec-tit  ">Califica este Lugar </h5>
            <div class="row">

                <form enctype="multipart/form-data" files="true"
                    action="{{ route('create_comment', ['post' => $post->url ]) }}" method="POST">
                    {{ csrf_field() }} {{ method_field('PUT') }}
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

                    <div class="input-field col s10">

                        <textarea name="comment" id="textarea-normal" class="materialize-textarea validate"></textarea>
                        <label for="textarea-normal">Comentario</label>
                        <span class="helper-text" data-error="Porfavor ingrese un comentario" data-success=""></span>
                    </div>

                    <div class="file-field col s2 input-field ">
                        <div class="btn waves-effect waves-light pink bg-primary">
                            <i class="mdi mdi-camera-party-mode mdi-transition1"></i>
                            <input type="file" name="urlimg">
                        </div>
                        <div class="file-path-wrapper ocultar">
                            <input class="file-path validate ocultar" type="text">
                        </div>
                    </div>



                    <textarea class="ocultar" name="id_post" for="textarea-normal">{{$post->id}}</textarea>

                    <button class="waves-effect waves-light btn bg-primary right">Enviar</button>
                </form>

            </div>

        </div>
    </div>
    @else

    <h5 class="bot-20 sec-tit  ">Califica este Lugar </h5>
    <div class="col s12 center-align">
        <a href="{{ route('register') }}" class="waves-effect waves-light btn-large button-blue"><i
                class="mdi mdi-bookmark-plus mdi-transition1"></i>Registrarse</a>
        <a href="{{ route('login') }}" class="waves-effect waves-light btn-large button-red"><i
                class="mdi mdi-account-circle mdi-transition1"></i>Ingresar</a>
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
                        font-size: 15vw;
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
                        <a href="/perfil/{{$comment->user->id}}" class='chatlink waves-effect'>
                            <img src="/images/{{ $comment->user->avatar }}" onerror="this.src='/images/user.png';"
                                alt="FusaTour /images/{{ $comment->user->avatar }}"
                                title="/images/{{ $comment->user->avatar }}" class="circle">
                            <span class="title">{{ $comment->user->name }}</span>
                            <p>{{ $comment->text }}</p>
                        </a>
                        <div class="secondary-content">
                            <p>{{ $comment->point }} <label for="radio1">&#9733;</label></p>
                        </div>
                        <div class="secondary-content">
                            <p>{{ $comment->point }} <label for="radio1">&#9733;</label></p>
                        </div>
                        <div class="blog-img-wrap" style="padding-left: 20px; padding-right: 20px;">
                            <a class="img-wrap" data-fancybox="images"
                                data-caption="FusaTour una nueva manera de conocer a Fusagasugá">
                                <img loading="lazy" class="z-depth-1 img_banner"
                                    src="/images/{{ $comment->img_comment }}" onerror="this.style.display='none';"
                                    alt="FusaTour {{ $comment->img_comment }}">
                            </a>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <div class="spacer"></div>

    <script type="text/javascript">
        shareButton = document.getElementById("shareButton");
        shareButton.addEventListener('click', function (event) {

            if (navigator.userAgent.match(/Android/i)) {
                navigator.share({
                    title: 'Descubre Fusagasugá de una manera diferente con FusaTour',
                    url: 'https://fusatour.site/blog/{{ $post->url }} '
                }).then(console.log('Share successful'));
            } else {
                alert('Para activar la opcion nativa de compartir debes utilizar Chrome en Android')
            }
        });

    </script>
</div>

@endsection
