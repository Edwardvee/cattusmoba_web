"use strict";

/**
 * Este script tiene un atributo llamado autorun, el cual llamara al paginador al instante de que se cargue este archivo
 */
$.ajaxSetup({
  headers: {
    Accept: "application/json; charset=utf-8",
    Follow: false
  }
});

/**
 * Esta es un handler el cual se activara cada vez que se cambie la variable que tiene definida
 * la pagina y lo que se busca
 * 
 * Se activa el handler a traves de un proxy
*/

// https://stackoverflow.com/questions/45810904/typeerror-set-on-proxy-trap-returned-falsish-for-property

var information = new Proxy(JSON.parse(document.getElementById("http_data_paginator").innerHTML), {
  set: (obj, prop, value) => {
    if ((typeof (prop) === "string") && (!["string", "number"].includes(typeof(value)))) {
      throw "FATAL: La propiedad no es un string o el value provisto no es un string/numbero";
    }
    if (((prop === "page") && (isNaN(parseInt(value)))) || ((prop === "name") && (!value.length > 16))) {
      throw "FATAL: Lo provisto en el paginador no son datos validos";
    }
    Object.assign(obj, { [prop]: value });
    searchUsers(obj["name"], obj["page"])
    console.log(obj);
    window.history.replaceState(obj, "", route("user_paginator", obj));
    return true;
  }
});

function searchUsers($name, $page = 1) {
  $.ajax({
    method: "GET",
    accepts: "application/json",
    url: getRoute($name, $page),
    success: (response) => {
      console.log(response);
      document.getElementById("paginator").innerHTML = "";
      let paginatorResult;
      paginatorResult = document.createElement("div");
      if (response["data"].length < 1) {
        $("#paginator").append($(document.createTextNode("No se encontraron datos para la busqueda solicitada")));
        return;
      }
      response.data.forEach(element => {
        $(paginatorResult).append($(document.createElement("li")).append($(document.createElement("a")).attr("href", route("users", element["uuid"])).html(element["name"])));
      });
      paginatorResult.append($(document.createElement("p")).html("Mostrando " + response["from"] + " a " + response["to"] + " de " + response["total"] + "resultados"));
      $("#paginator").append(paginatorResult);
      let paginatorLinks;
      paginatorLinks = document.createElement("div");
      response.links.forEach(element => {
        $(paginatorLinks).append($(document.createElement("buton")).addClass("btn btn-primary").append($(document.createElement("A")).attr("onclick", "information['page'] = element['label'];"
        ).html(element["label"])));
        $(paginatorResult).append(paginatorLinks);
      });
    }
  });
}

if (document.currentScript.getAttribute("autorun") == "true") {
  $(document).ready(function () {
    let preload = information["name"];
    information["name"] = preload;
  });
}