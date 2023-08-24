"use strict";

import { searchPaginator } from "./user_paginator";

export class UserPaginator extends searchPaginator {
    public routeUniqueIdentifier: string = "users";
    public routeGenerator: string = "user";
}