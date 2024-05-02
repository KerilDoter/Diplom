<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // с категориями - связь многие-к-одному
    // со статусами  - связь многие-к-одному
    // с тегами      - связь многие-ко-многим
    public function tags () {
        // пост может иметь много тегов
        return $this->belongsToMany(Tag::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }
    public function status() {
        return $this->belongsTo(Status::class);
    }
}
