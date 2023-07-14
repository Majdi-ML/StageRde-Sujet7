<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('nom',TextType::class, [
            'attr' => [
                'class' => 'form-control adresse-class',
            ],
        ]
)
            ->add('adresse',TextType::class, [
                'attr' => [
                    'class' => 'form-control adresse-class',
                ],
            ]
    )
            ->add('mail',TextType::class, [
                'attr' => [
                    'class' => 'form-control adresse-class',
                ],
            ]
    )
            ->add('numero',TextType::class, [
                'attr' => [
                    'class' => 'form-control adresse-class',
                ],
            ]
    )
            
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
