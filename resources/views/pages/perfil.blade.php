@extends('layout')

@section('content')

<div class="container">
  <div class="section">
    <h5 class="pagetitle">Perfil</h5>
    <div class="divider"></div>
  </div>
</div>

<div class="container">
  <div class="section">

    <ul class="subpages collection">
      <li class="collection-item">
        <a href="{{ route('pages.perfiledit', ['user' => auth()->user()->id ]) }}" class="waves-effect">
          <i class="mdi mdi-face-profile"></i>
          </i>
          <span>Editar Perfil</span>
          <i class="arrow mdi mdi-chevron-right"></i>
        </a>
      </li>

      <li class="collection-item">
        <a href="{{url('logout')}}" class="waves-effect">
          <i class="mdi mdi-close-box"></i>
          </i>
          <span>Cerrar Sesión</span>
          <i class="arrow mdi mdi-chevron-right"></i>
        </a>
      </li>

    </ul>
  </div>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script> 
    
 
@if (session()->has('flash'))
  <script>
    Swal.fire({
      position: 'bottom',
      icon: 'success',
      text: "{{ session('flash') }}", 
      timer: 2500   
    })
  </script>
  @endif




@endsection