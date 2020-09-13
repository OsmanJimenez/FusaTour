@extends('layout')

@section('content')

<div class="container">
    <div class="ui-profile">
        
        <div class="primg">
            <img src="/images/{{ $user->avatar }}" alt="" onerror="this.src='/images/user.png';">
        </div>

        <div class="prinfo card-panel primary-bg white-text">           
            <h3 class="name" style="margin-bottom: 0px; margin-top: 0px;">{{ $user->name }}</h3>         
        </div>

        <div class="row ">
            <div class="col s12 pad-0"><h5 class="bot-20 sec-tit ">Descripción</h5>    
                <p>{{ $user->description }}</p>
            </div>

            <h5 class="bot-20 sec-tit  ">Comentarios </h5>
            
            @foreach ($user->comments as $comment) 
            <div class="col s2 pad-0">
                <div class="date">
                    <h4>{{ $comment->created_at->format('d') }}</h4><div>{{ $comment->created_at->format('M') }}</div>
                </div>
            </div>
            <div class="col s10 pad-0">
                <ul class="collection contacts z-depth-1">
                

                    <li class="collection-item avatar">

                        <a class='chatlink waves-effect'>
                        <img src="/images/{{ $comment->post->urlimg }}" onerror="this.src='/images/user.png';" alt="/images/{{ $comment->post->urlimg }}" title="/images/{{ $comment->user->avatar }}" class="circle">
                        <span class="title">{{ $comment->post->title }}</span>
                        <p>{{ $comment->text }}</p>
                                
                        </a>

                        <div class="secondary-content">
                            <p>{{ $comment->point }} <label for="radio1">&#9733;</label></p>
                        </div>

                        <div class="secondary-content">
                            <p>{{ $comment->point }} <label for="radio1">&#9733;</label></p>
                        </div>

                        <div class="blog-img-wrap">
                            <a class="img-wrap"  data-fancybox="images" data-caption="FusaTour una nueva manera de conocer a Fusagasugá">
                            <img loading="lazy" style="border-radius: 0px" class="z-depth-1 img_banner" src="/images/{{ $comment->img_comment }}" onerror="this.style.display='none';" alt="">
                            </a>
                        </div>

                    </li>
                
                </ul>
            </div>
                @endforeach  
            
        </div>
    </div>
</div>
<div class="spacer"></div>
<div class="spacer"></div>

@endsection