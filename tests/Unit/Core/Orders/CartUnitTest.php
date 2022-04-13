<?php

namespace Tests\Core\Orders;

use Core\Orders\Cart;
use Core\Orders\Product;
use PHPUnit\Framework\TestCase;

class CartUnitTest extends TestCase
{
    public function testCart()
    {
        $cart = new Cart();
        $cart->add(product: new Product(
            id: '1',
            name: 'teste',
            price: 12,
            total: 1,
        ));
        $cart->add(product: new Product(
            id: '2',
            name: 'teste',
            price: 20,
            total: 1,
        ));

        $this->assertCount(2, $cart->getItems());
        $this->assertEquals(32, $cart->total());
    }

    public function testCartTotal()
    {
        $product1 = new Product(
            id: '1',
            name: 'teste',
            price: 12,
            total: 1,
        );

        $cart = new Cart();
        $cart->add(product: $product1);
        $cart->add(product: $product1);
        $cart->add(product: new Product(
            id: '2',
            name: 'teste',
            price: 20,
            total: 1,
        ));

        $this->assertCount(2, $cart->getItems());
        $this->assertEquals(44, $cart->total());
    }

    public function testCartEmpty()
    {
        $cart = new Cart();

        $this->assertCount(0, $cart->getItems());
        $this->assertEquals(0, $cart->total());
    }
}
