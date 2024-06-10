<?php

namespace App\Form;

use App\Entity\Category;
use App\Entity\Collections;
use App\Entity\CustomAttributesLabel;
use App\Entity\Items;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CollectionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('items', EntityType::class, [
                'class' => Items::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('customAttributesLabel', EntityType::class, [
                'class' => CustomAttributesLabel::class,
                'choice_label' => 'id',
                'multiple' => true,
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'name',
                'multiple' => false,
                'placeholder' => 'Choose a category'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Collections::class,
        ]);
    }
}
