<?php

namespace Tests\Unit\App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    protected function model(): Model
    {
        return new User();
    }

    public function test_traits()
    {
        $traits = array_keys(class_uses($this->model()));

        $expectedTraits = [
            HasApiTokens::class,
            HasFactory::class,
            Notifiable::class,
        ];

        $this->assertEquals($expectedTraits, $traits);
    }

    public function test_fillable()
    {
        $fillable = $this->model()->getFillable();

        $expectedFillable = [
            'name',
            'email',
            'password',
        ];

        $this->assertEquals($expectedFillable, $fillable);
    }

    public function test_incrementing_is_false()
    {
        $this->assertFalse($this->model()->incrementing);
    }

    public function test_has_casts()
    {
        $expectedCasts = [
            'id' => 'string',
            'email_verified_at' => 'datetime',
            // 'deleted_at' => 'datetime',
        ];

        $casts = $this->model()->getCasts();

        $this->assertEquals($expectedCasts, $casts);
    }
}
