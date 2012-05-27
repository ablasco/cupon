<?php

namespace Cupon\UsuarioBundle\Form\Frontend;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UsuarioType extends AbstractType
{

    /**
     * Returns the name of this type.
     *
     * @return string The name of this type
     */
    public function getName()
    {
        return 'cupon_usuariobundle_usuariotype';
    }

    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('nombre')
            ->add('apellidos')
            ->add('email', 'email')

            ->add('password', 'repeated', array(
                'type' => 'password',
                'invalid_message' => 'Las dos contraseñas deben coincidir',
                'options' => array('label' => 'Contraseña')
            ))

            ->add('direccion')
            ->add('permite_email', 'checkbox', array('required' => false))
            ->add('fecha_nacimiento', 'birthday')
            ->add('dni')
            ->add('numero_tarjeta')
            ->add('ciudad');
    }


}
