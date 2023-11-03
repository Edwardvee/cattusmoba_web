const Ziggy = {"url":"http:\/\/localhost","port":null,"defaults":{},"routes":{"sanctum.csrf-cookie":{"uri":"sanctum\/csrf-cookie","methods":["GET","HEAD"]},"ignition.healthCheck":{"uri":"_ignition\/health-check","methods":["GET","HEAD"]},"ignition.executeSolution":{"uri":"_ignition\/execute-solution","methods":["POST"]},"ignition.updateConfig":{"uri":"_ignition\/update-config","methods":["POST"]},"user":{"uri":"api\/frontend\/user\/{name}\/{page}","methods":["GET","HEAD"]},"authentication":{"uri":"authentication","methods":["GET","HEAD"]},"users":{"uri":"user\/{uuid}","methods":["GET","HEAD"]},"user_paginator":{"uri":"user_paginator\/{name}\/{page}","methods":["GET","HEAD"]},"mainpage":{"uri":"\/","methods":["GET","HEAD"]},"gameinfo":{"uri":"gameinfo","methods":["GET","HEAD"]},"redis":{"uri":"redis","methods":["GET","HEAD"]},"heroes":{"uri":"heroes\/{name?}","methods":["GET","HEAD"]},"dasomnya":{"uri":"dasomnya","methods":["GET","HEAD"]},"historia":{"uri":"historia","methods":["GET","HEAD"]},"patchnotes":{"uri":"patchnotes","methods":["GET","HEAD"]},"store":{"uri":"store","methods":["GET","HEAD"]},"como jugar":{"uri":"como jugar","methods":["GET","HEAD"]},"isBanned":{"uri":"isBanned","methods":["GET","HEAD"]},"register":{"uri":"register","methods":["POST"]},"login":{"uri":"login","methods":["GET","POST","HEAD"]},"password.email":{"uri":"forgot-password","methods":["POST"]},"password.store":{"uri":"reset-password","methods":["POST"]},"verification.verify":{"uri":"verify-email\/{id}\/{hash}","methods":["GET","HEAD"]},"verification.send":{"uri":"email\/verification-notification","methods":["POST"]},"logout":{"uri":"logout","methods":["GET","POST","HEAD"]},"admin.admin_users.index":{"uri":"admin\/admin_users","methods":["GET","HEAD"]},"admin.admin_users.create":{"uri":"admin\/admin_users\/create","methods":["GET","HEAD"]},"admin.admin_users.store":{"uri":"admin\/admin_users","methods":["POST"]},"admin.admin_users.show":{"uri":"admin\/admin_users\/{admin_user}","methods":["GET","HEAD"]},"admin.admin_users.edit":{"uri":"admin\/admin_users\/{admin_user}\/edit","methods":["GET","HEAD"]},"admin.admin_users.update":{"uri":"admin\/admin_users\/{admin_user}","methods":["PUT","PATCH"]},"admin.admin_users.destroy":{"uri":"admin\/admin_users\/{admin_user}","methods":["DELETE"]}}};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export { Ziggy };


import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
 
window.Pusher = Pusher;
 
window.Echo = new Echo({
    broadcaster: 'pusher',
    key: import.meta.env.VITE_PUSHER_APP_KEY,
    cluster: import.meta.env.VITE_PUSHER_APP_CLUSTER,
    forceTLS: true
});

