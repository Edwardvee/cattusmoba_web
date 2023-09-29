"use strict";

declare function route(name?: string, params?: object | string): string & { current: () => string };

import { DateOrString } from "daterangepicker";
import { Paginator } from "./user_paginator.js";

var moment: any
if ((typeof window.moment) === "undefined") {
    import("moment").then(Imported => {
    moment = Imported;
    });
} else {
    moment = window.moment; 
}

interface HeroesPaginatorData {
    uuid: string,
    name: string,
    description: string,
    created_at: DateOrString,
    updated_at: DateOrString,
    deleted_at?: DateOrString,
    voice_actor: string,
    birthdate: DateOrString
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
            return ((this.information.name === "null") || ((element["uuid"] === this.information.name)));
        })[0];
        return $(document.createElement("div")).addClass("row").attr("id", "PaginableHere").append( 
            $(document.createElement("div")).addClass("col").append(
                $(document.createElement("h1")).attr("id", "heroname").addClass("sub-estetico").html(FoundHero["name"])
            ).append(
                $(document.createElement("div")).addClass("row").append(
                    $(document.createElement("div")).addClass("col-8 darkbg slide-in-center").attr("style", "opacity: 1;").attr("id", "description")
        .append(
            $(document.createElement("h3")).html("Actriz de voz: " + FoundHero["voice_actor"])
        ).append(
            $(document.createElement("h6")).html("Cumpleaños: " + moment(FoundHero["birthdate"]).format("DD/MM/YYYY"))
        ).append(
            $(document.createElement("p")).addClass("message").html(FoundHero["description"])
        )
        ))).
        append(
            $(document.createElement("div")).addClass("col-6 pj-container").
        append(
            $(document.createElement("img")).attr("id", "character").attr("style", "opacity: 1;").addClass("pj slide-in-right")
        .attr("src", this.getIMGRoute(false) + "heros_img/" +  FoundHero["uuid"] + ".png")))
        .get(0)!;
    }
    public buildHTMLPaginable(response: HeroesPaginatorResponseInterface): HTMLDivElement {
        return $(document.createElement("div")).addClass("col-12 align-self-end niggabackground").
        append($(document.createElement("button")).addClass("heroes")).
        append((): HTMLAnchorElement[] => {
            var answer: HTMLAnchorElement[] = [];
            Object.entries(response["data"]).forEach((element: any) => {
                answer.push($(document.createElement("a")).on("click", () => {
                    console.log(element[1]["uuid"]);
                    Object.assign(this.information, {
                        method: "uuid",
                        name: element[1]["uuid"]
                    });
                }).append($(document.createElement("button")).addClass("heroes").attr("style",
                "background-image: url(" + this.getIMGRoute(false) + "heros_img/" + element[1]["uuid"] + "_alt.png"
                )).get(0)!);
            });
            return answer;

        }).
        get(0)!
    }
    public override xhrSuccess(response: HeroesPaginatorResponseInterface): void {
        $(this.capsulator).empty();
        $(<HTMLDivElement>this.capsulator).append(this.buildHTML(response));
        if (this.MayBePaginable) {
            $(<HTMLDivElement>(this.capsulator).firstChild).append(this.buildHTMLPaginable(response));
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