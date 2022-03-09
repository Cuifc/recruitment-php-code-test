<?php

namespace App\Service;

class ProductHandler
{
    public $products = [
        [
            'id' => 1,
            'name' => 'Coca-cola',
            'type' => 'Drinks',
            'price' => 10,
            'create_at' => '2021-04-20 10:00:00',
        ],
        [
            'id' => 2,
            'name' => 'Persi',
            'type' => 'Drinks',
            'price' => 5,
            'create_at' => '2021-04-21 09:00:00',
        ],
        [
            'id' => 3,
            'name' => 'Ham Sandwich',
            'type' => 'Sandwich',
            'price' => 45,
            'create_at' => '2021-04-20 19:00:00',
        ],
        [
            'id' => 4,
            'name' => 'Cup cake',
            'type' => 'Dessert',
            'price' => 35,
            'create_at' => '2021-04-18 08:45:00',
        ],
        [
            'id' => 5,
            'name' => 'New York Cheese Cake',
            'type' => 'Dessert',
            'price' => 40,
            'create_at' => '2021-04-19 14:38:00',
        ],
        [
            'id' => 6,
            'name' => 'Lemon Tea',
            'type' => 'Drinks',
            'price' => 8,
            'create_at' => '2021-04-04 19:23:00',
        ],
    ];

    public function getTotalPrice()
    {
        $totalPrice = 0;
        foreach ($this->products as $product) {
            $price = $product['price'] ?: 0;
            $totalPrice += $price;
        }

        return $totalPrice;
    }

    public function sortByPriceAndSelectProduct($sortBy = 'desc', $productType = 'dessert')
    {
        $prices = array_column($this->products, 'price');
        array_multisort($prices, $sortBy == 'desc' ? SORT_DESC : SORT_ASC, $this->products);

        $filterProducts = array_filter($this->products, function ($product) use ($productType) {
            return strtolower($product['type']) == strtolower($productType);
        });

        return array_values($filterProducts);
    }

    public function changeCreateTime()
    {
        array_walk($this->products, function (&$v) {
            $v['create_at'] = strtotime($v['create_at']);
        });
    }
}

$log = new AppLogger('think-log');
$log->info('test');