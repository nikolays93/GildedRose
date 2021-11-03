<?php

declare(strict_types=1);

namespace GildedRose;

class Product
{
    private $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }
}
