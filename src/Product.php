<?php

declare(strict_types=1);

namespace GildedRose;

class Product
{
    // Значение срока хранения после которого товар начинает терять качество быстрее
    const SELL_IN_TO_QTY = 0;

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

        if ($this->item->sell_in <= self::SELL_IN_TO_QTY) {
            $pts *= 2;
        }

        $this->item->quality -= $pts;

        return $this;
    }
}
