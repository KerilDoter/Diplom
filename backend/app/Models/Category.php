<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // Категория может иметь много постов. Связь один-ко-многим
    public function posts () {
        // пишем название функции если к какой таблице подключаемся,
        // то есть выбери все посты с категориями
        return $this->hasMany(Post::class);
        // в методе hasMany() указываем с какой моделью связываемся Модель::class
    }

    // Категория имеет много постов
}
