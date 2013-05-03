<?php

namespace Rpgmr\RpgmrBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class AcaoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('origem')
            ->add('acao')
            ->add('anexo')
            ->add('resultado')
            ->add('personagem')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rpgmr\RpgmrBundle\Entity\Acao'
        ));
    }

    public function getName()
    {
        return 'rpgmr_rpgmrbundle_acaotype';
    }
}
