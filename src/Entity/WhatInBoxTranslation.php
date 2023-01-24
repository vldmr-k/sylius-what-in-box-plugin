<?php

namespace Vldmrk\SyliusWhatInBoxPlugin\Entity;

use Sylius\Component\Resource\Model\AbstractTranslation;


class WhatInBoxTranslation extends AbstractTranslation implements WhatInBoxTranslationInterface
{

    /** @var int */
    protected $id;

    /** @var string|null */
    protected $title;

    /** @var string|null */
    protected $description;

    public function getId()
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): void
    {
        $this->title = $title;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }


}
