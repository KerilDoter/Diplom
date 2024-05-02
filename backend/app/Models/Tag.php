<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    // Тег может принадлежать многим постам, но и посты могут иметь много тегов
    // Связь многие-ко-многим
    public function posts () {
        // Получаем какой-то тег и получаем все посты, которым назначен этот тег.
        // Тег может иметь много постов
        return $this->belongsToMany(Post::class);
    }
}
