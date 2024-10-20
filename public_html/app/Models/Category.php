<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function get_parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function child_nodes()
    {
        return $this->hasOne(Category::class, 'parent_id');
    }
    public function childs()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public static function getLastLevelCategoriescreate()
    {
        return static::whereDoesntHave('child_nodes')->with(['get_parent'])->get();
    }

    public static function topLevelCategories()
    {
        return static::whereNull('parent_id')->with('childs')->get();
    }

}
