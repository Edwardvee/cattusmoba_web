"use strict";

import { TablePaginator } from "./user_paginator.js";

export class AdministrablePaginator extends TablePaginator {
    public routeUniqueIdentifier: string = "A";
    public routeGenerator: string = "admin.admin_users.index";
    public constructor(capsulator? :string) {
        super(capsulator ?? "paginator_admin");
    }
    protected tableRowAddon(): HTMLTableCellElement[] {
        return ((): HTMLTableCellElement[] => {
            //Aca creamos los th
            var answer: HTMLTableCellElement[] = [];
            answer.push($(document.createElement("th")).html("Baneo").get(0)!);
            answer.push($(document.createElement("th")).html("Editar").get(0)!);
            answer.push($(document.createElement("th")).html("Borrar").get(0)!);
            return answer;
        })();
    }
    protected tableColumnAddon(uuid: string): HTMLTableCellElement[] {
        return ((uuid: string): HTMLTableCellElement[] => {
            //Aca creamos los th
            console.log(uuid);
            var answer: HTMLTableCellElement[] = [];
            answer.push($(document.createElement("td")).append($(document.createElement("a")).attr("href", "https://example.com")).html("Opciones de suspencion").get(0)!);
            answer.push($(document.createElement("td")).append($(document.createElement("a")).attr("href", "https://example.com")).html("Editar usuario").get(0)!);
            answer.push($(document.createElement("td")).append($(document.createElement("a")).attr("href", "https://example.com")).html("Borrar usuario").get(0)!);
            return answer;
        })(uuid);
    }
}