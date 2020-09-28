@extends('layout')

@section('content')

<div id="index-banner" class="parallax-container">
  <div class="section no-pad-bot">
    <div class="container">
      <br><br>
      @if(isset($title))
      <h1 class="header center">{{ $title }}</h1>
      @endif
      <div class="row center">
        @if(isset($phrase))
        <h5 class="col s12 light">{{ $phrase }}</h5>
        @endif
      </div>
      <br><br>
    </div>
  </div>
  @if(isset($urlimg))
  <div class="parallax img-wrap"><img src="/images/{{ $urlimg }}" alt="Fusagasugá"></div>
  @endif
</div>
<div class="prueba">
</div>
<div class="container">
  

<div class="wrapper">
	<ul id="slides">

		<li class="lateral">
      <div class="icon-block circular">
        <a class="modal-trigger" href="#modal1">
          <h2 class="cero">
            <img class="z-depth-1" src="/images/historias/Datos.webp" alt="">
          </h2>
        </a>
      </div>
    </li>

    <li class="lateral">
      <div class="icon-block circular">
        <a class="modal-trigger" href="#modal2">
          <h2 class="cero">
            <img class="z-depth-1" src="/images/historias/Eventos.webp" alt="">
          </h2>
        </a>
      </div>
    </li>

    <li class="lateral">
      <div class="icon-block circular">
        <a class="modal-trigger" href="#modal3">
          <h2 class="cero">
            <img class="z-depth-1" src="/images/historias/Simbolos.webp" alt="">
          </h2>
        </a>
      </div>
    </li>

    <li class="lateral">
      <div class="icon-block circular">
        <a class="modal-trigger" href="#modal4">
          <h2 class="cero">
            <img class="z-depth-1" src="/images/historias/Comida.webp" alt="">
          </h2>
        </a>
      </div>
    </li>

    <li class="lateral" style="padding-right: 0px;">
      <div class="icon-block circular">
        <a class="modal-trigger" href="#modal5">
          <h2 class="cero">
            <img class="z-depth-1" src="/images/historias/Clima.webp" alt="">
          </h2>
        </a>
      </div>
    </li>

	</ul>
</div>

<!-- Modals -->
    <div id="modal1" class="modal bottom-sheet">
      <div class="modal-content">
        <h4>Datos Importantes</h4>
        <p style="font-size: 20px;">
          <strong>Fundación:</strong> 5 de Febrero de 1592.<br>
          <strong>Provincia:</strong> Sumapaz.<br>
          <strong>Clima:</strong> Oceánico Mediterráneo.<br>
          <strong>Gentilicio:</strong> Fusagasugueño, -a.<br>
          <strong>Población:</strong> 139.805 Habitantes.<br>
        </p>
      </div>
    </div>

    <div id="modal2" class="modal bottom-sheet" style="max-height: 75%;">
      <div class="modal-content">
        <h4>Eventos</h4>

        
        <div class="section">
          <div class="row ui-mediabox blogs bot-0">
              <div class="col s12">
                  <a class="img-wrap" href="#" data-fancybox="images" data-caption="How to move with your career">
                  <img class="z-depth-1" style="width: 100%;" src="/images/historias/Desfile_Caballos.webp">
                  </a>
                  <h5 class="title">DESFILE CABALLÍSTICO</h5>
                  <span class="small date">25 May 2020</span>
                  <div class="spacer"></div>

                  <a class="img-wrap" href="#" data-fancybox="images" data-caption="How to move with your career">
                  <img class="z-depth-1" style="width: 100%;" src="/images/historias/Expofusa.webp">
                  </a>
                  <h5 class="title">EXPOFUSA</h5>
                  <span class="small date">1 Jun 2020</span>
                  <div class="spacer"></div>

                  <a class="img-wrap" href="#" data-fancybox="images" data-caption="How to move with your career">
                  <img class="z-depth-1" style="width: 100%;" src="/images/historias/Rumba_Criolla.webp">
                  </a>
                  <h5 class="title">Festival de la Rumba Criolla</h5>
                  <span class="small date">5 Sep 2020</span>
                  <div class="spacer"></div>

                  <a class="img-wrap" href="#" data-fancybox="images" data-caption="How to move with your career">
                  <img class="z-depth-1" style="width: 100%;" src="/images/historias/interpretes.webp">
                  </a>
                  <h5 class="title">Festival Nacional de Interpretes</h5>
                  <span class="small date">10 Sep 2020</span>
                  <div class="spacer"></div>

                  <a class="img-wrap" href="#" data-fancybox="images" data-caption="How to move with your career">
                  <img class="z-depth-1" style="width: 100%;" src="/images/historias/Agroindustrial.webp">
                  </a>
                  <h5 class="title">Festival Floral y Agroindustrial</h5>
                  <span class="small date">7 Nov 2020</span>
                  <div class="spacer"></div>

                  <a class="img-wrap" href="#" data-fancybox="images" data-caption="How to move with your career">
                  <img class="z-depth-1" style="width: 100%;" src="/images/historias/Navidad.webp">
                  </a>
                  <h5 class="title">Feria Navideña</h5>
                  <span class="small date">15 Dic 2020</span>
              </div>
        
        </div>
      </div>



      </div>
    </div>

    <div id="modal3" class="modal bottom-sheet" style="max-height: 35%;">
      <div class="modal-content simbolos">
        <h4>Simbolos</h4>
        
        <div class="spacer"></div>
        <div class="section">

          <div class="row center">
            <div class="col s6 m6 l2">
              <div class="icon-block">
                <img class="z-depth-1" src="/images/historias/Escudo.webp" alt="">
                <h6 class="center">Escudo</h6>
              </div>
            </div>

            <div class="col s6 m6 l2">
              <div class="icon-block">
                <img class="z-depth-1" src="/images/historias/Bandera.webp" alt="">
                <h6 class="center">Bandera</h6>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div id="modal4" class="modal bottom-sheet" style="max-height: 42%;">
      <div class="modal-content">
        <h4>Comida Tipica</h4>

        
        <div class="section">
          <div class="row ui-mediabox blogs bot-0">
              <div class="col s12">
                  <a class="img-wrap" href="#" data-fancybox="images" data-caption="How to move with your career">
                  <img class="z-depth-1" style="width: 100%;" src="/images/historias/Comida_Tipica.webp">
                  </a>
                  <h5 class="title center">LA VARA</h5>
                  <div class="spacer"></div>                 
              </div>
        
        </div>
      </div>



      </div>
    </div>

    <div id="modal5" class="modal bottom-sheet">
      <div class="modal-content">
        <h4>Clima</h4>
        <p style="font-size: 20px;">
          La ciudad de Fusagasugá cuenta con un clima <strong>agradable</strong> disponiendo de una temperatura promedio de <strong>19°C</strong>, su altura sobre el nivel del mar oscila entre los <strong>550 metros</strong> hasta los <strong>3.050 metros</strong> sobre el nivel del mar con una altura promedio de <strong>1.728 metros</strong>, posee una diversidad de climas que van desde el cálido, templado, frio y paramo.
        </p>
      </div>
    </div>
<!-- Fin Modals -->    

  <div class="section">
    <h5 class="pagetitle">Lugares</h5>
  </div>

  <div class="section">
    <div class="row ui-mediabox blogs">

      @foreach ($posts as $post)
      <div class="col s12">
        <div class="blog-img-wrap">
          <a class="img-wrap" href="/blog/{{ $post->url }}" data-fancybox="images" data-caption="FusaTour una nueva manera de conocer a Fusagasugá">
            <img class="z-depth-1 img_banner" src="/images/{{ $post->urlimg }}">
          </a>
        </div>

        <div class="blog-info">
          <a href="/blog/{{ $post->url }}">
            <h5 class="title">{{ $post->title }}</h5>
          </a>

          <span class="small date">{{ $post->published_at->format('M d') }}</span>

          <span class="small tags">
            <a class="small" href="{{ route('categories.show', $post->category) }}">{{ $post->category->name }}
            </a>
 
          </span>

          <p class="bot-0 text">{{ $post->excerpt }} </p>

          <div class="spacer"></div>
          <div class="spacer"></div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="spacer"></div>
  </div>
</div>

@stop