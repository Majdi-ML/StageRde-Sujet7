<?php

namespace App\Form;

use App\Entity\Post;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

class PostType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre',TextType::class, [
                'attr' => [
                    'class' => 'form-control adresse-class',
                ],
                ]
            )

           
            ->add('type', ChoiceType::class, [
                'choices' => [
                    'offre d emploi' => 'offre d emploi',
                    'offre de stage de formation humaine et sociale' => 'offre de stage de formation humaine et sociale',
                    'offre de stage d immersion en entreprise' => 'offre de stage d immersion en entreprise',
                    'offre de stage ingénieur' => 'offre de stage ingénieur',
                    'offre de stage PFE' => 'offre de stage PFE',
                ]
            ])
            ->add('competence',TextType::class, [
                'attr' => [
                    'class' => 'form-control adresse-class',

                ],
                ]
             )
          ->add('niveau_etude',TextType::class, [
                'attr' => [
                    'class' => 'form-control adresse-class',
                    
                ],
                'label' => 'Expérience',
                ]
            )
            ->add('date_debut',DateType::class,[
              
                'widget' => 'choice',
                
            ])
            ->add('date_fin',DateType::class,[
                
                'widget' => 'choice',
               
            ])
            
            ->add('cible', ChoiceType::class, [
              
                'choices' => [
                    'Génie Civil' => 'Génie Civil',
                    'Informatique' => 'Informatique',
                    'Eléctromécanique' => 'Eléctromécanique',
                    'Business' => 'Business',
                   
                ]
               
            ])
            ->add('description',TextType::class, [
                'attr' => [
                    'class' => 'form-control adresse-class',
                ],
                ]
            )
            ->add('entreprise')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Post::class,
        ]);
    }
}
