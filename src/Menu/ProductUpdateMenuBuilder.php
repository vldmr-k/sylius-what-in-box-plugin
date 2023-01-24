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

final class ProductUpdateMenuBuilder
{
    public const EVENT_NAME = 'sylius.menu.admin.product.update';

    public function __construct(private FactoryInterface $factory, private EventDispatcherInterface $eventDispatcher)
    {

    }

    public function createMenu(array $options): ItemInterface
    {
        $menu = $this->factory->createItem('root');

        if (!isset($options['product'])) {
            return $menu;
        }

        $product = $options['product'];
        if (!$product instanceof ProductInterface) {
            return $menu;
        }

        $manageVariantsItem = $this->factory
            ->createItem('manage_what_in-box')
            ->setAttribute('type', 'links')
            ->setLabel('vldmrk.ui.manage_what_in')
            ->setLabelAttribute('icon', 'cubes')
        ;

        $manageVariantsItem
            ->addChild('vldmrk_admin_what_in_box_index', [
                'route' => 'vldmrk_admin_what_in_box_index',
                'routeParameters' => ['productId' => $product->getId()],
            ])
            ->setAttribute('type', 'link')
            ->setLabel('sylius.ui.list_what_in_box')
            ->setLabelAttribute('icon', 'list')
        ;
        $manageVariantsItem
            ->addChild('vldmrk_admin_what_in_box_create', [
                'route' => 'vldmrk_admin_what_in_box_create',
                'routeParameters' => ['productId' => $product->getId()],
            ])
            ->setAttribute('type', 'link')
            ->setLabel('sylius.ui.create')
            ->setLabelAttribute('icon', 'plus')
        ;


        $menu->addChild($manageVariantsItem);

        $this->eventDispatcher->dispatch(
            new ProductMenuBuilderEvent($this->factory, $menu, $product),
            self::EVENT_NAME,
        );

        return $menu;
    }
}
