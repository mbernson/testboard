<?php

namespace App\JunitParser;

use XMLReader;

class Parser
{
    /**
     * @param string $filename
     * @return TestCase[]
     */
    public function parseFile(string $filename): array {
        if (!file_exists($filename)) {
            throw new \Exception("File $filename does not exist");
        }

        return $this->parse(file_get_contents($filename));
    }

    /**
     * @return TestCase[]
     */
    public function parse(string $xml): array
    {
        $reader = new XMLReader();
        $reader->xml($xml);
        $results = [];

        /** @var string $currentSuite */
        $currentSuite = null;

        while ($reader->read()) {
            if ($reader->nodeType == XMLReader::ELEMENT) {
                $tag = $reader->name;
                switch ($tag) {
                    case 'testsuite':
                    $currentSuite = $reader->getAttribute('name');
                    break;

                    case 'testcase';
                    $result = new TestCase(
                        $currentSuite,
                        $reader->getAttribute('name'),
                        $reader->getAttribute('classname'),
                        $reader->getAttribute('time')
                    );
                    $result->result = 'passed';
                    $results[] = $result;
                    break;

                    case 'failure':
                    case 'skipped':
                    case 'error':
                    $result = last($results);
                    $result->result = $tag;
                    $result->failureReason = trim($reader->readString());
                    break;
                }
            }
        }

        $reader->close();
        return $results;
    }
}
