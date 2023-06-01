<?php

declare(strict_types=1);

namespace App\Enums;

enum OrderBy:string {
    case DESC = "DESC";
    case ASC = "ASC";
}