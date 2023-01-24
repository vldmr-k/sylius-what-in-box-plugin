<?php

namespace Vldmrk\SyliusWhatInBoxPlugin\Factory;

use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Resource\Factory\FactoryInterface;
use Vldmrk\SyliusWhatInBoxPlugin\Entity\WhatInBox;
use Vldmrk\SyliusWhatInBoxPlugin\Entity\WhatInBoxInterface;

class WhatInBoxFactory implements WhatInBoxFactoryInterface {


    public function createNew(): WhatInBoxInterface
    {
        return new WhatInBox();
    }

    public function createForProduct(ProductInterface $product): WhatInBoxInterface
    {
        $new = $this->createNew();
        $new->setProduct($product);
        return $new;
    }
}
