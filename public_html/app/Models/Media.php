<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    const TYPE_MAPPING = [
        '1' => 'Publication',
        '2' => 'Blog',
        '3' => 'Event',
        '4' => 'Newsletter',
    ];

    use HasFactory;
    protected $guarded = [];

    public function getTypeAttribute($value)
    {
        return self::TYPE_MAPPING[$value];
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'media_tags', 'media_id', 'tag_id');
    }
}
