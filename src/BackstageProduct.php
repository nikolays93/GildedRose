<?php

declare(strict_types=1);

namespace GildedRose;

class BackstageProduct extends BaseProduct
{
    public function decreaseQuality($pts): BaseProduct
    {
        $this->increaseQuality($pts);

        if ($this->item->sell_in < 10) {
            $this->increaseQuality($pts);
        }

        if ($this->item->sell_in < 5) {
            $this->increaseQuality($pts);
        }

        if ($this->item->sell_in < 0) {
            $this->decreaseQuality($this->item->quality);
        }

        return $this;
    }
}
