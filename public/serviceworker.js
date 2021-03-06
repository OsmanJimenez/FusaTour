var CACHE_STATIC_NAME = 'static-v74';
var CACHE_DYNAMIC_NAME = 'dynamic-v74';

self.addEventListener('install', function (event) {
  console.log('Installing Service Worker ...', event);
  event.waitUntil(
    caches.open(CACHE_STATIC_NAME)
      .then(function (cache) {
        console.log('Precaching App Shell');
        cache.addAll([
            '/',
            '/offline',
            '/blog/mural-raices',
            '/images/icons/icon-72x72.png',
            '/images/icons/icon-96x96.png',
            '/images/icons/icon-128x128.png',
            '/images/icons/icon-144x144.png',
            '/images/icons/icon-152x152.png',
            '/images/icons/icon-192x192.png',
            '/images/icons/icon-384x384.png',
            '/images/icons/icon-512x512.png',
        
            '/assets/css/Estilos.min.css',
            '/assets/css/materialdesignicons.min.css',
            '/assets/css/style.css',
            '/assets/css/style-2.css',
            '/assets/css/styles.css',
        
            '/assets/js/aframe.js',
            '/assets/js/aframe-extras.min.js',
            '/assets/js/jquery-3.5.1.min.js',
            '/assets/js/materialize.js',
            '/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js',
        
            '/index.php',
            '/categorias',
            '/actividades',
            '/escaner',
        
            '/images/historias/Agroindustrial.webp',
            '/images/historias/Bandera.webp',
            '/images/historias/Clima.webp',
            '/images/historias/Comida.webp',
            '/images/historias/Comida_Tipica.webp',
            '/images/historias/Datos.webp',
            '/images/historias/Desfile_Caballos.webp',
            '/images/historias/Escudo.webp',
            '/images/historias/Eventos.webp',
            '/images/historias/Expofusa.webp',
            '/images/historias/interpretes.webp',
            '/images/historias/Navidad.webp',
            '/images/historias/Rumba_Criolla.webp',
            '/images/historias/Simbolos.webp',
        
            '/images/images/floor.jpg',
            '/images/images/grass.jpg',
            '/images/images/icon.png',
            '/images/images/wall_2.jpg',
        
            '/images/Fondo.jpg',
            '/images/1592692339Icon_Arte.webp',
            '/images/1592692368Icon_Avistamiento.webp',
            '/images/1592692388Icon_Caminar.webp',
            '/images/1592692408Icon_CicloPaseo.webp',
            '/images/1592692435Icon_Educacion.webp',
            '/images/1592692456Icon_Escalada.webp',
            '/images/1592692475Icon_Fauna.webp',
            '/images/1592692495Icon_Flora.webp',
            '/images/1592692516Icon_Fotografia.webp',
            '/images/1592692533Icon_Senderismo.webp',
        
            '/images/1592768010Ecoturismo.webp',
            '/images/1592768030Monumentos.webp',
            '/images/1592766915Murales.webp',
        
            '/images/1593630960IMG_20200618_073715.webp',
            '/images/1593630670MVIMG_20200611_120801.webp',
            '/images/1593630239Mural_Salvaje.webp',
            '/images/1593629262Mural_Energia - copia.webp',
            '/images/1593629839PANO_20200625_082902-01-01.webp',
            '/images/1593629370PANO_20200625_081702-02.webp',
            '/images/1593630048Mural_Raices - copia.webp',
            '/images/1593620779Monumento_Lucho_Herrera.webp',
            '/images/1593627096Monumento_Indio_Sutagao - copia.webp',
            '/images/1593628990Mural_Flores - copia.webp',
            '/images/1593629693PANO_20200625_082125-02.webp',
            '/images/1593627346Monumento_Rumba_Criolla - copia.webp',
            '/images/1593629512PANO_20200625_082322-02.webp',
            '/images/1593627534Monumento_Emilio_Sierra - copia.webp',
            '/images/1593628484Monumento_Manuel_Cardenas.webp',
            '/images/1593629611PANO_20200625_082451-02.webp',
            '/images/Monumento_Jardinera.webp',
            '/images/1593629929PANO_20200625_082807-01-01.webp',
            '/images/1593628315Monumento_Jorge_Eliecer_Gaitan-01 - copia.webp',
        
            '/images/flecha.png',
        
            '/images/15936306701.jpg',
            '/images/15936306702.jpg',
            '/images/15936306703.jpg',
            '/images/15936306704.jpg',
            '/images/15936306705.jpg',
            '/images/15936306706.jpg',
        
            '/images/1597154617Cultura_360.jpg',
            '/images/1596813683Plaza_360.jpg',
        
            '/images/15936309601.jpg',
            '/images/15936309602.jpg',
            '/images/15936309603.jpg',
            '/images/15936309604.jpg',
        ]);
      })
  )
});

self.addEventListener('activate', function (event) {
  console.log('Activating Service Worker ....', event);
  event.waitUntil(
    caches.keys()
      .then(function (keyList) {
        return Promise.all(keyList.map(function (key) {
          if (key !== CACHE_STATIC_NAME && key !== CACHE_DYNAMIC_NAME) {
            console.log('Removing old cache.', key);
            return caches.delete(key);
          }
        }));
      })
  );
  return self.clients.claim();
});

self.addEventListener('fetch', function(event) {
  event.respondWith(
    // Try the network
    fetch(event.request)
      .then(function(res) {
        return caches.open(CACHE_DYNAMIC_NAME)
          .then(function(cache) {
            // Put in cache if succeeds
            cache.put(event.request.url, res.clone());
            return res;
          })
      })
      .catch(function(err) {
          // Fallback to cache
          return caches.match(event.request)
          .then(function(res){
            if (res === undefined) { 
                return caches.match('offline');
            } 
            return res;
        })
      })
  );
});