<?php

namespace Core\Orders;

class Cart
{
    /**
     * @var Product[]
     */
    private array $items = [];

    public function add(Product $product)
    {
        $qtd = isset($this->items[$product->getId()]) ? $this->items[$product->getId()]['qtd'] + 1 : 1;

        $this->items[$product->getId()] = [
            'qtd' => $qtd,
            'product' => $product
        ];
        // array_push($this->items, $product);
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function total(): float
    {
        $total = 0;

        foreach ($this->items as $item) {
            $product = $item['product'];
            $total += $product->getPrice() * $item['qtd'];
        }

        return $total;
    }
}
