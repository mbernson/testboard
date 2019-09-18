<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function apps()
    {
        return $this->hasMany(App::class);
    }

    public function components()
    {
        return $this->hasMany(Component::class);
    }
}
