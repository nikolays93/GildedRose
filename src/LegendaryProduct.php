<?php

namespace GildedRose;

class LegendaryProduct extends BaseProduct
{
    public function decreaseQuality($pts = 1): BaseProduct
    {
        // Do not change legendary product quality.
        return $this;
    }

    public function decreaseSellIn($pts = 1): BaseProduct
    {
        // Do not change legendary product sell in.
        return $this;
    }
}
