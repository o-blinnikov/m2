<?php

namespace Training\Test2\MagentoU;

class Test2 {
    public function __construct(
        \Magento\Catalog\Api\ProductRepositoryInterface $productRepository,
        \Magento\Catalog\Model\ProductFactory $productFactory,
        \Magento\Checkout\Model\Session $session,
        \Training\Test\Api\ProductRepositoryInterface $unit1ProductRepository,
        array $data
    ){
    } }