<?php

declare(strict_types=1);

namespace GildedRose;

class AgedBrieProduct extends BaseProduct
{
    public function decreaseQuality($pts): BaseProduct
    {
        if ($this->item->sell_in < self::SELL_IN_TO_QTY) {
            return $this->increaseQuality(2 * $pts);
        }

        return $this->increaseQuality($pts);
    }
}
