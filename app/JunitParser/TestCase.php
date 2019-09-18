<?php

namespace App\JunitParser;

class TestCase {
    public $suite;
    public $name;
    public $classname;
    public $time;
    public $result;
    public $failureReason;

    public function __construct(string $suite, string $name, string $classname, string $time) {
        $this->suite = $suite;
        $this->name = $name;
        $this->classname = $classname;
        $this->time = $time;
        $this->result = null;
        $this->failureReason = null;
    }
}
