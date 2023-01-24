<?php

namespace Vldmrk\SyliusWhatInBoxPlugin\Entity;

use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\ToggleableInterface;
use Sylius\Component\Resource\Model\TranslatableInterface;
use Sylius\Component\Resource\Model\CodeAwareInterface;

interface WhatInBoxInterface extends ResourceInterface, ToggleableInterface, TranslatableInterface, CodeAwareInterface {

    public function setProduct(ProductInterface $product):void ;

    public function getProduct(): ?ProductInterface;

    public function setMediaPath(?string $mediaPath): void;

    public function getMediaPath(): ?string;

    public function setMediaMimeType(string $mediaMimeType): void;

    public function getMediaMimeType(): ?string;

    public function setPosition(?int $position): void;

    public function getPosition(): ?int;
}
