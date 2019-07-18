<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('lastname',null,['label' => false])
            ->add('firstname',null,['label' => false])
            ->add('city',null,['label' => false])
            ->add('birthDate',null,['label' => false])
            ->add('email',null,['label' => false])
            //  ->add('roles')
            ->add('password', PasswordType::class,['label' => false])
            ->add('confirm_password', PasswordType::class,['label' => false])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
