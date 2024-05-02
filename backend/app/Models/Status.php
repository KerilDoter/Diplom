<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    // Статус может иметь много постов. Связь один-ко-многим
    public function posts () {
        // пишем название функции если к какой таблице подключаемся,
        // то есть выбери все посты со статусами
        return $this->hasMany(Post::class);
        // в методе hasMany() указываем с какой моделью связываемся Модель::class
    }

    // Статус имеет много постов

}
