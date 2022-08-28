
const commonMiddleware = async (request) => {
    return await fetch(request);
}; 

self.addEventListener("fetch", (event) => {
    event.respondWith(commonMiddleware(event.request));
});