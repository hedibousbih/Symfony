<?php

namespace App\Form;

use Symfony\Entity\Classroom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Controller\Request;


class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nsc',IntegerType::class)
            ->add('email',EmailType::class)
            ->add('classroom',ClassroomType::class,
            ['class'=>Classroom,'choice_label'=>'name'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
