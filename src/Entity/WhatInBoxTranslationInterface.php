<?php

namespace Vldmrk\SyliusWhatInBoxPlugin\Entity;

use Sylius\Component\Resource\Model\ResourceInterface;
use Sylius\Component\Resource\Model\TranslationInterface;

interface WhatInBoxTranslationInterface extends ResourceInterface, TranslationInterface
{
    public function getTitle(): ?string;

    public function setTitle(?string $title): void;

    public function getDescription(): ?string;

    public function setDescription(?string $description): void;
}
