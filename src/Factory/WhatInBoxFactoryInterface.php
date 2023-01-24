<?php

namespace Vldmrk\SyliusWhatInBoxPlugin\Factory;


use Sylius\Component\Core\Model\ProductInterface;
use Vldmrk\SyliusWhatInBoxPlugin\Entity\WhatInBoxInterface;

interface WhatInBoxFactoryInterface extends \Sylius\Component\Resource\Factory\FactoryInterface {

    public function createNew();

    public function createForProduct(ProductInterface $product): WhatInBoxInterface;

}
