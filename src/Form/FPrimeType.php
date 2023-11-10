<?php

namespace App\Form;

use App\Entity\Filter;
use App\Entity\Prime;
//use Doctrine\DBAL\Types\DateType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints as Assert;

class FPrimeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        /*->add('Date',DateTimeType::class,[
            'action'=> 'prime.filtre',
            'attr'=> [
                'class'=> 'form-control',
            ],
            'placeholder'=>'Day-Month-Year',
            'widget'=>'single_text',
            'format'=>'dd-MM-yyyy',
            'html5'=> false,
            'required'=> false,
            'constraints'=>[
                new Assert\Length(['min' => 0, 'max'=> 50]),
            ],
        ])*/
            ->add('Contrat',TextType::class,[
                'action'=> 'prime.filtre',
                'required'=> false,
                'attr'=> [
                    'class'=> 'form-control',
                    'placeholder'=> 'Contrat',
                ],
                'label_attr' => [
                    'class'=> 'form-label mt-4'
                ],
                'constraints'=>[
                    new Assert\Length(['min' => "", 'max'=> 50]),
                ]
            ])
            ->add('Client',TextType::class,[
                'action'=> 'prime.filtre',
                'required'=> false,
                'attr'=> [
                    'class'=> 'form-control',
                    'placeholder'=> 'Client',
                ],
                'label_attr' => [
                    'class'=> 'form-label mt-4'
                ],
                'constraints'=>[
                    new Assert\Length(['min' => 0, 'max'=> 50]),
                ]
            ])
            ->add('CompagnieAssurance',TextType::class,[
                'action'=> 'prime.filtre',
                'required'=> false,
                'attr'=> [
                    'class'=> 'form-control',
                    'placeholder'=> "Compagnie d'Assurance",
                ],
                'label_attr' => [
                    'class'=> 'form-label mt-4'
                ],
                'constraints'=>[
                    new Assert\Length(['min' => 0, 'max'=> 50]),
                ]
            ])
            //->add('PrimeTTC')
            //->add('MontantPayer')
            //->add('ResteAPayer')
            //->add('Action')
            ->add('submit', SubmitType::class,[
                'attr'=> [
                    'class'=> 'btn btn-primary '
                ],
                'label'=> 'Filtrer'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prime::class,
        ]);
    }
}
