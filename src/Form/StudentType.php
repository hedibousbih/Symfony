<?php

namespace App\Form;
<<<<<<< Updated upstream

use Symfony\Entity\Classroom;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Controller\Request;
=======
use App\Entity\Student;
use App\Entity\Classroom;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
>>>>>>> Stashed changes


class StudentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nsc',IntegerType::class)
            ->add('email',EmailType::class)
<<<<<<< Updated upstream
            ->add('classroom',ClassroomType::class,
            ['class'=>Classroom,'choice_label'=>'name'])
=======
            ->add('classroom',EntityType::class,
            ['class'=>Classroom::class,
            'choice_label'=>'name'])
>>>>>>> Stashed changes
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
<<<<<<< Updated upstream
            // Configure your form options here
        ]);
    }
}
=======
            'data_class' => Student::class,
        ]);
    }
}
>>>>>>> Stashed changes
