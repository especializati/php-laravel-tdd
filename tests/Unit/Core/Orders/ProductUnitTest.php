<?php

namespace Tests\Core\Orders;

use Core\Orders\Product;
use Mockery;
use PHPUnit\Framework\TestCase;

class ProductUnitTest extends TestCase
{
    public function testAttributes()
    {
        $product = new Product(
            id: '1',
            name: 'prodx',
            price: 10,
            total: 12
        );

        $this->assertEquals('prodx', $product->getName());
        $this->assertEquals(10, $product->getPrice());
        $this->assertEquals('1', $product->getId());
    }

    public function testCalc()
    {
        $product = new Product(
            id: '1',
            name: "prodx",
            price: 10,
            total: 12
        );

        $this->assertEquals(120, $product->total());
    }

    public function testCalcWithTax()
    {
        $product = new Product(
            id: '1',
            name: "prodx",
            price: 100,
            total: 2
        );

        $this->assertEquals(220, $product->totalWithTax10());
    }

    public function testExampleMock()
    {
        $mockProduct = Mockery::mock(Product::class, [
            'id', 'name', 12, 1
        ]);
        $mockProduct->shouldReceive('getId')->andReturn('id');

        Mockery::close();

        $this->assertTrue(true);
    }
}
