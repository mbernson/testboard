<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Predicate extends Model
{
    public function matchesTestCase(TestCase $testCase): bool {
        $field = $this->field;
        $operator = $this->operator;
        $value = $this->value;

        switch ($field) {
            case 'name':
            case 'classname':
            break;
            default:
                throw new \Exception("Invalid field name $field");
        }

        switch ($operator) {
            case 'equals':
                return $testCase->$field == $value;

            case 'contains':
                return strpos($testCase->$field, $value) !== false;

            default:
                throw new \Exception("Invalid operator '$operator'");
        }

        // $table->unsignedBigInteger('app_id');
        // $table->foreign('app_id')->references('id')->on('apps');

        // $table->unsignedBigInteger('component_id');
        // $table->foreign('component_id')->references('id')->on('components');

        // $table->string('field')->default('name');
        // $table->string('operator')->default('equals'); // Equals, contains, starts with, ends with, matches regex
        // $table->string('value');
    }

    public function app() {
        return $this->belongsTo(App::class);
    }

    public function component() {
        return $this->belongsTo(Component::class);
    }
}
