<?php

namespace Rpgmr\RpgmrBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ComentarioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('objeto')
            ->add('comentario')
            ->add('usuario')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rpgmr\RpgmrBundle\Entity\Comentario'
        ));
    }

    public function getName()
    {
        return 'rpgmr_rpgmrbundle_comentariotype';
    }
}
