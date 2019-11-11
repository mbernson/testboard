<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    protected $fillable = ['title'];

    public function project() {
        return $this->belongsTo(Project::class);
    }

    public function submissions() {
        return $this->hasMany(Submission::class);
    }

    public function tests() {
        return $this->hasMany(Test::class);
    }

    public function results() {
        return $this->hasMany(Result::class);
    }
}
