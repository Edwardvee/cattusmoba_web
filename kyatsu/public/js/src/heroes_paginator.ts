"use strict";

declare function route(name?: string, params?: object | string): string & { current: () => string };

import { DateOrString } from "daterangepicker";
import { Paginator } from "./user_paginator.js";

interface HeroesPaginatorData {
    uuid: string,
    name: string,
    description: string,
    created_at: DateOrString,
    updated_at: DateOrString,
    deleted_at?: DateOrString
}

interface HeroesPaginatorResponseInterface {
    current_page: number,
    data: HeroesPaginatorData[],
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


export class HeroesPaginator extends Paginator {
    public MayBePaginable: boolean = true;
    public ProxyMayChangeURL: boolean = true; 
    public routeGenerator: string = "heroes";
    public routeUniqueIdentifier: string = "A";
    public constructor(capsulator?: string) {
        super(capsulator ?? "paginator_heroes");
    }
    public buildHTML(response: HeroesPaginatorResponseInterface): HTMLDivElement {
        let FoundHero: HeroesPaginatorData = Array.from(response["data"]).filter((element: HeroesPaginatorData) => {
            return (element["uuid"] === this.information.name)
        })[0];
        return $(document.createElement("div")).addClass("row").append(  $(document.createElement("div")).addClass("col").append(
            $(document.createElement("h1")).attr("id", "heroname").addClass("sub-estetico").html(FoundHero["name"])
        ).append($(document.createElement("row")).append($(document.createElement("div")).addClass("col-8 niggabackground")
        .append(
            $(document.createElement("h3")).html("Actriz de voz: Desconocido")
        ).append(
            $(document.createElement("h6")).html("Cumpleaños: NULL")
        ).append(
            $(document.createElement("p")).addClass("message").html(FoundHero["description"])
        )
        ))).
        append($(document.createElement("div")).addClass("col-6 pj-container paginable-ts")).
        append($(document.createElement("img")).addClass("pj")
        .attr("src", this.getIMGRoute() + FoundHero["name"]) + ".png")
        .get(0)!;
        
        /*<div class="col"> <!-- descripcion de los heroes -->
        <h1 id="heroname" class="sub-estetico">Nombre de Heroe</h1>
        <div class="row">
          <div class="col-8 niggabackground">
            <h3>Actriz de voz: Ivan Quiroga</h3>
            <h6>Cumpleaños / 04-06</h6>
            <p class="message">Mensaje</p>
          </div>
        </div>
      </div>*/
    }
    public buildHTMLPaginable(response: HeroesPaginatorResponseInterface): HTMLDivElement {
        return $(document.createElement("div")).addClass("col-12 align-self-end niggabackground").
        append($(document.createElement("button")).addClass("heroes")).
        append((): HTMLAnchorElement[] => {
            var answer: HTMLAnchorElement[] = [];
            Object.entries(response["data"]).forEach((element: any) => {
                answer.push($(document.createElement("a")).attr("href", element['name']).append($(document.createElement("button")).addClass("heroes").attr("style",
                "background-image: url(" + this.getIMGRoute() + element["name"] + "alt.png"
                )).get(0)!);
            });
            return answer;

        }).
        get(0)!
//echo "<a href='" . $hero_ind['name'] . "'><button class='heroes' id='" . $hero_ind['name'] . "' style='background-image: url(../img/" . $hero_ind['name'] ."alt". ".png)'></button></a>" ; }; @endphp </div>
    }
    public override xhrSuccess(response: HeroesPaginatorResponseInterface): void {
        $(this.capsulator).empty();
        //@ts-ignore
        $(this.capsulator).append(this.buildHTML(response));
        if (this.MayBePaginable) {
            $(this.capsulator.getElementsByClassName("paginable-ts")[0]).append(
                $(this.buildHTMLPaginable(response))
            )
        }
    }
    /**
     * Heros Webpage already contains a predefined not found template
     * @returns undefined
     */
    public override buildHTMLEmpty(): HTMLTableElement | undefined {
        return undefined;   
    }

}