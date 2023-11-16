<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Chat extends Model
{
    use HasFactory, HasUuids;
    public $primaryKey = "uuid";
    public $incrementing = false;
    
    public function users() {
        return $this->belongsToMany(User::class)->using(new class extends Pivot {
            protected $primaryKey = "uuid";
            public $incrementing = false;
            use HasUuids;
        });
    }
    public function messages() {
        return $this->hasMany(Message::class);
    }
}
