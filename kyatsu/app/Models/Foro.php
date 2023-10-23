<?php

namespace App\Models;

use Database\Factories\forumFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Foro extends Model
{
    use HasFactory;
    protected $primaryKey = "id";
    public $incrementing = true;
    use SoftDeletes;
    protected $table = 'foro';
    protected $info = [
        'id',
        'isChildOf',
        'user_poster',
        'content',
        'created_at',
        'reply_count',
        'like_count',
        'updated_count',
        'deleted_at'
    ];
    public static function newFactory(): Factory
    {
        return forumFactory::new();
    }   
}

