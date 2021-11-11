<?php

declare(strict_types=1);

namespace GildedRose;

class BackstageProduct extends BaseProduct
{
    public function decreaseQuality($pts = 1): BaseProduct
    {
        $this->increaseQuality();

        if ($this->item->sell_in < 10) {
            $this->increaseQuality();
        }

        if ($this->item->sell_in < 5) {
            $this->increaseQuality();
        }

        if ($this->item->sell_in < 0) {
            parent::decreaseQuality($this->item->quality);
        }

        return $this;
    }
}
