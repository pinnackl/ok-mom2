<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityRepository;

class TaskType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class)
            ->add('description', TextareaType::class)
            ->add('allday', CheckboxType::class, array(
                'label'    => 'All day',
                'required' => false,
            ))
            ->add('start', DateType::class, array('widget' => 'single_text'))
            ->add('end', DateType::class, array('widget' => 'single_text'))

            ->add('users', EntityType::class, array(
                // query choices from this entity
                'class' => 'AppBundle:User',
                'query_builder' => function (EntityRepository $er) use ($options) {

                    return $er->createQueryBuilder('u')
                        ->where('u.family = ?1')
                        ->orderBy('u.username', 'ASC')
                        ->setParameter(1, $options['attr']['data-family']);
                },
                // use the User.username property as the visible option string
                'choice_label' => 'username',

                // used to render a select box, check boxes or radios
                'multiple' => true,
                'expanded' => false,
            ))

            ->add('save', SubmitType::class,  array('label' => 'Save'))
        ;
    }
}