<?php

namespace Tests\Unit\App\Models;

use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\TestCase;

abstract class ModelTestCase extends TestCase
{
    abstract protected function model(): Model;
    abstract protected function traits(): array;
    abstract protected function fillable(): array;
    abstract protected function casts(): array;

    public function test_traits()
    {
        $traits = array_keys(class_uses($this->model()));

        $this->assertEquals($this->traits(), $traits);
    }

    public function test_fillable()
    {
        $fillable = $this->model()->getFillable();

        $this->assertEquals($this->fillable(), $fillable);
    }

    public function test_incrementing_is_false()
    {
        $this->assertFalse($this->model()->incrementing);
    }

    public function test_has_casts()
    {
        $casts = $this->model()->getCasts();

        $this->assertEquals($this->casts(), $casts);
    }
}
