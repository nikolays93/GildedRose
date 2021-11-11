<?php

declare(strict_types=1);

namespace GildedRose;

final class GildedRose
{
    /**
     * @var BaseProduct[]
     */
    private $items;

    public function __construct(array $items = [])
    {
        $this->add($items);
    }

    public function add($product)
    {
        if (is_iterable($product)) {
            array_walk($product, function ($obProduct) {
                $this->add($obProduct);
            });

            return $this;
        }

        if ($product instanceof Item) {
            $product = static::defineProduct($product);
        }

        if (!$product instanceof BaseProduct) {
            throw new \Exception('Undefined product instance');
        }

        $this->items[] = $product;
        return $this;
    }

    public function updateQuality(): void
    {
        array_walk($this->items, static function ($item) {
            $item->update();
        });
    }

    public static function defineProduct(Item $product)
    {
        switch ($product->name)
        {
            case 'Aged Brie':
                return new AgedBrieProduct($product);

            case 'Sulfuras, Hand of Ragnaros':
                return new LegendaryProduct($product);

            case 'Backstage passes to a TAFKAL80ETC concert':
                return new BackstageProduct($product);

            default:
                return new Product($product);
        }
    }
}
