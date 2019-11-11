<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = ['status'];

    public function app()
    {
        return $this->belongsTo(App::class);
    }

    public function testCases() {
        return $this->hasMany(TestCase::class);
    }
}
