<?php

$categories = ['Доски и лыжи', 'Крепления', 'Ботинки', 'Одежда', 'Инструменты', 'Разное'];

$items = [
    [
        'lot-name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '10999',
        'path' => 'lot-1.jpg',
        'lot-rate' => '10000',
        'message' => '2014 Rossignol District Snowboard'
    ],
    [
        'lot-name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '159999',
        'path' => 'lot-2.jpg',
        'lot-rate' => '10000',
        'message' => 'DC Ply Mens 2016/2017 Snowboard'
        
    ],
    [
        'lot-name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => '8000',
        'path' => 'lot-3.jpg',
        'lot-rate' => '10000',
        'message' => 'Крепления Union Contact Pro 2015 года размер L/XL'
    ],
    [
        'lot-name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => '10999',
        'path' => 'lot-4.jpg',
        'lot-rate' => '10000',
        'message' => 'Ботинки для сноуборда DC Mutiny Charocal'
    ],
    [
        'lot-name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => '7500',
        'path' => 'lot-5.jpg',
        'lot-rate' => '10000',
        'lot-name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'message' => 'Ботинки для сноуборда DC Mutiny Charocal'
    ],
    [
        'lot-name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => '5400',
        'path' => 'lot-6.jpg',
        'lot-rate' => '10000',
        'lot-name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'message' => 'Ботинки для сноуборда DC Mutiny Charocal'
    ]
];

$bets = [
  ['name' => 'Иван', 'price' => 11500, 'ts' => strtotime('-' . rand(1, 50) .' minute')],
  ['name' => 'Константин', 'price' => 11000, 'ts' => strtotime('-' . rand(1, 18) .' hour')],
  ['name' => 'Евгений', 'price' => 10500, 'ts' => strtotime('-' . rand(25, 50) .' hour')],
  ['name' => 'Семён', 'price' => 10000, 'ts' => strtotime('last week')]
];

?>