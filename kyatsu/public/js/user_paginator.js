"use strict";

/**
 * Este script tiene un atributo llamado autorun, el cual llamara al paginador al instante de que se cargue este archivo
 */
$.ajaxSetup({
    headers: {
        "X-Requested-With": "XMLHttpRequest",
        Accept: "application/json; charset=utf-8",
        Follow: false,
    },
});

/**
 * Esta es un handler el cual se activara cada vez que se cambie la variable que tiene definida
 * la pagina y lo que se busca
 *
 * Se activa el handler a traves de un proxy
 */

// https://stackoverflow.com/questions/45810904/typeerror-set-on-proxy-trap-returned-falsish-for-property

var information = new Proxy(
    JSON.parse(document.getElementById("http_data_paginator").innerHTML),
    {
        set: (obj, prop, value) => {
            if (
                typeof prop === "string" &&
                !["string", "number"].includes(typeof value)
            ) {
                throw "FATAL: La propiedad no es un string o el value provisto no es un string/numbero";
            }
            if (
                (prop === "page" && isNaN(parseInt(value))) ||
                (prop === "name" && !value.length > 16) ||
                (prop === "order" && !["ASC", "DESC"].includes(value))
            ) {
                throw "FATAL: Lo provisto en el paginador no son datos validos";
            }
            document.getElementById("paginator").innerHTML = "";
            Object.assign(obj, { [prop]: value });
            searchUsers(obj["name"], obj["page"]);
            console.log(obj);
            if (thisScript.getAttribute("autorun") == "true") {
                window.history.replaceState(
                    obj,
                    "",
                    route(existsOrManualZiggy(), obj)
                );
            }
            return true;
        },
    }
);

function existsOrManualZiggy () {
    try {
        //throw "E";
        return route().current();
    } catch {
        return ziggyStringToController()[0][0];
    }
}

var currentURLroute = ((new URL(window.location.href).pathname).slice(1));
var currentURLquery = new URL(window.location.href).searchParams.toString();

//Cuando se migre a typescript la idea es escribir todo esto en proxy en vez de multiples returns.

function ziggyStringToController() {
    //Obtenemos todas las rutas del controlador
    var parameters = Object.entries(Ziggy.routes).filter(element => {
        if (new RegExp(currentURLroute, "i").test(element[1]["uri"])) {
            return true;
        }
    });
    //Obtenemos todas las rutas del controlador las cuales el
    //regex coincida con la URL actual
    var selectiveParameters = parameters.filter(element => {
        let splitted = element[1]["uri"].split("/");
        var regExp = '^';
        splitted.forEach((element2, index) => {
            //En Ziggy, las rutas de laravel las cuales contienen un parametro en la url
            // contienen {}, por lo que debemos detectarlo con regex para ver si es ese caos
            if (/({)|(})/.test(element2)) {
                regExp += "([a-zA-Z0-9-_{}]+)";
            //Si no lo es agregamos la parte de la ruta textual al regex
            } else {
                regExp += "(";
                regExp += element2;
                regExp += ")";
            }
            //Por cada grupo dentro del regex debemos agregar al separador slash, pero debemos hacerlo
            //siempre excepto cuando es la parte final de la URL.
            if (index != (splitted.length - 1)) {
                regExp += "\\/";
            }
        });
        //Probamos el regex para ver si coincide con la URL
        if (new RegExp(regExp, "i").test(currentURLroute)) {
            return true;
        }
    });

    if (!selectiveParameters.length > 1) {
        return selectiveParameters;
    };

    //Aca mediante un OPTIONS obtenemos todos los metodos autorizados y comparamos si los
    //que tenemos en Ziggy Routes coinciden con los autorizados
    var methodSelectiveParameters = selectiveParameters.filter(element => {
        var req = new XMLHttpRequest();
        req.open('OPTIONS', document.location, false);
        req.send(null);
        //El header Allow dice los metodos autorizados
        var headers = req.getResponseHeader("Allow");
        var splitted_headers = headers.split(",");
        if (splitted_headers.forEach(element_headers => {
            //Si el metodo autorizado se encuentra en la ruta ziggy, retornar true
            if (element[1]["methods"].includes(element_headers)) {
                return true;
            }
        }));
    });
    if (!methodSelectiveParameters.length != 1) {
        return methodSelectiveParameters
    };
    //Este es el ultimo filtro, si el metodo autorizado es GET y la query de la pagina actual no esta vacia, es get y autorizados
    //Si no es get y el currentURLquery esta vacio retornamos true ya que no es get
    //La idea es no llegar a este filtro ya que no es preciso pero a veces no queda otra
    var forcedSelectiveParameters = selectiveParameters.filter((element, index) => {
        if ((element[1]["methods"].includes("GET")) && (currentURLquery != "")) {
            return true;
        } else if (currentURLquery == "" && !element[1]["methods"].includes("GET")) {
            return true;
        }
    });
    return forcedSelectiveParameters;
}

function cacher(func) {
    var cache = [];
    return function (n) {
        var index = n.toString();
        if (cache[index] == undefined) {
            cache[index] = func(n);
        }
        return cache[index];
    };
}

function searchUsers($name, $page = 1) {
    let searchcontent = document.getElementById("search-content");
    console.log($name);
    console.log($page);

    if ($name == "" || $name == null || $name == 0) {
        erase();
        return "";
    }

    $.ajax({
        method: "GET",
        accepts: "application/json",
        url: getRoute($name, $page),
        success: (response) => {
            if (thisScript.getAttribute("autorun") == "false ") {
                console.warn(response);
                $("#paginator").html("");
                document.getElementById("paginator").removeAttribute("class");
                $("#paginator").attr("class");
                $("#paginator").blur(function () {
                    if (!this.value) {
                        $(this).parents("p").addClass("invisible");
                    }
                });
                let paginatorResult;
                paginatorResult = $(document.createElement("nav"))
                    .addClass("results_pag")
                    .attr("id", "resultsid_pag");
                let resultsList = $(document.createElement("ul")).attr(
                    "tabindex",
                    "0"
                );
                $(resultsList).attr("id", "resultsUl");
                $(paginatorResult).append(resultsList);
                if (response["data"].length < 1) {
                    $("#paginator").append(
                        $(
                            document.createTextNode(
                                "No se encontraron datos para la busqueda solicitada"
                            )
                        )
                    );
                    return;
                }
                response.data.forEach((element) => {
                    $(resultsList).append(
                        $(document.createElement("li"))
                            .attr("tabindex", "-1")
                            .append(
                                $(document.createElement("a"))
                                    .attr("href", route("users", element["uuid"]))
                                    .html(element["name"])
                            )
                    );
                });
                paginatorResult
                    .append(
                        $(document.createElement("p"))
                            .html(
                                "Mostrando " +
                                response["from"] +
                                " a " +
                                response["to"] +
                                " de " +
                                response["total"] +
                                " resultados"
                            )
                            .addClass("fw-lighter")
                    )
                    .attr("id", "searchText");
                $("#paginator").append(paginatorResult);
                if (thisScript.getAttribute("autorun") == "true") {
                    let paginatorLinks;
                    paginatorLinks = document.createElement("div");
                    paginatorLinks.setAttribute("id", "paginator_links");
                    response.links.forEach((element) => {
                        $(paginatorLinks).append(
                            $(document.createElement("buton"))
                                .addClass("btn btn-primary")
                                .append(
                                    $(document.createElement("A"))
                                        .click(() => {
                                            information["page"] = element["label"];
                                        })
                                        .html(element["label"])
                                )
                        );
                        $(paginatorResult).append(paginatorLinks);
                    });
                }
                //Crear la tabla
            } else {
                console.log(response);
                $("#paginator").append($(document.createElement("table")).addClass("table table-hover")
                .append($(document.createElement("thead")).addClass("table-dark").append($(document.createElement("tr")).append(
                            () => {
                            //Aca creamos los th
                            var answer = [];
                              Object.keys(response["data"][0]).forEach(element => {
                                    answer.push($(document.createElement("th")).html(element).get(0));
                               })
                            return answer;
                            }  
                        )
                    )
                  ).append($(document.createElement("tbody")).append(() => {
                        var answer = [];
                        Object.keys(response["data"]).forEach(element => {
                            console.log("Entro al object keys");
                            //Por cada key(registro) creamos un tr y le haremos un foreach de cada td
                            answer.push($(document.createElement("tr")).append(() => {
                                    var perLine = [];
                                    Object.entries(response["data"][element]).forEach(element2 => {
                                        // agregar ?? null a element2[1] si se quiere que los campos vacios digan nulo
                                        perLine.push($(document.createElement("td")).html(element2[1]).get(0));
                                    });                                
                                    return perLine;
                                }).get(0)
                            );
                        });
                        return answer;
                  }
                  ))
                );
            }
   
        },
        statusCode: {
            429: function () {
                $("#paginator").append(
                    $(
                        document.createTextNode(
                            "Se han realizado demasiadas solicitudes, espera un poco"
                        )
                    )
                );
            }
        }
    });
}
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}
/* var searchUser = cacher(searchUsers); */
var searchUsers = debounce(searchUsers, 600);
let thisScript = document.currentScript;

if (thisScript.getAttribute("autorun") == "true") {
    $(document).ready(function () {
        let preload = information["name"];
        information["name"] = preload;
    });
}

/*
var searchcontent = document.getElementById("search-content");
searchcontent.addEventListener("input", function (event) {
    if (this.value == 0) {
      erase();
    }
});
*/
let resultsbox = document.getElementById("paginator");
let searchcontent = document.getElementById("search-content");

function erase() {
    let resultsbox = document.getElementById("paginator");
    let searchcross = document.getElementById("searcherase");
    let searchcontent = document.getElementById("search-content");
    searchcontent.value = "";
    resultsbox.innerHTML = "";
    resultsbox.classList.add("invisible");
}
function checkEmpty() {
    let resultsbox = document.getElementById("paginator");
    let searchcontent = document.getElementById("search-content");
    searchcontent.addEventListener("input", (e) => {
        if (
            searchcontent.value == "" ||
            searchcontent.value == null ||
            searchcontent.value == 0
        ) {
            erase();
        } else {
            resultsbox.removeAttribute("class ");
        }
    });
}