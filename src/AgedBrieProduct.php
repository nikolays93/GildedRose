<?php

declare(strict_types=1);

namespace GildedRose;

class AgedBrieProduct extends BaseProduct
{
    public function decreaseQuality($pts): BaseProduct
    {
        return parent::decreaseQuality($pts * $this->old);
    }
}
