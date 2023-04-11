"use strict";

/**
 * Esta es un handler el cual se activara cada vez que se cambie la variable que tiene definida
 * la pagina y lo que se busca
 * 
 * Se activa el handler a traves de un proxy
*/

//Falta pulir y corregir fallos

var information = new Proxy(JSON.parse(document.getElementById("http_data").innerHTML), {
  set(obj, prop, value) {
    if ((typeof (prop) === "string") && (!["string", "number"].includes(typeof(value)))) {
      throw "FATAL: La propiedad no es un string o el value provisto no es un string/numbero";
    }
    if (((prop === "page") && (isNaN(parseInt(value)))) || ((prop === "name") && (!value.length > 16))) {
      throw "FATAL: Lo provisto en el paginador no son datos validos";
    }
    searchUsers(obj["name"], obj["page"])
    console.log(obj);
    window.history.replaceState(obj, "", route("user_paginator", obj));
  }
});


function searchUsers($name, $page = 1) {
  $.ajax({
    method: "GET",
    accepts: "application/json",
    url: route("user", {
      name: $name,
      page: $page
    }),
    success: (response) => {
      console.log(response);
      let paginatorResult;
      paginatorResult = document.createElement("div");
      response.data.forEach(element => {
        $(paginatorResult).append($(document.createElement("li")).append($(document.createElement("a")).attr("href", route("users", element["uuid"])).html(element["name"])));
      });
      paginatorResult.append($(document.createElement("p")).html("Mostrando " + response["from"] + " a " + response["to"] + " de " + response["total"] + "resultados"));
      $("#paginator").append(paginatorResult);
      let paginatorLinks;
      paginatorLinks = document.createElement("div");
      response.links.forEach(element => {
        $(paginatorLinks).append($(document.createElement("buton")).addClass("btn btn-primary").append($(document.createElement("A")).attr("onclick", "information={name: information['name'], page: element['label']};"
        ).element["label"]).html(element["label"]));
        $(paginatorResult).append(paginatorLinks);
      });
    }
  });
}
$(document).ready(function () {
  let preload = information["name"];
  information["name"] = preload;
});