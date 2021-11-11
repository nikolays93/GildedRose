<?php

declare(strict_types=1);

namespace GildedRose;

class AgedBrieProduct extends BaseProduct
{
    public function decreaseQuality($pts = 1): BaseProduct
    {
        if ($this->item->sell_in < self::SELL_IN_TO_QTY) {
            $pts *= 2;
        }

        return parent::decreaseQuality($pts);
    }
}
