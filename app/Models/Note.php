<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $table = 'notes';

    protected $with = ['images'];

    protected $fillable = [
        'title',
        'description',
        'group_id',
        'user_id'
    ];

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];


    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
