<?php

namespace App;

use DB;

use App\TestCase;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    protected $fillable = ['title'];

    public function testCases() {
        return $this->hasMany(TestCase::class);
    }

    public function states() {
        return TestCase::query()
            ->select('result', DB::raw('count(result) as total'))
            ->where('component_id', $this->getKey())
            ->groupBy('result')
            ->get();
    }
}
