<?php

namespace Rpgmr\RpgmrBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class PersonagemType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nome')
//            ->add('descricao')
//            ->add('qualidade')
//            ->add('atributos')
//            ->add('capacidade')
//            ->add('itens')
//            ->add('usuario')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Rpgmr\RpgmrBundle\Entity\Personagem'
        ));
    }

    public function getName()
    {
        return 'rpgmr_rpgmrbundle_personagemtype';
    }
}
