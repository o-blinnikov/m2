<?php
/**
 * Product controller.
 * Copyright © 2015 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Training\Test\Controller\Action;

class Index extends \Magento\Framework\App\Action\Action {

    public function execute() {
        $block = $this->_view->getLayout()->createBlock('Training\Test\Block\Test');
        $block->setTemplate('test.phtml');
        $this->getResponse()->appendBody($block->toHtml());
    }
}