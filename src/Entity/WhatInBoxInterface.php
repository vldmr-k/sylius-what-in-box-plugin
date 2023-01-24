<?php

namespace Vldmrk\SyliusWhatInBoxPlugin\Entity;

use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\ToggleableInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\CodeAwareInterface;
use Sylius\Component\Core\Model\ImageAwareInterface;

interface WhatInBoxInterface extends ResourceInterface, ToggleableInterface, TranslatableInterface, CodeAwareInterface, ImageAwareInterface {

    public function setProduct(ProductInterface $product):void ;

    public function getProduct(): ?ProductInterface;


    public function setPosition(?int $position): void;

    public function getPosition(): ?int;
}
