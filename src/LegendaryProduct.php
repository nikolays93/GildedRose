<?php

namespace GildedRose;

class LegendaryProduct extends BaseProduct
{
    public function decreaseQuality($pts): BaseProduct
    {
        // Do not change legendary product quality.
        return $this;
    }

    public function decreaseSellIn($pts): BaseProduct
    {
        // Do not change legendary product sell in.
        return $this;
    }
}
