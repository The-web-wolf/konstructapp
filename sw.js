//This is the "Offline copy of pages" service worker

//Install stage sets up the index page (home page) in the cache and opens a new cache
self.addEventListener('install', function(event) {
  var indexPage = new Request('./');
  event.waitUntil(
    fetch(indexPage).then(function(response) {
      return caches.open('konstructapp').then(function(cache) {
        //console.log(' Cached index page during Install'+ response.url);
        cache.addAll([
          'offline.html',
          'assets/js/jQuery/jquery-3.4.1.js',
          'assets/css/custom.css',
          'assets/css/main.css',
          'assets/bootstrap/css/bootstrap.css',
          'https://cdn.jsdelivr.net/npm/js-cookie@rc/dist/js.cookie.min.js',
          'android/android-launchericon-96-96.png',
          'chrome/chrome-favicon-16-16.png',
          'android/android-launchericon-192-192.png '
          ]).finally(function(){
          return cache.put(indexPage, response);
        })        
      });
  }));
});

self.addEventListener('activate', (event) => {
  event.waitUntil((async () => {
    // Enable navigation preload if it's supported.
    // See https://developers.google.com/web/updates/2017/02/navigation-preload
    if ('navigationPreload' in self.registration) {
      await self.registration.navigationPreload.enable();
    }
  })());

  // Tell the active service worker to take control of the page immediately.
  self.clients.claim();
});

//If any fetch fails, it will look for the request in the cache and serve it from there first
self.addEventListener('fetch', function(event) {
  var updateCache = function(request){
    return caches.open('konstructapp').then(function (cache) {
      return fetch(request).then(function (response) {
        //console.log(' add page to offline'+response.url)
        if(request.destination === 'style' || request.destination === 'font' || request.destination === 'script'){
          return cache.put(request, response);
        }     
      });
    });
  };

  event.waitUntil(updateCache(event.request));

  event.respondWith(
    fetch(event.request).catch(function(error) {
      console.log( ' Network request Failed. Serving content from cache: ' + error );

      return caches.open('konstructapp').then(function (cache) {
        console.log(event.request)
        if (event.request.mode === 'navigate') {
          return cache.match('offline.html');
        }        
      });
    })
  );
})
