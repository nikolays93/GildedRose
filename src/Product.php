<?php

declare(strict_types=1);

namespace GildedRose;

class Product extends BaseProduct
{
    // Значение срока хранения после которого товар начинает терять качество быстрее
    const SELL_IN_TO_QTY = 0;
    // Минимальное значение качества товара
    const MIN_QUALITY = 0;

    public function decreaseQuality($pts): BaseProduct
    {
        if ($this->item->sell_in <= self::SELL_IN_TO_QTY) {
            $pts *= 2;
        }

        return $this->setQuality(max($this->item->quality - $pts, self::MIN_QUALITY));
    }
}
