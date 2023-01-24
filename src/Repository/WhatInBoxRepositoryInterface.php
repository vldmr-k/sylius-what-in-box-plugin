<?php

namespace Vldmrk\SyliusWhatInBoxPlugin\Repository;

use Vldmrk\SyliusWhatInBoxPlugin\Entity\WhatInBoxInterface;

interface WhatInBoxRepositoryInterface {

    /**
     * @param $id
     * @param $productId
     * @return WhatInBoxInterface|null
     */
    public function findOneByIdAndProductId($id, $productId): ?WhatInBoxInterface;

}
