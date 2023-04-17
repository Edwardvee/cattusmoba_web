<?php

namespace App\Models;

use Database\Factories\HeroesFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\Factory;


class Heroes extends Model
{
    use HasFactory, HasUuids, SoftDeletes;
    protected $primaryKey = "uuid";
    public $incrementing = false;
    public static function newFactory(): Factory
    {
        return HeroesFactory::new();
    }
}
