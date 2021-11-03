<?php

declare(strict_types=1);

namespace GildedRose;

abstract class BaseProduct
{
    /** @var int Значение срока хранения после которого товар начинает терять качество быстрее */
    const SELL_IN_TO_QTY = 0;
    /** @var int Минимальное значение качества товара */
    const MIN_QUALITY = 0;

    protected $item;

    /**
     * @var int Возраст продукта в количестве обновлений.
     */
    protected $old = 0;

    public function __construct(Item $item)
    {
        $this->item = $item;
    }

    protected function update(int $interval = 1)
    {
        $this->decreaseQuality($interval);
        $this->decreaseSellIn($interval);
        $this->old += $interval;
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
        if ($this->item->sell_in <= self::SELL_IN_TO_QTY) {
            $pts *= 2;
        }

        return $this->setQuality(max($this->item->quality - $pts, self::MIN_QUALITY));
    }
}
