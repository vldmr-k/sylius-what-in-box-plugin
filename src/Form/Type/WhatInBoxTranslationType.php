<?php

declare(strict_types=1);

namespace Vldmrk\SyliusWhatInBoxPlugin\Form\Type;

use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class WhatInBoxTranslationType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('title', TextType::class, [
                'label' => 'vldmrk.form.what_in_box.title',
                'required' => false,
            ])
            ->add('description', TextType::class, [
                'label' => 'vldmrk.form.what_in_box.description',
                'required' => false,
            ])
        ;
    }

    public function getBlockPrefix(): string
    {
        return 'vldmrk_what_in_box_translation';
    }
}
