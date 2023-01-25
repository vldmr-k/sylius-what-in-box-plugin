<?php

namespace Vldmrk\SyliusWhatInBoxPlugin\Repository;

use Doctrine\ORM\QueryBuilder;
use spec\Sylius\Bundle\GridBundle\Builder\ActionGroup\ItemActionGroupSpec;
use Sylius\Bundle\ResourceBundle\Doctrine\ORM\EntityRepository;
use Vldmrk\SyliusWhatInBoxPlugin\Entity\WhatInBoxInterface;

class WhatInBoxRepository extends EntityRepository implements WhatInBoxRepositoryInterface
{

    /**
     * @param $id
     * @param $productId
     * @return WhatInBoxInterface|null
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByIdAndProductId($id, $productId): ?WhatInBoxInterface
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.product = :productId')
            ->andWhere('o.id = :id')
            ->setParameter('productId', $productId)
            ->setParameter('id', $id)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function findByProductId(string $locale, $productId) {
        return $this->createQueryBuilder('o')
            ->innerJoin('o.translations', 'translation')
            ->andWhere('translation.locale = :locale')
            ->andWhere('o.product = :productId')
            ->setParameter('productId', $productId)
            ->setParameter('locale', $locale)
            ->getQuery()
            ->getResult();
    }

    public function createQueryBuilderByProductId(string $locale, $productId): QueryBuilder
    {
        return $this->createQueryBuilder('o')
            ->innerJoin('o.translations', 'translation')
            ->andWhere('translation.locale = :locale')
            ->andWhere('o.product = :productId')
            ->setParameter('locale', $locale)
            ->setParameter('productId', $productId);
    }
}
