<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];

    protected $appends = ['url_img'];
    //accessors
   public function getUrlImgAttribute()
   {
       if($this->name == null || $this->name == ''){
           return '';
       }
       return env('APP_URL').'/storage/'.$this->name;
   }
}
