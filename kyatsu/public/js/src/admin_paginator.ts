"use strict";

declare function route(name?: string, params?: object | string): string & { current: () => string };

import { TablePaginator } from "./user_paginator.js";
export class AdministrablePaginator extends TablePaginator {
    public routeUniqueIdentifier: string = "A";
    public routeGenerator: string = "admin.admin_users.index";
    public constructor(capsulator? :string) {
        super(capsulator ?? "paginator_admin");
        $(this.capsulator).on("DOMNodeInserted", (event) => {
            if ($(event.target).is("table") && (this.responseXHR?.data.length != 0))  {
                this.BannableContentInjector();
                this.UUIDContentInjector();
            }
        });
    }
    public BannableContentInjector(): void {{
        this.cellContentInjector("banned_at",(node: HTMLTableCellElement) => {
            $(node).attr("style", "color: red");
        })
    }}

    protected tableRowAddon(): HTMLTableCellElement[] {
        return ((): HTMLTableCellElement[] => {
            //Aca creamos los th
            var answer: HTMLTableCellElement[] = [];
            answer.push($(document.createElement("th")).html("Ver informacion").get(0)!);
            answer.push($(document.createElement("th")).html("Borrar").get(0)!);
            return answer;
        })();
    }
    protected tableColumnAddon(uuid: string): HTMLTableCellElement[] {
        return ((uuid: string): HTMLTableCellElement[] => {
            //Aca creamos los th
            console.log(uuid);
            var answer: HTMLTableCellElement[] = [];
            answer.push($(document.createElement("td")).append($(document.createElement("a")).attr("href", route("admin.admin_users.show", {admin_user: uuid})).html("Editar usuario")).get(0)!);
            answer.push($(document.createElement("td")).append($(document.createElement("a")).attr("href", "https://example.com")).html("Borrar usuario").get(0)!);
            return answer;
        })(uuid);
    }
}