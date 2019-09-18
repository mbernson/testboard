<?php

namespace App;

class SubmissionStatus {
    const PENDING = 'pending';
    const PROCESSING = 'processing';
    const PROCESSED = 'processed';
    const FAILED = 'failed';

    private function __construct() {}
}
