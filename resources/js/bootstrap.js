window._ = require('lodash');
window.axios = require('axios');

window.axios.defaults.baseURL = document.head.querySelector('meta[name="api-base-url"]').getAttribute('content');
// set the timeout duration for axios requests (20 seconds)
window.axios.defaults.timeout = 20000;
window.axios.defaults.headers.common['Accept-Language'] = document.querySelector('html').getAttribute('lang');
window.axios.defaults.headers.common['Content-Type'] = 'application/json';
window.axios.defaults.headers.common['Accept'] = 'application/json';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
