"use strict";

/**
 * @interface
 * Specifies the data that is received by Kyatsu Moba! Laravel backend
 * on paginator responses
 * 
 */
interface PaginatorResponseInterface {
    current_page: number,
    data: string[] | void | any,
    first_page_url: string,
    from: number,
    last_page: number,
    last_page_url: number,
    links: {
        url: string | void,
        label: string,
        active: boolean
    }[],
    next_page_url: string,
    path: string,
    per_page: number,
    prev_page_url: string | void,
    to: number,
    total: number
}

enum OrderBy {
    ASC = "ASC",
    DESC = "DESC"
}
interface KyatsuProxyInterface {
    page: number,
    name: string,
    method: string,
    order: OrderBy
}

//type getRoute = () => string;
declare function route(name?: string, params?: object): string & { current: () => string };


$.ajaxSetup({
    headers: {
        "X-Requested-With": "XMLHttpRequest",
        Accept: "application/json; charset=utf-8",
        Follow: "false",
    },
});

/*
function existsOrManualZiggy() {
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
*/


/**
 * @class
 * @abstract
 * @classdesc
 * 
 * Website-Oriented main paginator class, all website paginators
 * should follow it's template to function properly according
 * to laravel collections and Kyatsu-Moba error handling.
 * 
*/

abstract class Paginator {
    public capsulator: HTMLDivElement | HTMLElement;
    public information: KyatsuProxyInterface | ProxyConstructor;
    public abstract ProxyMayChangeURL: boolean;
    public MayBePaginable: boolean = true;
    public applyTimeout: boolean = true;
    //@ts-ignore
    private makeXHRTimeout: any;
    private makeXHRTimeoutMilliseconds: number = 500;
    public maxSearchLength: number = 16;
    public constructor(capsulator: string) {
        let getter = document.getElementById(capsulator);
        if (getter == null || !(getter instanceof HTMLElement)) {
            throw new Error("Paginator Capsulator Element not defined nor valid class");
        } else {
            this.capsulator = getter;
        }
        this.information = this.inputHandlerSetup(this.defaultProxy());
    }
    public defaultProxy(defaultParameters: boolean = false): KyatsuProxyInterface {
        let CurrentURL: URLSearchParams = new URLSearchParams;
        let JSON: KyatsuProxyInterface = {
            page: 1,
            name: "a",
            method: "uuid",
            order: OrderBy.DESC,            
        };
        if (defaultParameters == false) {
        if (CurrentURL.has("page")) {
            //@ts-ignore
            JSON.page = CurrentURL.get("page");
        }
        if (CurrentURL.has("name")) {
            //@ts-ignore
            JSON.name = CurrentURL.get("name");
        }
        if (CurrentURL.has("method")) {
            //@ts-ignore
            JSON.method = CurrentURL.get("method");
        }
        if (CurrentURL.has("order")) {
            JSON.order = CurrentURL.get("order") as OrderBy;
        }
    }
    return JSON;
    }
    /**
     * Applies a timeout to XHR Request to prevent HTTP Error 429.
     * It will read applyTimeout boolean attribute to check whenever
     * apply it or not.
     * 
     * the parameters of this functions are the same of makeXHR
     * read it's documentation.
     * 
     * @returns {void}
     */
    public makeXHRAwait($name: string, $page = 1, $order: string, $method: string): void {
        if (this.applyTimeout == true) {
            this.makeXHRTimeout = setTimeout(() => {
                this.makeXHR($name, $page, $order, $method);
            }, this.makeXHRTimeoutMilliseconds);
        } else {
            this.makeXHR($name, $page, $order, $method);
        }
    }
    //public abstract xhrSuccess(response: PaginatorResponseInterface): void;
    /**
     * Performs the XMLHTTPRequest to the server to get the paginator results
     *
     * @param $name The search string
     * @param $page page
     * @param $order If it should be order by ASC or DESC
     * @param $method The column to perform the search
     * 
     * @returns {void}
     */
    public makeXHR($name: string, $page = 1, $order: string, $method: string): void {
        $.ajax({
            method: "GET",
            accepts: {
                json: "application/json"
            },
            //@ts-ignore
            url: getRoute($name, $page, $order, $method),
            success: (response: PaginatorResponseInterface) => {
                this.xhrSuccess(response);
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
    public abstract buildHTML(response: PaginatorResponseInterface): HTMLTableElement | HTMLDivElement | undefined | void;
    public abstract buildHTMLPaginable(response: PaginatorResponseInterface): HTMLDivElement | undefined | void;

    /**
     * @description
     * Proxy object where the paginator inputs for search are specified
     * 
     * You must input the data to search by changing the object properties
     * Not by calling the XHR Function
     * 
     * NOTE: It may or not change URL search params by indicating
     * if boolean attribute ProxyMayChangeURL is true or false
     * 
     * @see https://stackoverflow.com/questions/45810904/typeerror-set-on-proxy-trap-returned-falsish-for-property
     */
    public inputHandlerSetup(defaultProxy: any) : ProxyConstructor {
        return new Proxy(
            //JSON.parse(document.getElementById("http_data_paginator")!.innerHTML),
            defaultProxy,
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
                        (prop === "name" && (value.length > 16)) ||
                        (prop === "order" && !["ASC", "DESC"].includes(value))
                    ) {
                        console.groupCollapsed("Depuracion del error de validacion");
                        console.info("Prop:");
                        console.info(prop);
                        console.info("value:");
                        console.info(value);
                        console.info("obj:");
                        console.info(obj);
                        console.info("Valid Page");
                        console.info(prop === "page" && isNaN(parseInt(value)));
                        console.info("Valid Name");
                        console.info(prop === "name" && !(value.length > this.maxSearchLength));
                        console.info("Valid Order");
                        console.info(prop === "order" && !["ASC", "DESC"].includes(value));
                        console.groupEnd();
                        throw new Error("FATAL: Lo provisto en el paginador no son datos validos");
                    }
                   // document.getElementById("paginator")!.innerHTML = "";
                    Object.assign(obj, { [prop]: value });
                    this.makeXHRAwait(obj["name"], obj["page"], obj["order"], obj["method"]);
                    //this.makeXHR(obj["name"], obj["page"], obj["order"], obj["method"]);
                    console.log(obj);
                    if (this.ProxyMayChangeURL == true) {
                        window.history.replaceState(
                            obj,
                            "",
                            route(route().current(), obj)
                        );
                    }
                    return true;
                },
            }
        );

    }
    public xhrSuccess(response: PaginatorResponseInterface): void {
        $(this.capsulator).empty();
        //@ts-ignore
        $(this.capsulator).append(this.buildHTML(response));
        if (this.MayBePaginable) {
            //@ts-ignore
            $(this.capsulator).append(this.buildHTMLPaginable(response));
        }
    }
    /*function debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }*/
}

class searchPaginator extends Paginator {
    public MayBePaginable: boolean = false;
    public ProxyMayChangeURL: boolean = false;
    /**
     * Unused code, may or not work according to current needs.
     * @param response 
     * @returns 
     */
    public buildHTMLPaginable(response: PaginatorResponseInterface): HTMLDivElement {
        let paginatorLinks: HTMLDivElement;
        paginatorLinks = document.createElement("div");
        paginatorLinks.setAttribute("id", "paginator_links");
        response.links.forEach((element: any) => {
            $(paginatorLinks).append(
                $(document.createElement("buton"))
                    .addClass("btn btn-primary")
                    .append(
                        $(document.createElement("A"))
                            .click(() => {
                                Object.assign(this.information, { page: element["label"] });
                                //information["page"] = element["label"];
                            })
                            .html(element["label"])
                    )
            );
        });
        return paginatorLinks;
    }

    public buildHTML(response: PaginatorResponseInterface): void {
        console.warn(response);
        $(this.capsulator).html("");
        document.getElementById(String(this.capsulator))!.removeAttribute("class");
        $(this.capsulator).attr("class");
        $(this.capsulator).blur(function () {
            if (!this.getAttribute("value")) {
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
        if (response["data"]!.length < 1) {
            $(this.capsulator).append(
                $(
                    document.createTextNode(
                        "No se encontraron datos para la busqueda solicitada"
                    )
                )
            );
            return;
        }
        response["data"]!.forEach((element: any) => {
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
        $(this.capsulator).append(paginatorResult);
    }
}
/**
 * @classdesc
 * Table-Oriented paginator with sorting methods like by column and/or ASC/DESC
 * @extends Paginator
 */

abstract class TablePaginator extends Paginator {
    public ProxyMayChangeURL: boolean = true;
    /**
     * Additionals cells to be added to an entry based on paginator table needs
     * @param uuid
     */
    protected abstract tableColumnAddon(uuid: string): HTMLTableCellElement[];
    /**
     * Additional row cells ready to be a added to the paginator table based on specific needs.
     */
    protected abstract tableRowAddon(): HTMLTableCellElement[];
    /**
     * @param response XHR Response
     * @returns {HTMLTableElement} Table Element ready to be appended to the DOM.
     * @inheritdoc
     * @returns {HTMLTableElement | undefined}
     */
    public buildHTML(response: PaginatorResponseInterface): HTMLTableElement | undefined {
        //$(this.capsulator).append($(document.createElement("table")).addClass("table table-hover")
        return $($(document.createElement("table")).addClass("table table-hover")
            .append($(document.createElement("thead")).addClass("table-dark").append($(document.createElement("tr")).append(
                (): HTMLTableCellElement[] => {
                    //Aca creamos los th
                    var answer: HTMLTableCellElement[] = [];
                    Object.keys(response["data"][0]).forEach(element => {
                        answer.push($(document.createElement("th")).html(element).on("click", (event) => {
                            Object.assign(this.information, { method: $(event.currentTarget).html() });
                        }).get(0)!);
                    })
                    return answer;
                }
            ).append(this.tableRowAddon())
            )
            ).append($(document.createElement("tbody")).append((): HTMLTableRowElement[] => {
                var answer: HTMLTableRowElement[] = [];
                Object.keys(response["data"]).forEach(element => {
                    console.log("Entro al object keys");
                    //Por cada key(registro) creamos un tr y le haremos un foreach de cada td
                    answer.push($(document.createElement("tr")).append((): HTMLTableCellElement[] => {
                        var perLine: HTMLTableCellElement[] = [];
                        Object.entries(response["data"][element]).forEach(element2 => {
                            // agregar ?? null a element2[1] si se quiere que los campos vacios digan nulo
                            perLine.push($(document.createElement("td")).html(String(element2[1]))!.get(0)!);

                        });
                        perLine.push(...this.tableColumnAddon(response["data"][element]["uuid"]));
                        return perLine;
                    })!.get(0)!
                    );
                });
                return answer;
            }
            ))
        ).get(0);
    }
    /**
     * Finds all td columns based on a th HTML and changes it's attribute
     * like style, etc.
     * It's useful if it's used in hiding UUIDs with button or changing
     * cells liked banned_at styles
     * 
     * @param ThCell The HTML of the THead Cell
     * @param callback the function to execute in each TD Element.
     * @param table HTML Table, if it's not provided the capsulator will be used instead
     * 
     */
    public cellContentInjector(ThCell: string, callback: any, table? : HTMLTableElement | HTMLElement ): void {
        let tableUsing: HTMLElement = table ?? this.capsulator;
        let Trow: HTMLElement = tableUsing.querySelector("thead")?.firstChild as HTMLElement;
        let filtered: number;
        if (Trow) {
            filtered = Array.from(Trow.childNodes).findIndex(element => {
                element.textContent == ThCell
            })
            if (filtered == -1) {
                throw new Error("ThCell not found");
            }
        } else {
            throw new Error("Thead first child not found");
        }
        let Tbody = tableUsing.querySelector("tbody");
        if (Tbody) {
            //tr
            Tbody?.childNodes.forEach((element_trow, index) => {
                callback(element_trow.childNodes[filtered], index);
            })
        } else {
            throw new Error("Tbody not found");
        }
    }
    public hiddenCell(element: HTMLElement, index: number): void {
        console.log("has been injected");
        console.log(element);
        console.log(index);
    }
    public buildHTMLPaginable(response: PaginatorResponseInterface): HTMLDivElement {
        return $(document.createElement("div")).append($(document.createElement("p")).html(
        "Mostrando " +
        response["from"] +
        " a " +
        response["to"] +
        " de " +
        response["total"] +
        " resultados")).append().get(0)!;
    }
}
/*
/* var searchUser = cacher(searchUsers); 
var searchUsers = debounce(searchUsers, 600);
let thisScript = document.currentScript;
/*
if (thisScript.getAttribute("autorun") == "true") {
    $(document).ready(function () {
        let preload = information["name"];
        information["name"] = preload;
    });
}

var searchcontent = document.getElementById("search-content");
searchcontent.addEventListener("input", function (event) {
    if (this.value == 0) {
      erase();
    }
});

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
}*/