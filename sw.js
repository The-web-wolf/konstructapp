// Names of the two caches used in this version of the service worker.
// Change to v2, etc. when you update any of the local resources, which will
// in turn trigger the install event again.
const PRECACHE  = 'precache-v1';
const RUNTIME   = 'runtime';
// Customize this with a different URL if needed.
const OFFLINE_URL = 'offline';

// A list of local resources we always want to be cached.
const PRECACHE_URLS = [
  './',
  './assets/css/custom.min.css',
  './assets/css/main.min.css',
  './assets/js/app.js',
  './assets/js/main.js',
  'https://unpkg.com/pwacompat',
  './icons/favicon-128.png'
];

// The install handler takes care of precaching the resources we always need.
self.addEventListener('install', event => {
  event.waitUntil(( async () => {
    const cache = await caches.open(PRECACHE)
      await cache.addAll(PRECACHE_URLS);
      await cache.add(new Request(OFFLINE_URL, {cache: 'reload'}));
  })());
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

// The fetch handler serves responses for same-origin resources from a cache.
// If no response is found, it populates the runtime cache with the response
// from the network before returning it to the page.
self.addEventListener('fetch', event => {
  // Handle only request made to the API
  if ( (event.request.url.startsWith('https://api.konstructapp.com') || event.request.url.startsWith('https://konstructapps.herokuapp.com')) && event.request.method === 'GET') {
    event.respondWith(
      caches.open(RUNTIME).then(function(cache) {
        return fetch(event.request).then(function(response) {
          cache.put(event.request, response.clone());
          return response;
        });
      })
    );
  }
  else if (event.request.url.startsWith(self.location.origin)){
   
      event.respondWith((async () => {
        try {
          // First, try to use the navigation preload response if it's supported.
          const preloadResponse = await event.preloadResponse;
          if (preloadResponse) {
            return preloadResponse;
          }
  
          const networkResponse = await fetch(event.request);
          return networkResponse;
        } catch (error) {
          // catch is only triggered if an exception is thrown, which is likely
          // due to a network error.
          // If fetch() returns a valid HTTP response with a response code in
          // the 4xx or 5xx range, the catch() will NOT be called.
          console.log('Fetch failed; returning offline page instead.', error);
  
          const cache = await caches.open(PRECACHE);
          const cachedResponse = await cache.match(OFFLINE_URL);
          return cachedResponse;
        }
      })());
    }
  
});
