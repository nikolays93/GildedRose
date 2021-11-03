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
            if ($item->name == 'Aged Brie' && $item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality < 50) {
                    $item->quality += 1;
                }
            } elseif ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                if ($item->quality < 50) {
                    $item->quality += 1;
                }

                if ($item->sell_in < 11) {
                    $item->quality += 1;
                }

                if ($item->sell_in < 6) {
                    $item->quality += 1;
                }
            } elseif($item->name == 'Sulfuras, Hand of Ragnaros') {
            } else {
                if ($item->quality > 0) {
                    $item->quality -= 1;
                }
            }

            if ($item->name != 'Sulfuras, Hand of Ragnaros') {
                $item->sell_in -= 1;
            }

            if ($item->sell_in < 0) {
                if ($item->name == 'Aged Brie') {
                    if ($item->quality < 50) {
                        $item->quality += 1;
                    }
                } elseif ($item->name == 'Backstage passes to a TAFKAL80ETC concert') {
                    $item->quality -= $item->quality;
                } elseif ($item->name != 'Sulfuras, Hand of Ragnaros') {
                    if ($item->quality > 0) {
                        $item->quality -= 1;
                    }
                }
            }
        }
    }
}
