<?php

namespace App\Form;

use App\Entity\Prime;
use Doctrine\DBAL\Types\FloatType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Validator\Constraints as Assert;


class PrimeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
        ->add('Date',DateTimeType::class,[
            'action'=> 'prime.filtre',
            'attr'=> [
                'class'=> 'form-control',
            ],
            'placeholder'=>'Day-Month-Year',
            'widget'=>'single_text',
            'format'=>'dd-MM-yyyy',
            'html5'=> false,
            'constraints'=>[
                new Assert\Length(['min' => 0, 'max'=> 50]),
            ],
        ])
            ->add('Contrat',TextType::class,[
                'attr'=>[
                    'class'=>'form-control'
                ],
                'label'=>'Contrat',
                'label_attr' => [
                    'class'=> 'form-label mt-4'
                ],
            ])
            ->add('Client',TextType::class,[
                'attr'=>[
                    'class'=> 'form-control',
                    'minlength' => '2',
                    'maxlength'=> '255',
                ],
                'label' => 'Client',
                'label_attr' => [
                    'class'=> 'form-label mt-4'
                ],
                'constraints'=>[
                    new Assert\Length(['min' => 2, 'max'=> 255]),
                    new Assert\NotBlank(),
                ]
            ])
            ->add('CompagnieAssurance',TextType::class,[
                'attr'=>[
                    'class'=> 'form-control',
                ],
                'label' => "Compagnie d'Assurance",
                'label_attr' => [
                    'class'=> 'form-label mt-4'
                ],
            ])
            ->add('PrimeTTC',NumberType::class,[
                'attr'=>[
                    'class'=> 'form-control',
                ],
                'label' => 'Prime TTC',
                'label_attr' => [
                    'class'=> 'form-label mt-4'
                ],
            ])
            ->add('MontantPayer',NumberType::class,[
                'attr'=>[
                    'class'=> 'form-control',
                ],
                'label' => 'Montant Payer',
                'label_attr' => [
                    'class'=> 'form-label mt-4'
                ],
            ])
            ->add('ResteAPayer',NumberType::class,[
                'attr'=>[
                    'class'=> 'form-control',
                ],
                'label' => 'Reste A Payer',
                'label_attr' => [
                    'class'=> 'form-label mt-4'
                ],
            ])
            ->add('Action',TextType::class,[
                'attr'=>[
                    'class'=> 'form-control',
                ],
                'label' => 'Action',
                'label_attr' => [
                    'class'=> 'form-label mt-4'
                ],
                'constraints'=>[
                    new Assert\Length(['min' => 0, 'max'=> 255]),
                ]
            ])
            ->add('submit', SubmitType::class,[
                'attr'=> [
                    'class'=> 'btn btn-primary mt-4'
                ],
                'label'=> 'Créer une prime'
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
