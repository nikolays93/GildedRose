<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var Item[]
     */
    private $items;

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    public function updateQuality(): void
    {
        foreach ($this->items as $item) {
            // Skip legendary
            if ('Sulfuras, Hand of Ragnaros' == $item->name) {
                continue;
            }

            $item->sell_in -= 1;

            switch ($item->name) {
                case 'Aged Brie':
                    $item->quality += 1;

                    if ($item->sell_in < 0) {
                        $item->quality += 1;
                    }
                    break;

                case 'Backstage passes to a TAFKAL80ETC concert':
                    $item->quality += 1;

                    if ($item->sell_in < 10) {
                        $item->quality += 1;
                    }

                    if ($item->sell_in < 5) {
                        $item->quality += 1;
                    }

                    if ($item->sell_in < 0) {
                        $item->quality -= $item->quality;
                    }
                    break;

                default:
                    $item->quality -= 1;

                    if ($item->sell_in < 0) {
                        $item->quality -= 1;
                    }
                    break;
            }

            if ($item->quality > 50) {
                $item->quality = 50;
            }

            if ($item->quality < 0) {
                $item->quality = 0;
            }
        }
    }
}
