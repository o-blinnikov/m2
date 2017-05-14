<?php
/**
 * Created by PhpStorm.
 * User: blinnikov
 * Date: 5/13/17
 * Time: 9:28 AM
 */

namespace Training\Test\Controller\Index;
class Run extends \Magento\Framework\App\Action\Action
{
    public function execute()
    {
        $this->getResponse()->appendBody("HELLO WORLD");

    }

}