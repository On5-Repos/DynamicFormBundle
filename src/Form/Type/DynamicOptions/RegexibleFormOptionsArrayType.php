<?php

declare(strict_types=1);

/*
 * This file is part of the Zikula package.
 *
 * Copyright Zikula - https://ziku.la/
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Zikula\Bundle\DynamicFormBundle\Form\Type\DynamicOptions;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Zikula\Bundle\DynamicFormBundle\Form\DataTransformer\RegexConstraintTransformer;

class RegexibleFormOptionsArrayType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('constraints', TextType::class, [
            'label' => 'Regex validation string constraint',
            'required' => false,
        ]);
        $builder->get('constraints')
            ->addModelTransformer(new RegexConstraintTransformer())
        ;
    }

    public function getParent(): ?string
    {
        return FormOptionsArrayType::class;
    }
}
