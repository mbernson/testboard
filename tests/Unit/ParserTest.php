<?php

namespace Tests\Unit;

use App\JunitParser\Parser;
use Tests\TestCase;

class ParserTest extends TestCase
{
    public function test_empty()
    {
        $xml = <<<XML
        <?xml version="1.0" encoding="UTF-8"?>
        <testsuite name="nl.postnl.app.extensions.ObservableExtensionsTest" tests="8" skipped="0" failures="0" errors="0" timestamp="2019-09-05T23:06:48" hostname="prd-latest-usc1b-190905225907-37jm9mmtsvkt7xwflc79ed" time="11.7">
        </testsuite>
        XML;
        $parser = new Parser();
        $result = $parser->parse($xml);
        $this->assertEmpty($result);
    }

    public function test_empty_2()
    {
        $xml = <<<XML
        <?xml version='1.0' encoding='UTF-8'?>
        <testsuites name='All' tests='108' failures='7'>
        <testsuite name='PostNLUITests - iPhone 8 - 12.4' tests='108' failures='7'>
        </testsuite>
        </testsuites>
        XML;
        $parser = new Parser();
        $result = $parser->parse($xml);
        $this->assertEmpty($result);
    }

    public function test_single()
    {
        $xml = <<<XML
        <?xml version='1.0' encoding='UTF-8'?>
        <!-- <testsuites name='All' tests='108' failures='7'> -->
        <testsuite name='PostNLUITests' tests='108' failures='7'>
            <testcase classname='MyMailOverview - iPhone 8 - 12.4' name='testMyMailOverviewUnreads()' time='29.96'/>
        </testsuite>
        <!-- </testsuites> -->
        XML;
        $parser = new Parser();
        $results = $parser->parse($xml);
        $this->assertEquals(1, count($results));
        $testCase = $results[0];

        $this->assertEquals('testMyMailOverviewUnreads()', $testCase->name);
        $this->assertEquals('MyMailOverview - iPhone 8 - 12.4', $testCase->classname);
        $this->assertEquals(29.96, $testCase->time);
        $this->assertEquals('PostNLUITests', $testCase->suite);
    }

    public function test_iOS_report() {
        $parser = new Parser();
        $filename = __DIR__ . "/../fixtures/ios.report.junit.xml";
        $results = $parser->parseFile($filename);
        $this->assertEquals(108, count($results));

        $succeeded = $results[0];
        $this->assertEquals('passed', $succeeded->result);

        $failed = $results[1];
        $this->assertEquals('failure', $failed->result);
        $this->assertEquals('testRerouteNotAvailable()', $failed->name);
        $this->assertEquals('Assertion Failure: Shipments.swift:179: XCTAssertTrue failed', $failed->failureReason);

        $skipped = $results[4];
        $this->assertEquals('skipped', $skipped->result);

    }

    // public function test_android_report() {
    //     $parser = new Parser();
    //     $filename = __DIR__ . "/../fixtures/ios.report.junit.xml";
    //     $results = $parser->parseFile($filename);
    //     $this->assertEquals(8, count($results));
    // }
}
