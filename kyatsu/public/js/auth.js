"use strict";

function swipeLogin() {
  let another_login = document.getElementById("another_login");
  let createdElement = document.createElement("input");
  createdElement.setAttribute("id", "validator");
  createdElement.setAttribute("class", "Auth_input");
  createdElement.setAttribute("required", "required");
  //Si actualmente es email
   if(!/email/.test(another_login.innerHTML)) {
    another_login.innerHTML = "Utilizar email";
    createdElement.setAttribute("name", "name");
    createdElement.setAttribute("type", "text");
    createdElement.setAttribute("placeholder", "Nombre");
    //Si actualmente no lo es
   } else {
    another_login.innerHTML = "Utilizar nombre";
    createdElement.setAttribute("name", "email");
    createdElement.setAttribute("type", "email");
    createdElement.setAttribute("placeholder", "Email");
  }
  document.getElementById("validator").remove();
  $(createdElement).insertAfter("#prepend_login");
}