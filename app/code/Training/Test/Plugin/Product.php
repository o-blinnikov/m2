<?php

namespace Training\Test\Plugin;

class Product
{
    public function afterGetName(\Magento\Catalog\Model\Product $subject, $result) {
        return "The Best ".$result; // Adding 'The Best' in product name
    }
}