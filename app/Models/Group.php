<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $table = 'groups';

    protected $casts = [
        'created_at' => 'date:Y-m-d H:i:s',
        'updated_at' => 'date:Y-m-d H:i:s',
    ];

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'group_users', 'user_id', 'group_id');
    }

    public function groupUsers()
    {
        return $this->hasMany(GroupUser::class);
    }
}
