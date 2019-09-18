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
        // $table->string('result');
        //     // $table->string('message')->nullable();

        //     $table->string('suite');
        //     $table->string('name');

        //     $table->text('failureReason')->nullable();
        //     $table->double('time');

        //     $table->unsignedBigInteger('app_id');
    ];
    protected $table = 'test_cases';

    public function app()
    {
        return $this->belongsTo(App::class);
    }
}
