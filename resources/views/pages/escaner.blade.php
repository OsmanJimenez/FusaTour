@extends('layout')

@section('content')
<!-- ESCANER CSS TEMPLATE - START  -->
<link rel="preload" as="script" href="decoder.js">
<link href="styles.css" rel="stylesheet">

    <!-- ESCANER CSS TEMPLATE - END -->
<div class="app__layout"><!-- Header --><header class="app__header"></header><main class="app__layout-content"><video autoplay></video><!-- Dialog  --><div class="app__dialog app__dialog--hide"><div class="app__dialog-content"><h5>FusaTour QR</h5><input type="text" id="result"></div><div class="app__dialog-actions"><button type="button" class="app__dialog-close">Cerrar</button> <button type="button" class="app__dialog-open">Vamos</button></div></div><div class="app__dialog-overlay app__dialog--hide"></div><!-- Snackbar --><div class="app__snackbar"></div></main></div><div class="app__overlay"><div class="app__overlay-frame"></div><!-- Scanner animation --><div class="custom-scanner"></div><div class="app__help-text"></div></div><script>if (location.hostname !== "localhost") {
        (function (i, s, o, g, r, a, m) {
          i['GoogleAnalyticsObject'] = r; i[r] = i[r] || function () {
            (i[r].q = i[r].q || []).push(arguments)
          }, i[r].l = 1 * new Date(); a = s.createElement(o),
            m = s.getElementsByTagName(o)[0]; a.async = 1; a.src = g; m.parentNode.insertBefore(a, m)
        })(window, document, 'script', '//www.google-analytics.com/analytics.js', 'ga');
        ga('create', 'pageview');
      }</script><script async src="https://cdn.jsdelivr.net/npm/pwacompat@2.0.6/pwacompat.min.js" integrity="sha384-GOaSLecPIMCJksN83HLuYf9FToOiQ2Df0+0ntv7ey8zjUHESXhthwvq9hXAZTifA" crossorigin="anonymous"></script><script type="text/javascript" src="main.84fafbea08addfebc92f.bundle.js"></script>

@endsection