<?php


namespace App\Form;


use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType
{
    /**
     * @return string|null
     */
    public function getBlockPrefix(): ?string
    {
        return '';
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('_email', TextType::class, [
                'attr' => [
                    'placeholder' => 'form.user.email',
                    'class' => 'form-control',
                ],
            ])
            ->add('_password', PasswordType::class, [
                'attr' => [
                    'placeholder' => 'form.user.password',
                    'class' => 'form-control',
                ],
            ])
            ->add('submit', SubmitType::class, [
                'label' => 'form.action.login',
                'attr' => [
                    'class' => 'btn green-own',
                ],
            ])
        ;
    }
}
