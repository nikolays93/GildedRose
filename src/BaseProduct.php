<?php

declare(strict_types=1);

namespace GildedRose;

abstract class BaseProduct
{
    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    protected function setSellIn($sellIn): self
    {
        $this->item->sell_in = $sellIn;
        return $this;
    }

    public function decreaseSellIn($pts): self
    {
        return $this->setSellIn($this->item->sell_in - abs($pts));
    }

    protected function setQuality($quality): self
    {
        $this->item->quality = $quality;
        return $this;
    }

    public function decreaseQuality($pts): self
    {
        return $this->setQuality($this->item->quality - abs($pts));
    }
}
