<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = ['title', 'slug'];

    public function news()
    {
        return $this->hasMany(News::class, 'category_id');
    }

    public static function rules()
    {
        $tableNameCategory = (new Category())->getTable();
        return [
            'title' => "required|min:3:|max:30|unique:{$tableNameCategory},title",
        ];
    }

    public static function attrNames()
    {
        return [
            'title' => 'Название категории',
        ];
    }
}
