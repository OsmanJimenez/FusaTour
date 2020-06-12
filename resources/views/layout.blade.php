<!DOCTYPE html>
<html lang="es">
    
<head>
<!-- HEAD -->
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title> @yield('meta-title', config('app.name'))  FusaTour</title>
  <meta content="@yield ('meta-description','Aplicación turistica sobre fusagasuga 150-160 caracteres maximo')" name="description" />
  <meta content="Osman Jimenez" name="author" />
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="/assets/images/icons/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">

  <!-- CORE CSS FRAMEWORK - START -->
    <link href="/assets/css/preloader.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/assets/fonts/mdi/materialdesignicons.min.css" type="text/css" rel="stylesheet" media="screen,projection"/>
    <link href="/assets/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!-- CORE CSS FRAMEWORK - END -->

  <!-- DROPZONJS CSS FRAMEWORK - START -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.0/basic.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <!-- DROPZONJS CSS FRAMEWORK - STOP --> 

  <!-- CORE CSS TEMPLATE - START  -->
    <link  href="/assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" id="main-style"/> 
    <link id="theme" href="/assets/css/style-2.css" type="text/css" rel="stylesheet" media="screen,projection" id="main-style"/> 



<!-- END HEAD -->
@laravelPWA
</head>
    
<!-- BEGIN BODY -->
<body 
  class="html"  
  data-header="light" 
  data-footer="dark"  
  data-header_align="center"  
  data-menu_type="left" 
  data-menu="light" 
  data-menu_icons="on" 
  data-footer_type="left" 
  data-site_mode="light" 
  data-footer_menu="show" 
  data-footer_menu_style="light"
  href="light" >

  <!-- START preloader -->
    <div class="preloader-background">
      <div class="preloader-wrapper">
        <div id="preloader"></div>
      </div>
    </div>
  <!-- END preloader -->

  

  <!-- START navigation -->
    <nav class="fixedtop topbar navigation" role="navigation">
      <div class="nav-wrapper container">
        <a id="logo-container" href="/" class=" brand-logo " >FUSATOUR</a>
        <a href="#" data-target="" class="waves-effect waves-circle navicon back-button htmlmode show-on-large ">
          <i class="mdi mdi-chevron-left" data-page=""></i>
        </a>
        <a href="{{ route('pages.escaner') }}" data-target="" class="waves-effect waves-circle navicon right sidenav-trigger show-on-large pulse"><i class="mdi mdi-camera"></i></a>

        <a href="#" data-target="" id="theme-toggle" class="waves-effect waves-circle navicon right nav-site-mode show-on-large"><i class="mdi mdi-brightness-6 mdi-transition1"></i></a>
     
      </div>
    </nav>
  <!-- END navigation -->

  <ul id="slide-settings" class="sidenav sidesettings right fixed">
    <li class="menulinks">
      <ul class="collapsible">
      <!-- SIDEBAR - START -->

<!--  SIDEBAR - END -->
      </ul>
    </li>
    </ul></li>
</ul>

  <!-- CONTENT - START -->
    @yield('content')
  <!--  CONTENT - END -->

  <!-- BUTTONUP - START -->
    <div class="backtotop">
      <a class="btn-floating btn primary-bg">
        <i class="mdi mdi-chevron-up"></i>
      </a>
    </div>
  <!--  BUTTONUP - END -->

  <!-- TABS - START -->
    <div class="footer-menu">
      <ul>

        <li>
          <a href="{{ route('pages.inicio') }}" class=" {{ request()->routeIs('pages.inicio') ? 'active' : '' }}" >
            <i class="mdi mdi-home"></i>
            <span>Inicio</span>
          </a>        
        </li>

        <li>
          <a href="{{ route('pages.categorias') }}" class=" {{ request()->routeIs('pages.categorias') ? 'active' : '' }}">          
            <i class="mdi mdi-shape-outline"></i>
            <span>Categorias</span>
          </a>        
        </li>

        <li>
          <a href="{{ route('pages.descubrir') }}" class=" {{ request()->routeIs('pages.descubrir') ? 'active' : '' }}">          
            <i class="mdi mdi-camera"></i>
            <span>Descubrir</span>
          </a>        
        </li>

        <li>
          <a href="{{ route('pages.actividades') }}" class=" {{ request()->routeIs('pages.actividades') ? 'active' : '' }}">          
            <i class="mdi mdi-airballoon"></i>
            <span>Actividades</span>
          </a>        
        </li>

        <li>
          <a href="{{ route('pages.perfil') }}" class=" {{ request()->routeIs('pages.perfil') ? 'active' : '' }}">          
            <i class="mdi mdi-account-circle"></i>
            <span>Perfil</span>
          </a>        
        </li>

      </ul>
    </div>
  <!--  TABS - END -->



  <!-- CORE JS FRAMEWORK - START --> 
    <script src="/assets/js/jquery-2.2.4.min.js"></script>
    <script src="/assets/js/materialize.js"></script>
    <script src="/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script> 
  <!-- CORE JS FRAMEWORK - END --> 

  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - START --> 
    <script type="text/javascript">
      $(document).ready(function(){
          
          $(".carousel-fullscreen.carousel-slider").carousel({
            fullWidth: true,
            indicators: true
          });
          setTimeout(autoplay, 3500);
          function autoplay() {
              $(".carousel").carousel("next");
              setTimeout(autoplay, 3500);
          }
            $(".slider3").slider({
                    indicators: false,
                    height: 200,
            });

      }); 
    </script>
  <!-- OTHER SCRIPTS INCLUDED ON THIS PAGE - END --> 

  <script type="text/javascript">
    // this one is jut to wait for the page to load
    document.addEventListener('DOMContentLoaded', () => {

    const themeStylesheet = document.getElementById('theme');
    const storedTheme = localStorage.getItem('theme');

    if(storedTheme){
        themeStylesheet.href = storedTheme;
    }
    
    const themeToggle = document.getElementById('theme-toggle');

    themeToggle.addEventListener('click', () => {
        // if it's light -> go dark
        if(themeStylesheet.href.includes('2')){
            themeStylesheet.href = '/assets/css/style-dark.css';
        } else {
            // if it's dark -> go light
            themeStylesheet.href = '/assets/css/style-2.css';
        }
        // save the preference to localStorage
        localStorage.setItem('theme',themeStylesheet.href)  
    })
    })
</script>

  <!-- CORE TEMPLATE JS - START --> 
    <script src="/assets/js/init.js"></script>
    <script src="/assets/js/scripts.js"></script>
  <!-- END CORE TEMPLATE JS - END --> 

  <!-- PRELOADER - START -->
    <script type="text/javascript">
      document.addEventListener("DOMContentLoaded", function(){
        $('.preloader-background').delay(10).fadeOut('slow');
      });
    </script>
  <!-- PRELOADER - END -->

</body>
<!-- END BODY -->



</html>