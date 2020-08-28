<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'text', 'isPrivate', 'category_id', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id')->first();
    }

    public static function rules()
    {
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => 'required|min:3:|max:30',
            'text' => 'required|min:3',
            'image' => 'mimes:jpeg,bmp,png|max:3000',
            'isPrivate' => 'sometimes|accepted',
            'category_id' => "required|exists:{$tableNameCategory},id"
        ];
    }

    public static function attrNames()
    {
        return [
            'title' => 'Заголовок новости',
            'text' => 'Текст новости',
            'image' => 'Изображение для новости',
            'isPrivate' => 'Приватная',
            'category_id' => "Категория новости"
        ];
    }
}
