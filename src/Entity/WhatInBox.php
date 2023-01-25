<?php

namespace Vldmrk\SyliusWhatInBoxPlugin\Entity;

use Sylius\Component\Core\Model\ImageInterface;
use Sylius\Component\Core\Model\ProductInterface;
use Sylius\Component\Product\Model\ProductVariantTranslationInterface;
use Sylius\Component\Resource\Model\TimestampableTrait;
use Sylius\Component\Resource\Model\ToggleableTrait;
use Sylius\Component\Resource\Model\TranslatableTrait;
use Sylius\Component\Resource\Model\TranslationInterface;

class WhatInBox implements WhatInBoxInterface {

    use TimestampableTrait, ToggleableTrait;
    use TranslatableTrait {
        __construct as private initializeTranslationsCollection;
        getTranslation as private doGetTranslation;
    }

    public function __construct()
    {
        $this->initializeTranslationsCollection();
    }

    /** @var int|null */
    protected $id;

    /** @var string|null */
    protected $code;

    /** @var ProductInterface|null */
    protected $product;

    /** @var ImageInterface|null */
    protected $image;

    /** @var int|null */
    protected $position;

    /** @var int|null */
    protected $quantity;

    public function getId()
    {
        return $this->id;
    }

    /** @return string|null */
    public function getCode(): ?string
    {
        return $this->code;
    }

    /** @param string|null $code */
    public function setCode(?string $code): void
    {
        $this->code = $code;
    }

    /** @param ProductInterface $product */
    public function setProduct(ProductInterface $product): void {
        $this->product = $product;
    }

    /** @return ProductInterface */
    public function getProduct(): ?ProductInterface
    {
        return $this->product;
    }

    /** @return ImageInterface|null */
    public function getImage(): ?ImageInterface
    {
        return $this->image;
    }

    /** @param ImageInterface|null $image */
    public function setImage(?ImageInterface $image): void
    {
        $image->setOwner($this);
        $this->image = $image;
    }

    /**
     * @param int|null $position
     */
    public function setPosition(?int $position): void
    {
        $this->position = $position;
    }

    /**
     * @return int|null
     */
    public function getPosition(): ?int
    {
        return $this->position;
    }

    /**
     * @return int|null
     */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }

    /**
     * @param int|null $quantity
     */
    public function setQuantity(?int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return string|null
     */
    public function getTitle(): ?string
    {
        return $this->getTranslation()->getTitle();
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->getTranslation()->setTitle($title);
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->getTranslation()->getDescription();
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->getTranslation()->setDescription($description);
    }

    /**
     * @param string|null $locale
     * @return TranslationInterface
     */
    public function getTranslation(?string $locale = null): TranslationInterface
    {
        /** @var ProductVariantTranslationInterface $translation */
        $translation = $this->doGetTranslation($locale);

        return $translation;
    }

    /**
     * @return WhatInBoxTranslationInterface
     */
    protected function createTranslation(): WhatInBoxTranslationInterface
    {
        return new WhatInBoxTranslation();
    }

}
