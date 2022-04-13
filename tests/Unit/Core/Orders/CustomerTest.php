<?php

namespace Tests\Core\Orders;

use Core\Orders\Customer;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    public function testAttributes()
    {
        $customer = new Customer(
            name: "Carlos Ferreira"
        );
        $this->assertEquals("Carlos Ferreira", $customer->getName());

        $customer->changeName(
            name: "new name"
        );
        $this->assertEquals("new name", $customer->getName());

        $this->assertTrue(true);
    }
}
