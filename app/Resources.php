<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    protected $table = 'resources';
    protected $fillable = ['title'];

    public static function rules()
    {
        $tableNameCategory = (new Resources())->getTable();
        return [
            'title' => "required|min:3:|max:30|unique:{$tableNameCategory},title",
        ];
    }

    public static function attrNames()
    {
        return [
            'title' => 'Resource URL',
        ];
    }
}
