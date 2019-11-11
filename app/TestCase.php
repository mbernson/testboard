<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestCase extends Model
{
    protected $fillable = [
        'result',
        'suite',
        // 'message',
        'failureReason',
        'name',
        'time',
        'app_id',
        'component_id',
    ];

    protected $table = 'test_cases';

    public function app()
    {
        return $this->belongsTo(App::class);
    }

    public function submission()
    {
        return $this->belongsTo(Submission::class);
    }
}
