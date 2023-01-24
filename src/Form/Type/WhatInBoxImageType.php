<?php

declare(strict_types=1);

namespace Vldmrk\SyliusWhatInBoxPlugin\Form\Type;

use Sylius\Bundle\CoreBundle\Form\Type\ImageType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;

final class WhatInBoxImageType extends ImageType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->remove('type')
            ->add('file', FileType::class, [
                'label' => 'sylius.form.image.file',
            ]);
    }

    public function getBlockPrefix(): string
    {
        return 'sylius_avatar_image';
    }
}
