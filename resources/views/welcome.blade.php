@extends('layout')

@section('content')

<!-- <img  src="/images/Fondo.jpg" style="height:250px; width: 100%;"> -->

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
  <div class="parallax img-wrap"><img src="/images/{{ $urlimg }}" alt="Background image"></div>
  @endif
</div>

<div class="container">


  <div class="section">
    <h5 class="pagetitle">Lugares</h5>
  </div>

  <div class="section">

    <div class="row ui-mediabox blogs">

      @foreach ($posts as $post)
      <div class="col s12">

        <div class="blog-img-wrap">
          <a class="img-wrap" href="/blog/{{ $post->url }}" data-fancybox="images" data-caption="Web designing at its very best">
            <img class="z-depth-1" style="height:200px; width: 100%;" src="/images/{{ $post->urlimg }}">
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
            @foreach ($post->tags as $tag )
            <a class="small" href="{{ route ('actividades.show', $tag) }}">#{{ $tag->name }}</a>
            @endforeach
          </span>

          <p class="bot-0 text">{{ $post->excerpt }} </p>

          <div class="spacer"></div>
          <div class="divider"></div>
          <div class="spacer"></div>
        </div>

      </div>
      @endforeach

    </div>

    <div class="spacer"></div>

  </div>

</div>



@stop