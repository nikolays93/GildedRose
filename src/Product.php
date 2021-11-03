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

    public function decreaseSellIn($pts)
    {
        $pts = abs($pts);

        $this->item->sell_in -= $pts;

        return $this;
    }

    public function decreaseQuality($pts)
    {
        $pts = abs($pts);

        $this->item->quality -= $pts;

        return $this;
    }
}
