<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function get_category()
    {
        return $this->belongsTo(Category::class, 'select_category');
    }
    public function get_matching()
    {
        return $this->belongsToMany(Product::class, 'product_matching_codes', 'product_id', 'matching_product_id');
    }
    public function get_specification()
    {
        return $this->belongsToMany(Specification::class, 'product_specifications', 'product_id', 'specifications_id');
    }
}
