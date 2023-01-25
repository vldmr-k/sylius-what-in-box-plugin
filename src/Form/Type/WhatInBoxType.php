<?php

declare(strict_types=1);

namespace Vldmrk\SyliusWhatInBoxPlugin\Form\Type;


use Sylius\Bundle\ResourceBundle\Form\EventSubscriber\AddCodeFormSubscriber;
use Sylius\Bundle\ResourceBundle\Form\Type\AbstractResourceType;
use Sylius\Bundle\ResourceBundle\Form\Type\ResourceTranslationsType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;

use Symfony\Component\Form\FormBuilderInterface;

class WhatInBoxType extends AbstractResourceType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->addEventSubscriber(new AddCodeFormSubscriber())
            ->add('image', WhatInBoxImageType::class, [
                'label' => 'sylius.ui.image',
                'required' => false,
            ])
            ->add('enabled', CheckboxType::class, [
                'required' => false,
                'label' => 'sylius.ui.enabled',
            ])
            ->add('quantity', IntegerType::class, [
                'required' => false,
                'label' => 'sylius.ui.quantity',
            ])
            ->add('translations', ResourceTranslationsType::class, [
                'entry_type' => WhatInBoxTranslationType::class,
                'label' => 'vldmrk.form.what_in_box.translations',
            ])
        ;
    }
}
