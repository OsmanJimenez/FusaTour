@extends('layout')

@section('meta-title', $post->title)
@section('meta-description', $post->excerpt)

@section('content')
    <div class="container">

        <div class="section">
            <div class="row ui-mediabox blogs bot-0">
                
                <div class="col s12">
                    <a class="img-wrap" href="#" data-fancybox="images" data-caption="How to move with your career">
                        <img class="z-depth-1" style="height:200px; width: 100%;" src="/images/{{ $post->urlimg }}">                      
                    </a>
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

                    <div class="spacer"></div>
                </div>
        
                <div class="col s12">
                    <div class="col s12 pad-0">
                        <h5 class="bot-20 sec-tit  ">Realidad Virtual </h5>
                        <iframe width="100%" height="280px" 
                            src="https://poly.google.com/view/duS_-Hxto-5/embed?chrome=min" 
                            frameborder="0" 
                            style="border:none;" 
                            allowvr="yes" 
                            allow="vr; xr; accelerometer; magnetometer; gyroscope; autoplay;" 
                            allowfullscreen mozallowfullscreen="true" 
                            webkitallowfullscreen="true" onmousewheel="" >
                        </iframe>
                    </div>
                </div>

                <div class="spacer"></div>
                <div class="divider"></div>

            </div>
        </div>

        @if (Auth::guest())
            <div class="input-field col s12">
                <textarea id="textarea-normal" class="materialize-textarea validate"></textarea>
                <label for="textarea-normal">Por favor inica Sesion</label>
                <span class="helper-text" data-error="Please enter text" data-success=""></span>
            </div>                  
        @else
            <div class="row ">
                <div class="col s12 pad-0"><h5 class="bot-20 sec-tit  ">Califica este Lugar </h5>
                    <div class="row"> 
                        <style>
                            input[type = "radio"]{ 
                                display:none;/*position: absolute;top: -1000em;*/
                            }
                
                            label{ 
                                color:grey;
                            }

                            .clasificacion{
                                direction: rtl;
                                unicode-bidi: bidi-override;
                            }

                            label:hover,
                            label:hover ~ label{
                                color:orange;
                            }

                            input[type = "radio"]:checked ~ label{
                                color:orange;
                            }

                            .estrella label{
                                font-size: 74px;
                            }
                        </style>

                        <form action="{{ route('create_comment', ['post' => $post->url ]) }}" method="POST">
                        {{ csrf_field() }} 
                            <div class="input-field col s12 estrella">
                                <p class="clasificacion">
                                <input  name="point" id="radio5" type="radio" name="estrellas" value="5">
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
                                <textarea  name="comment" id="textarea-normal" class="materialize-textarea validate"></textarea>
                                <label for="textarea-normal">Comentario</label>
                                <span class="helper-text" data-error="Please enter text" data-success=""></span>
                            </div>
                            <textarea style="display:none;" name="id_post" for="textarea-normal">{{$post->id}}</textarea>

                            <button class="waves-effect waves-light btn bg-primary">Enviar</button>
                        </form>

                    </div>

                    <div class="spacer"></div>

                </div>
            </div> 
        @endif
            <div class="row ">
                <div class="col s12 pad-0"><h5 class="bot-20 sec-tit  ">Comentarios </h5>
                    <div class="row"> 
                    
                        <ul class="collection contacts z-depth-1">
                        @foreach ($post->comments as $comment)
        

                            <li class="collection-item avatar">
                
                                <a href="#" class='chatlink waves-effect'>                  
                                    <img src="assets/images/user-21.jpg" alt="Simona Gotto" title="Simona Gotto" class="circle">
                                    <span class="title">{{ $comment->user->name }}</span>
                                    <p>{{ $comment->text }}</p>
                                </a>                
                                
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