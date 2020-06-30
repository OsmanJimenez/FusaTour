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
    '/descubrir',
    '/actividades',
    '/escaner',

];

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



self.addEventListener('fetch', function(event) {
    event.respondWith(
      caches.open(staticCacheName).then(function(cache) {
        return cache.match(event.request).then(function(response) {
          var fetchPromise = fetch(event.request).then(function(networkResponse) {
            cache.put(event.request, networkResponse.clone());
            return networkResponse;
          })
          return response || fetchPromise;
        })
      })
    );
  });

