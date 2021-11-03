<?php

declare(strict_types=1);

namespace GildedRose;

class BackstageProduct extends BaseProduct
{
    public function decreaseQuality($pts): BaseProduct
    {
        return $this->increaseQuality($pts);
    }
}