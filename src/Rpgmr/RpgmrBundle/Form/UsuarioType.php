<?php

namespace Rpgmr\RpgmrBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class UsuarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email')
            ->add('senha')
            ->add('nome')
//            ->add('credito')
//            ->add('criado')
//            ->add('modificado')
//            ->add('apagado')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rpgmr\RpgmrBundle\Entity\Usuario'
        ));
    }

    public function getName()
    {
        return 'rpgmr_rpgmrbundle_usuariotype';
    }
}
