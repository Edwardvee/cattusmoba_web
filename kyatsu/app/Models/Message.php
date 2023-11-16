<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory, HasUuids;
    public $primaryKey = "uuid";
    public $incrementing = "false";
    protected $fillable = [
        'user_uuid',
        'chat_uuid',
        'content',
    ];
    public function user() {
        return $this->belongsTo(User::class);
    }
    public function chat() {
        return $this->belongsTo(Chat::class);
    }
}
