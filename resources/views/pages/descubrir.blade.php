@extends('layout')

@section('content')
<div class="container">
    <div class="section">
        <div class="row ">
            <div class="col s12 pad-0">
                <h5 class="bot-20 sec-tit">Ranking</h5>
                @foreach ($posts as $post)
                    <div class="z-depth-2 card">
                        <div class="card-image">
                            <a class="img-wrap" href="/blog/{{ $post->url }}" data-fancybox="images" data-caption="Travel in Style">
                                <img class="z-depth-1" style="width: 100%;" src="/images/{{ $post->urlimg }}">
                            </a>
                            <a href="/blog/{{ $post->url }}">
                                <span class="card-title">{{ $post->title }}</span>
                            </a>
                        </div>
                        <div class="card-content">
                            <div class="row ">
                                <div class="col s9 m4 l2">
                                    {{ $post->excerpt }}
                                </div>
                                <div class="col s3 m4 l2 text-center">
                                    <p>{{ $post->point }} <label for="radio1">&#9733;</label></p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="spacer"></div>
<div class="spacer"></div>
<div class="spacer"></div>
@endsection