
//window.axios = require("axios")
import Echo from "laravel-echo"

window.Pusher = require('pusher-js');

//window.axios = require("axios");

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'W2ZUX7M?axS,N6wfDBOdsadsadsa',
    wsHost: window.location.hostname,
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
});