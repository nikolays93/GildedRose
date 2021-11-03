<?php

declare(strict_types=1);

namespace GildedRose;

class AgedBrieProduct extends BaseProduct
{
    /** @var int Значение срока хранения после которого товар начинает терять качество быстрее */
    const SELL_IN_TO_QTY = 0;
    /** @var int Минимальное значение качества товара */
    const MIN_QUALITY = 0;

    public function decreaseQuality($pts): BaseProduct
    {
        return parent::decreaseQuality($pts * $this->old);
    }
}
