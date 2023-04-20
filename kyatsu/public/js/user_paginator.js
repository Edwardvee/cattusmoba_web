"use strict";

/**
 * Este script tiene un atributo llamado autorun, el cual llamara al paginador al instante de que se cargue este archivo
 */
$.ajaxSetup({
    headers: {
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
                (prop === "name" && !value.length > 16)
            ) {
                throw "FATAL: Lo provisto en el paginador no son datos validos";
            }
            //let disabledLinks = document.getElementById("paginator_links");
            /*if (disabledLinks) {
      $(disabledLinks).click(function (event) { event.preventDefault(); });
      $(disabledLinks).attr("style", "pointer-events:none");
    }*/
            document.getElementById("paginator").innerHTML = "";
            Object.assign(obj, { [prop]: value });
            searchUsers(obj["name"], obj["page"]);
            console.log(obj);
            if (thisScript.getAttribute("autorun") == "true") {
                window.history.replaceState(
                    obj,
                    "",
                    route("user_paginator", obj)
                );
            }
            return true;
        },
    }
);

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
        },
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
var searchUsers = debounce(searchUsers, 300);
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
function checkEmpty(){
  let searchcontent = document.getElementById("search-content");
searchcontent.addEventListener("input", (e) => {
    if (
        searchcontent.value == "" ||
        searchcontent.value == null ||
        searchcontent.value == 0
    ) {
        erase();
    } else {
        resultsbox.classList.remove("invisible");
    }
});
}