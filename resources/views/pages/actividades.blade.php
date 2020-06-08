@extends('layout')

@section('content')

    <div class="container">
        <div class="section">
    
            <div class="row ">
                <div class="col s12 pad-0">
                    <h5 class="bot-20 sec-tit  ">¿Que quieres hacer hoy?</h5>                    

                    @foreach ($tags as $tag)                      
                        <ul class="collection notifications z-depth-3">
                            <li class="collection-item avatar">                           
                                <div class="notify" >
                                    <div class="col s1 m4 l2">
                                        <span>
                                            <img src="/images/{{ $tag->urlimg }}" alt="Dion Vitale" title="Dion Vitale" class="circle">
                                        </span>
                                    </div>

                                    <div class="col s9 m4 l2">                                       
                                        <p>{{ $tag->name }}</p>                                       
                                    </div>

                                    <div class="col s2 m4 l2">
                                        <a href="/actividades/{{ $tag->name }}" class="btn waves-effect waves-light bg-primary" type="submit" name="action">
                                            <i class="mdi mdi-autorenew"></i>
                                        </a>
                                    </div>
                                </div>                    
                            </li>
                        </ul> 
                    @endforeach
       
                </div>
            </div>
  
        </div>
    </div>

@endsection