<?php

namespace App\Form;

use App\Entity\Location;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Range;

class LocationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('city', null, [
                'attr' => [
                    'placeholder' => 'Enter city name',
                ]
            ])
            ->add('country', ChoiceType::class, [
                'choices' => [
                    'Poland' => 'PL',
                    'United States' => 'US',
                    'Germany' => 'DE',
                    'France' => 'FR',
                    'Italy' => 'IT',
                    'Spain' => 'ES',
                    'United Kingdom' => 'GB',
                    'Canada' => 'CA',
                    'Australia' => 'AU',
                    'Japan' => 'JP',
                ],
                'placeholder' => 'Select a country',
                'attr' => [
                    'class' => 'country-select',
                ],
            ])
            ->add('latitude', NumberType::class, [])
            ->add('longitude', NumberType::class, [])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Location::class,
        ]);
    }
}
