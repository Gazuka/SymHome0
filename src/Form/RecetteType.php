<?php

namespace App\Form;

use App\Entity\Recette;
use App\Form\EtapeType;
use App\Form\IngredientType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

class RecetteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nom')
            ->add('portions')
            ->add(
                'ingredients',
                CollectionType::class,
                [
                    'entry_type' => IngredientType::class,
                    'allow_add' => true,
                    'allow_delete' => true
                ]
            )
            ->add(
                'etapes',
                CollectionType::class,
                [
                    'entry_type' => EtapeType::class,
                    'allow_add' => true,
                    'allow_delete' => true
                ]
            )            
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Recette::class,
        ]);
    }
}
