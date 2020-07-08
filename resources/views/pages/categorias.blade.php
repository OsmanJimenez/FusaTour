@extends('layout')

@section('content')

<div class="container">
  <div class="section">
    <div class="spacer"></div>
    @foreach ($categories as $category)
      <div class="row ">
        <div class="col s12 pad-0">
          <div class="z-depth-3 card">
            <div class="card-image">
              <img loading="lazy" class="img_tall" src="/images/{{ $category->urlimg }}">
              <span class="card-title">{{ $category->name }}</span>
              <a href="/categorias/{{ $category->name }}" class="btn-floating halfway-fab waves-effect waves-light primary-bg">
                <i class="mdi mdi-plus">Ver</i>
              </a>
            </div>
            <div class="card-content">
              <p>Donde la magia surge.</p>
            </div>
          </div>
        </div>
      </div>
    @endforeach
    <div class="spacer"></div>
    <div class="spacer"></div>
  </div>
</div>

@endsection