<?php

/*
 * This file is part of the Sylius package.
 *
 * (c) Paweł Jędrzejewski
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Vldmrk\SyliusWhatInBoxPlugin\Menu;

use Knp\Menu\FactoryInterface;
use Knp\Menu\ItemInterface;
use Sylius\Bundle\AdminBundle\Event\ProductMenuBuilderEvent;
use Sylius\Component\Core\Model\ProductInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

final class AdminProductUpdateMenuListener
{
    public function addItems(ProductMenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();
        $product = $event->getProduct();

        $menu
            ->addChild('what_in_bix', [
                'route' => 'vldmrk_admin_what_in_box_index',
                'routeParameters' => ['productId' => $product->getId()]
            ])
            ->setLabel('vldmrk.ui.what_in_box')
            ->setLabelAttribute('icon', 'cubes')
        ;
    }
}
