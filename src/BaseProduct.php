<?php

declare(strict_types=1);

namespace GildedRose;

abstract class BaseProduct
{
    /** @var int Значение срока хранения после которого товар начинает терять качество быстрее */
    const SELL_IN_TO_QTY = 0;
    /** @var int Минимальное значение качества товара */
    const MIN_QUALITY = 0;
    /** @var int Максимальное значение качества товара */
    const MAX_QUALITY = 50;

    protected $item;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    public function update(): void
    {
        $this
            ->decreaseSellIn()
            ->decreaseQuality();
    }

    protected function setSellIn($sellIn): self
    {
        $this->item->sell_in = $sellIn;
        return $this;
    }

    public function decreaseSellIn($pts = 1): self
    {
        return $this->setSellIn($this->item->sell_in - abs($pts));
    }

    protected function setQuality($quality): self
    {
        $this->item->quality = max($quality, self::MIN_QUALITY);
        $this->item->quality = min($quality, self::MAX_QUALITY);

        return $this;
    }

    public function increaseQuality($pts = 1): self
    {
        return $this->setQuality($this->item->quality + abs($pts));
    }

    public function decreaseQuality($pts = 1): self
    {
        return $this->setQuality($this->item->quality - abs($pts));
    }
}
