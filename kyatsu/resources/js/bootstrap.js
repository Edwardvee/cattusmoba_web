
import Echo from "laravel-echo"
import Pusher from 'pusher-js';

window.addEventListener("load", () => {
    window.Pusher = Pusher;
    window.Echo = new Echo({
        broadcaster: 'pusher',
        key: 'W2ZUX7MaxSAAN6wfDBOdsadsadsa',
        wsHost: window.location.hostname,
        wsPort: 6001,
        forceTLS: false,
        disableStats: true,
        cluster: ""
    });
});