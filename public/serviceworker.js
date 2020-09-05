var staticCacheName = "pwa-v";
var filesToCache = [
    '/',
    '/offline',
    '/images/icons/icon-72x72.png',
    '/images/icons/icon-96x96.png',
    '/images/icons/icon-128x128.png',
    '/images/icons/icon-144x144.png',
    '/images/icons/icon-152x152.png',
    '/images/icons/icon-192x192.png',
    '/images/icons/icon-384x384.png',
    '/images/icons/icon-512x512.png',

    '/assets/css/preloader.css',
    '/assets/css/materialize.min.css',
    '/assets/fonts/mdi/materialdesignicons.min.css',
    '/assets/plugins/perfect-scrollbar/perfect-scrollbar.css',
    '/assets/css/style.css',
    '/assets/css/style-2.css',
    '/assets/css/styles.css',
    '/assets/js/aframe.js',
    '/assets/js/aframe-extras.min.js',

    '/assets/js/jquery-2.2.4.min.js',
    '/assets/js/materialize.js',
    '/assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js',
    '/assets/js/init.js',
    '/assets/js/scripts.js',

    '/index.php',
    '/categorias',
    '/actividades',
    '/escaner',


    '/images/1592692339Icon_Arte.jpg',
    '/images/1592692368Icon_Avistamiento.jpg',
    '/images/1592692388Icon_Caminar.jpg',
    '/images/1592692408Icon_CicloPaseo.jpg',
    '/images/1592692435Icon_Educacion.jpg',
    '/images/1592692456Icon_Escalada.jpg',
    '/images/1592692475Icon_Fauna.jpg',
    '/images/1592692495Icon_Flora.jpg',
    '/images/1592692516Icon_Fotografia.jpg',
    '/images/1592692533Icon_Senderismo.jpg',

    '/images/1593630960IMG_20200618_073715.jpg',
    '/images/1593630670MVIMG_20200611_120801.jpg',
    '/images/1593630239Mural_Salvaje.jpg',
    '/images/1593629262Mural_Energia - copia.jpeg',
    '/images/1593629839PANO_20200625_082902-01-01.jpg',
    '/images/1593629370PANO_20200625_081702-02.jpg',
    '/images/1593630048Mural_Raices - copia.jpg',
    '/images/1593620779Monumento_Lucho_Herrera.jpg',
    '/images/1593627096Monumento_Indio_Sutagao - copia.jpg',
    '/images/1593628990Mural_Flores - copia.jpg',
    '/images/1593629693PANO_20200625_082125-02.jpg',
    '/images/1593627346Monumento_Rumba_Criolla - copia.jpg',
    '/images/1593629512PANO_20200625_082322-02.jpg',
    '/images/1593627534Monumento_Emilio_Sierra - copia.jpg',
    '/images/1593628484Monumento_Manuel_Cardenas.jpg',
    '/images/1593629611PANO_20200625_082451-02.jpg',
    '/images/Monumento_Jardinera.jpg',
    '/images/1593629929PANO_20200625_082807-01-01.jpg',
    '/images/1593628315Monumento_Jorge_Eliecer_Gaitan-01 - copia.jpeg',
    
    '/images/1592768010Ecoturismo.jpg',
    '/images/1592768030Monumentos.jpg',
    '/images/1592766915Murales.jpg',

    '/images/images/floor.jpg',
    '/images/images/grass.jpg',
    '/images/images/icon.png',
    '/images/images/wall_2.jpg',
]


// Cache on install
self.addEventListener("install", event => {
    this.skipWaiting();
    event.waitUntil(
        caches.open(staticCacheName)
            .then(cache => {
                return cache.addAll(filesToCache);
            })
    )
});


// Clear cache on activate
self.addEventListener('activate', event => {
    event.waitUntil(
        caches.keys().then(cacheNames => {
            return Promise.all(
                cacheNames
                    .filter(cacheName => (cacheName.startsWith("pwa-")))
                    .filter(cacheName => (cacheName !== staticCacheName))
                    .map(cacheName => caches.delete(cacheName))
            );
        })
    );
});


  // Serve from Cache
  self.addEventListener("fetch", event => {
    event.respondWith(
        caches.match(event.request)
            .then(response => {
                return response || fetch(event.request);
            })
            .catch(() => {
                return caches.match('offline');
            })
    )
});

