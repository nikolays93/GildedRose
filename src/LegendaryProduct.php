<?php

namespace GildedRose;

class LegendaryProduct extends BaseProduct
{
    public function decreaseQuality($pts): self
    {
        // Do not change legendary product quality;
        return $this;
    }
}
